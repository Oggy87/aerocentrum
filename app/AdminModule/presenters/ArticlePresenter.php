<?php

/**
 * My Application
 *
 * @copyright  Copyright (c) 2010 John Doe
 * @package    MyApplication
 */



/**
 * Sign in/out presenters.
 *
 * @author     John Doe
 * @package    MyApplication
 */
class Admin_ArticlePresenter extends Admin_BasePresenter
{
    private $sections = array('reference-assembly' => 'Stavby a montáže',
                          'reference-transport' => 'Transport břemen',
                          'reference-timberharvesting' => 'Těžba dřeva',
                          'reference-photoflight' => 'Fotolety a filmování',
                          'reference-limingforests' => 'Vápnění lesů',
                          'reference-aerialspraying' => 'Zemědělské postřiky');

    public function  startup() {
        parent::startup();

        $config = Environment::getConfig();
        dibi::connect($config->database);
    }

    public function actionDefault() {
        $namespace = Environment::getSession('article_press');
        $namespace->remove();
        $namespace = Environment::getSession('article_video');
        $namespace->remove();
        $namespace = Environment::getSession('article_gallery');
        $namespace->remove();
    }

    private function article() {
        if($this['vpGallery']->getParam('type')) $this->template->type = $this['vpGallery']->getParam('type');
        elseif($this['vpStorageGallery']->getParam('type')) $this->template->type = $this['vpStorageGallery']->getParam('type');

        if(!isset ($this->template->type)) $this->template->type = GalleryModel::WEB;

        if($this->template->type == GalleryModel::WEB) {
            $galleries = GalleryModel::fetchGalleries(GalleryModel::WEB)->order("date DESC");
            $paginator = $this['vpGallery']->getPaginator();
            $paginator->itemCount = $galleries->count('*');
            $galleries->limit($paginator->itemsPerPage, $paginator->offset);

            $this->template->galleries = $galleries;
        }
        elseif ($this->template->type == GalleryModel::STORAGE) {
            $galleries = GalleryModel::fetchGalleries(GalleryModel::STORAGE)->order("date DESC");
            $paginator = $this['vpStorageGallery']->getPaginator();
            $paginator->itemCount = $galleries->count('*');
            $galleries->limit($paginator->itemsPerPage, $paginator->offset);

            $this->template->galleries = $galleries;
        }

        if ($this->isAjax()) {
            $this->invalidateControl('dialogPhotos');
        }
    }

    public function renderNew() {

        $this->article();

        $this->template->form = $this['articleForm'];
       
    }

    public function renderEdit($id) {
        $this->article();

        $this->template->form = $this['articleEditForm'];
    }

    public function handleImageThumb($tmpname, $source = NULL) {

        if ($source == 'upload') {
            $file = TEMP_DIR."/plupload/".$tmpname;
        }
        else {
            $file = WWW_DIR."/static/".$tmpname;
        }

        $width = 645;
        $height = 330;
        $thumb = Image::fromFile($file)->resize($width, $height, Image::FILL | Image::ENLARGE)
                                       ->crop('50%', '50%', $width, $height);

        $dateTime = new DateTime53();

        $maxFileAge = 60 * 60; // Temp file age in seconds
        $fileName = $dateTime->getTimestamp().'.tmp';
        $tmpdir = WWW_DIR.'/static/temp/';

        // Create target dir
	if (!file_exists($tmpdir))
		@mkdir($tmpdir);

        // Remove old temp files
	if (is_dir($tmpdir) && ($dir = opendir($tmpdir))) {
		while (($file = readdir($dir)) !== false) {
			$filePath = $tmpdir . DIRECTORY_SEPARATOR . $file;

			// Remove temp files if they are older than the max age
			if (preg_match('/\\.tmp$/', $file) && (filemtime($filePath) < time() - $maxFileAge))
				@unlink($filePath);
		}

		closedir($dir);
	}

        $thumb->save($tmpdir.$fileName, 75,Image::JPEG);

        $img = Html::el('img');
        $img->src =  Environment::getVariable('baseUri').'static/temp/'.$fileName;
        $img->width = $thumb->width;
        $img->height = $thumb->height;

        $this->template->image = $img;
        $this->template->file = '/static/temp/'.$fileName;

        $this->invalidateControl('perexPhoto');

        //$this->terminate(); // ukončí presenter
    }

    public function handleRotate($image,$direction) {
        $thumb = Image::fromFile(WWW_DIR.$image);
        $rotatedImage = $thumb->rotate($direction,0);

        $rotatedImage->save(WWW_DIR.$image,100,Image::JPEG);

        $dateTime = new DateTime53();

        $newSize = Image::calculateSize($rotatedImage->width, $rotatedImage->height, NULL, 330, Image::FIT);

        $img = Html::el('img');
        $img->src =  Environment::getVariable('baseUri').$image.'?'.$dateTime->getTimestamp();
        $img->width = $newSize['0'];
        $img->height = $newSize['1'];

        $this->template->image = $img;
        $this->template->file = $image;

        $this->invalidateControl('perexPhoto');
    }

    public function handleStorage($control) {
        $this->template->type = GalleryModel::STORAGE;

        $galleries = GalleryModel::fetchGalleries(GalleryModel::STORAGE)->order("date DESC");
        $paginator = $this['vpStorageGallery']->getPaginator();
        $paginator->itemCount = $galleries->count('*');
        $galleries->limit($paginator->itemsPerPage, $paginator->offset);

        $this->template->galleries = $galleries;

        $this->invalidateControl('dialogPhotos');
    }

    public function handleWeb($control) {
        $this->template->type = GalleryModel::WEB;

        $galleries = GalleryModel::fetchGalleries(GalleryModel::WEB)->order("date DESC");
        $paginator = $this['vpStorageGallery']->getPaginator();
        $paginator->itemCount = $galleries->count('*');
        $galleries->limit($paginator->itemsPerPage, $paginator->offset);

        $this->template->galleries = $galleries;

        $this->invalidateControl('dialogPhotos');
    }

    public function handleGallery($id) {

        $this->template->gallery = $this->fetchRow('gallery', $id);
        $this->template->photos = $this->template->gallery->photo();

        $this->invalidateControl('dialogPhotos');
    }

    public function handleGetPhoto($photo_id) {

        $photo = GalleryModel::fetchPhoto($photo_id);
        $this->payload->photo = $photo['picture_path'];

        $this->terminate(); // ukončí presenter
    }



    public function createComponentArticleForm($name) {

        //$form = new RequestButtonReceiver($this, $name);
        $form = new AppForm($this, $name);

        $form->addSelect('section', 'Sekce:', $this->sections)
                ->addRule(Form::FILLED, 'Vyberte sekci.');

        $form->addDatePicker('date', 'Datum:', 15)
                ->addRule(Form::FILLED, 'Zadejte prosím datum.');

        $form->addText('heading', 'Nadpis:', '60' , '100')
                ->addRule(Form::FILLED, 'Vyplňte nadpis článku.')
                ->addRule(Form::MAX_LENGTH, 'Délka nadpisu nesmí být více než %d znaků.', 60);

        $perexPhoto = $form->addContainer('perexPhoto');
        $perexPhoto->addHidden('name');
        $perexPhoto->addHidden('tmpname')->addRule(Form::FILLED, 'Nahrajte prosím foto k článku.');
        $perexPhoto->addHidden('source');
        $perexPhoto->addHidden('direction')->setDefaultValue(0);

        $form->addTextArea('perex_html', 'Perex:', '60', '4')
                ->addRule(Form::FILLED, 'Perex musí být vyplněn.');

        $form->addTextArea('text_html', 'Obsah:', '60', '8')
                ->addRule(Form::FILLED, 'Obsah musí být vyplněn.');

        $form->addText('title', 'Titulek:', '' , '100')
                ->addRule(Form::FILLED, 'Vyplňte titulek sekce.');

        $form->addText('url_slug', 'Url:', '56')
                ->addRule(Form::FILLED, 'Vyplňte url.)');

        $form->addTextArea('description', 'Description:', '123', '2')
                ->addRule(Form::MAX_LENGTH, 'Délka description nesmí být více než %d znaků.', 250);

        $form->addTextArea('keywords', 'Keywords:', '123', '1');
                //->addRule(Form::MAX_LENGTH, 'Délka keywords nesmí být více než %d znaků.', 250);

        $form->addRadioList('visible', 'publikovat:', array('1' => 'ano','0' => 'ne'))
                ->setDefaultValue('0');

        // spojovaci tabulka article_press
        $articles = BaseModel::fetchAll('press')->order("title");
        $article_press = $form->addContainer('article_press');
       /* $namespace = Environment::getSession('article_press');
        if (!isset($namespace->rows)) $namespace->rows = array(0);*/
        //foreach($namespace->rows as $i) {
            $press = $article_press->addContainer('0');
            $press->addSelect('press_id','Článek v tisku:',$articles->fetchPairs("id", "title"))
                    ->skipFirst(' - ');

            $press->addSubmit('deleteRowPress', 'Odebrat článek')
                ->setValidationScope(FALSE)
                ->onClick[] = callback($this, 'deleteRowPress');
            $form['article_press']['0']['deleteRowPress']->getControlPrototype()->class = 'action delete';
       // }
        $form->addSubmit('addRowPress', 'Přidat další')
                ->setValidationScope(FALSE)
                ->onClick[] = callback($this, 'addRowPress'); 
        $form['addRowPress']->getControlPrototype()->class = 'action add';

        // spojovaci tabulka article_video
        //$videos = BaseModel::fetchPairs('video', 'name_cs');
        //sort($videos);
        $videos = BaseModel::fetchAll('video')->order("name_cs");
        $article_video = $form->addContainer('article_video');
        $namespace = Environment::getSession('article_video');
        if (!isset($namespace->rows)) $namespace->rows = array(0);
        foreach($namespace->rows as $i) {
            $video = $article_video->addContainer($i);
            $video->addSelect('video_id','Video:',$videos->fetchPairs("id","name_cs"))
                    ->skipFirst(' - ');

            $video->addSubmit('deleteRowVideo', 'Odebrat video')
                ->setValidationScope(FALSE)
                ->onClick[] = callback($this, 'deleteRowVideo');
            $form['article_video'][$i]['deleteRowVideo']->getControlPrototype()->class = 'action delete';
        }
        $form->addSubmit('addRowVideo', 'Propojit s dalším')
                ->setValidationScope(FALSE)
                ->onClick[] = callback($this, 'addRowVideo');
        $form['addRowVideo']->getControlPrototype()->class = 'action add';
        $form->addRequestButton('addvideo', 'Nahrát nové video.', 'Video:upload');

        // spojovaci tabulka article_gallery
        //$galleries = BaseModel::fetchPairs('gallery', 'name_cs');
        //sort($galleries);
        $galleries = BaseModel::fetchAll('gallery')->order("name_cs");
        $article_gallery = $form->addContainer('article_gallery');
        $namespace = Environment::getSession('article_gallery');
        if (!isset($namespace->rows)) $namespace->rows = array(0);
        foreach($namespace->rows as $i) {
            $gallery = $article_gallery->addContainer($i);
            $gallery->addSelect('gallery_id','Video:',$galleries->fetchPairs("id","name_cs"))
                    ->skipFirst(' - ');

            $gallery->addSubmit('deleteRowGallery', 'Odebrat galerii')
                ->setValidationScope(FALSE)
                ->onClick[] = callback($this, 'deleteRowGallery');
            $form['article_gallery'][$i]['deleteRowGallery']->getControlPrototype()->class = 'action delete';
        }
        $form->addSubmit('addRowGallery', 'Propojit s dalším')
                ->setValidationScope(FALSE)
                ->onClick[] = callback($this, 'addRowGallery');
        $form['addRowGallery']->getControlPrototype()->class = 'action add';

        $form->addSubmit('send', 'Uložit');
        $form->addSubmit('sendNext', 'Uložit a vytvořit další');
        $form->onSubmit[] = array($this, 'sectionFormSubmit');

        //$form->getElementPrototype()->class('ajax');
        RequestButtonHelper::prepareForm($form);
        
        return $form;
    }

    public function addRowPress(SubmitButton $button) {

        if ($button->isSubmittedBy()) {
            $form = $button->getForm();
            $values = $form->getValues();

           /* $namespace = Environment::getSession('article_press');
            if(count($namespace->rows) == 0) $namespace->rows = array(0);
            $max = max($namespace->rows);
            array_push($namespace->rows, $max + 1);*/

            /*unset($this['articleEditForm']);
            $form = $this->createComponentArticleForm('articleEditForm');*/

            $containers = $form->getComponent('article_press')->getComponents(FALSE, 'FormContainer');
            $i = count($containers);
            
            $article_press = $form['article_press'];
            $press = $article_press->addContainer($i);
            $articles = BaseModel::fetchAll('press')->order("title");
            $press->addSelect('press_id','Článek v tisku:',$articles->fetchPairs("id", "title"))
                    ->skipFirst(' - ');

            $press->addSubmit('deleteRowPress', 'Odebrat článek')
                ->setValidationScope(FALSE)
                ->onClick[] = callback($this, 'deleteRowPress');
            $form['article_press'][$i]['deleteRowPress']->getControlPrototype()->class = 'action delete';
            
            $form->setDefaults($values);

            if( $this->isAjax()) {
                $this->invalidateControl('articleForm');
            }
            else {
                //$this->redirect('this');
            }
        }
    }

    public function addRowVideo(SubmitButton $button) {

        if ($button->isSubmittedBy()) {
            $values = $button->getForm()->getValues();

            $namespace = Environment::getSession('article_video');
            if(count($namespace->rows) == 0) $namespace->rows = array(0);
            $max = max($namespace->rows);
            array_push($namespace->rows, $max + 1);

            unset($this[$button->getForm()->getName()]);
            $form = $this->createComponentArticleForm($button->getForm()->getName());

            $form->setDefaults($values);

            if( $this->isAjax()) {
                $this->invalidateControl('articleForm');
            }
            else {
                $this->redirect('this');
            }
        }
    }

    public function addRowGallery(SubmitButton $button) {

        if ($button->isSubmittedBy()) {
            $values = $button->getForm()->getValues();

            $namespace = Environment::getSession('article_gallery');
            if(count($namespace->rows) == 0) $namespace->rows = array(0);
            $max = max($namespace->rows);
            array_push($namespace->rows, $max + 1);

            unset($this[$button->getForm()->getName()]);
            $form = $this->createComponentArticleForm($button->getForm()->getName());

            $form->setDefaults($values);

            if( $this->isAjax()) {
                $this->invalidateControl('articleForm');
            }
            else {
                $this->redirect('this');
            }
        }
    }

    public function deleteRowPress(SubmitButton $button) {

        if ($button->isSubmittedBy()) {
            $values = $button->getForm()->getValues();

            unset($values['article_press'][$button->getParent()->getName()]);
            $namespace = Environment::getSession('article_press');
            unset($namespace->rows[$button->getParent()->getName()]);

            unset($this[$button->getForm()->getName()]);
            $form = $this->createComponentArticleForm($button->getForm()->getName());

            if( $this->isAjax()) {
                $this->invalidateControl('articleForm');
            }
            else {
                $this->redirect('this');
            }
        }
    }

    public function deleteRowVideo(SubmitButton $button) {

        if ($button->isSubmittedBy()) {
            $values = $button->getForm()->getValues();

            unset($values['article_video'][$button->getParent()->getName()]);
            $namespace = Environment::getSession('article_video');
            unset($namespace->rows[$button->getParent()->getName()]);

            unset($this[$button->getForm()->getName()]);
            $form = $this->createComponentArticleForm($button->getForm()->getName());

            if( $this->isAjax()) {
                $this->invalidateControl('articleForm');
            }
            else {
                $this->redirect('this');
            }
        }
    }

    public function deleteRowGallery(SubmitButton $button) {

        if ($button->isSubmittedBy()) {
            $values = $button->getForm()->getValues();

            unset($values['article_gallery'][$button->getParent()->getName()]);
            $namespace = Environment::getSession('article_gallery');
            unset($namespace->rows[$button->getParent()->getName()]);

            unset($this[$button->getForm()->getName()]);
            $form = $this->createComponentArticleForm($button->getForm()->getName());

            if( $this->isAjax()) {
                $this->invalidateControl('articleForm');
            }
            else {
                $this->redirect('this');
            }
        }
    }

    public function sectionFormSubmit(Form $form) {

        if ($form['send']->isSubmittedBy() OR $form['sendNext']->isSubmittedBy()) {

            $values = $form->getValues();

            foreach ($values as & $val) if (($val === '') OR ($val == 'NULL')) $val = NULL;

            $values['url_slug'] = String::webalize($values['url_slug']);

            $targetDir = "static/perex_photos/";

            // Create target dir
            if (!file_exists(WWW_DIR.'/'.$targetDir))
                    @mkdir(WWW_DIR.'/'.$targetDir);

            if($values['perexPhoto']['source'] == 'upload')
                list($name, $suffix) = explode('.',basename(String::webalize($values['perexPhoto']['name'], '.')),2);
            if($values['perexPhoto']['source'] == 'photo') {
                list($name, $suffix) = explode('.',basename($values['perexPhoto']['tmpname'], '.'),2);
                $name = String::webalize($name);
                $suffix = String::webalize($suffix);
            }

            $suffix = '.'.$suffix;

            $dateTime = new DateTime53();
            $name = $name . '-' . $dateTime->getTimestamp() . $suffix;

            if($values['perexPhoto']['source'] == 'upload')
                $imageTemp = TEMP_DIR."/plupload/".$values['perexPhoto']['tmpname'];
            if($values['perexPhoto']['source'] == 'photo')
                $imageTemp = WWW_DIR.'/static/'.$values['perexPhoto']['tmpname'];

            $direction = (int)$values['perexPhoto']['direction'];
            $imageName = WWW_DIR.'/static/perex_photos/'.$name;
            if ($direction != 0) {
                $image = Image::fromFile($imageTemp);
                $rotated = $image->rotate($direction,0);

                if(!file_exists($imageName)) {
                    $rotated->save($imageName);
                }
                else {
                   $this->flashMessage('Nepodařilo se nahrát foto.', 'error');
                }

            }
            else {
                if(!file_exists($imageName)) {
                    if($values['perexPhoto']['source'] == 'upload')
                        $move = rename($imageTemp, $imageName);
                    elseif($values['perexPhoto']['source'] == 'photo')
                        $copy = copy($imageTemp, $imageName);
                }
                else {
                   $this->flashMessage('Nepodařilo se nahrát foto.', 'error');
                }
            }

            $perexFoto = 'perex_photos/'.$name;

            unset($values['perexPhoto']);

            if (isset($perexFoto)) $values['perex_photo_path'] = $perexFoto;
            $values['language_id'] = 'cs';
            try {
                $sectionId = ArticleModel::insert($values);
                $this->flashMessage('Článek byl úspěšně přidán.','success');

                if ($form['send']->isSubmittedBy()){

                    $this->redirect('default');
                }
                elseif ($form['sendNext']->isSubmittedBy()) {
                    if ($this->getAction() == 'new')
                        $this->redirect('new');
                    else
                        $this->redirect('default');
                }


            } catch (PDOException $e) {
                if($e->errorInfo[1] == 1062) {
                        if (strpos($e->getMessage(), $values['url_slug'])) {
                            $form->addError("Článek s touto URL již existuje");
                        }
                }
                else {
                    $this->flashMessage('Ajaj, nepovedlo se.', 'error');
                }
                Debug::log($e, Debug::ERROR);
                @unlink($imageName);
            }
        }
    }

    public function createComponentArticleEditForm($name) {

        $defaults = $this->fetchRow('article', $this->getParam('id'));
        $defaults['date'] = strftime('%d.%m.%Y',strtotime($defaults['date']));

        $form = $this->createComponentArticleForm($name);

        // spojovaci tabulka article_press
        /*$form->removeComponent($form['article_press']);
        $article_presses = $defaults->article_press()->select("article_press.press_id");
        $articles = BaseModel::fetchAll('press')->order("title");
        $article_press = $form->addContainer('article_press');
        foreach($article_presses as $i => $ap) {
            $press = $article_press->addContainer($i);
            $press->addSelect('press_id','Článek v tisku:',$articles->fetchPairs("id", "title"))
                    ->skipFirst(' - ')
                    ->setValue($ap['press_id']);

            $press->addSubmit('deleteRowPress', 'Odebrat článek')
                ->setValidationScope(FALSE)
                ->onClick[] = callback($this, 'deleteRowPress');
            $form['article_press'][$i]['deleteRowPress']->getControlPrototype()->class = 'action delete';
        }*/

        if($defaults['perex_photo_path']) {
            $form['perexPhoto']['tmpname']->setValue($defaults['perex_photo_path']);

            $file = WWW_DIR.'/static/'.$defaults['perex_photo_path'];

            $width = 645;
            $height = 330;
            $thumb = Image::fromFile($file)->resize($width, $height, Image::FILL | Image::ENLARGE)
                                            ->crop('50%', '50%', $width, $height);

            $dateTime = new DateTime53();

            $maxFileAge = 60 * 60; // Temp file age in seconds
            $fileName = $dateTime->getTimestamp().'.tmp';
            $tmpdir = WWW_DIR.'/static/temp/';

            // Create target dir
            if (!file_exists($tmpdir))
                    @mkdir($tmpdir);

            // Remove old temp files
            if (is_dir($tmpdir) && ($dir = opendir($tmpdir))) {
                    while (($file = readdir($dir)) !== false) {
                            $filePath = $tmpdir . DIRECTORY_SEPARATOR . $file;

                            // Remove temp files if they are older than the max age
                            if (preg_match('/\\.tmp$/', $file) && (filemtime($filePath) < time() - $maxFileAge))
                                    @unlink($filePath);
                    }

                    closedir($dir);
            }

            $thumb->save($tmpdir.$fileName, 75,Image::JPEG);

            $img = Html::el('img');
            $img->src =  Environment::getVariable('baseUri').'static/temp/'.$fileName;
            $img->width = $thumb->width;
            $img->height = $thumb->height;

            $this->template->image = $img;
            $this->template->file = 'static/temp/'.$fileName;
        }

        $form->setDefaults($defaults);

        $form->removeComponent($form['sendNext']);

        $form->onSubmit = array();
        $form->onSubmit[] = array($this, 'sectionEditFormSubmit');

        return $form;
    }

    public function sectionEditFormSubmit(Form $form) {

        if ($form['send']->isSubmittedBy()) {
            $values = $form->getValues();

            $values['url_slug'] = String::webalize($values['url_slug']);

            foreach ($values as & $val) if (($val === '') OR ($val == 'NULL')) $val = NULL;

            $article = $this->fetchRow('article',$this->getParam('id'));

            if ($values['perexPhoto']['tmpname'] != '' AND $values['perexPhoto']['tmpname'] != $article['perex_photo_path']) {
                $targetDir = "static/perex_photos/";

                // Create target dir
                if (!file_exists(WWW_DIR.'/'.$targetDir))
                        @mkdir(WWW_DIR.'/'.$targetDir);

                if($values['perexPhoto']['source'] == 'upload')
                    list($name, $suffix) = explode('.',basename(String::webalize($values['perexPhoto']['name'], '.')),2);
                if($values['perexPhoto']['source'] == 'photo') {
                    list($name, $suffix) = explode('.',basename($values['perexPhoto']['tmpname'], '.'),2);
                    $name = String::webalize($name);
                    $suffix = String::webalize($suffix);
                }

                $suffix = '.'.$suffix;

                $dateTime = new DateTime53();
                $name = $name . '-' . $dateTime->getTimestamp() . $suffix;

                if($values['perexPhoto']['source'] == 'upload')
                    $imageTemp = TEMP_DIR."/plupload/".$values['perexPhoto']['tmpname'];
                if($values['perexPhoto']['source'] == 'photo')
                    $imageTemp = WWW_DIR.'/static/'.$values['perexFoto']['tmpname'];

                $direction = (int)$values['perexPhoto']['direction'];
                $imageName = WWW_DIR.'/static/perex_photos/'.$name;
                if ($direction != 0) {
                    $image = Image::fromFile($imageTemp);
                    $rotated = $image->rotate($direction,0);

                    if(!file_exists($imageName)) {
                        $rotated->save($imageName);
                    }
                    else {
                       $this->flashMessage('Nepodařilo se nahrát foto.', 'error');
                    }

                }
                else {
                    if(!file_exists($imageName)) {
                        if($values['perexPhoto']['source'] == 'upload')
                            $move = rename($imageTemp, $imageName);
                        elseif($values['perexPhoto']['source'] == 'photo')
                            $copy = copy($imageTemp, $imageName);
                    }
                    else {
                       $this->flashMessage('Nepodařilo se nahrát foto.', 'error');
                    }
                }

                if ($article['perex_photo_path'] ) {
                    // Remove old perex fotos files
                    $dir = dirname('static/'.$article['perex_photo_path']);

                    list($n, $s) = explode('.',basename($article['perex_photo_path']),2);

                    if (is_dir($dir) && ($mdir = opendir($dir))) {
                            while (($file = readdir($mdir)) !== false) {
                                    $filePath = $dir . DIRECTORY_SEPARATOR . $file;

                                    // Remove temp files if they are older than the max age
                                    if (preg_match('/^'.$n.'.*$/', $file) ) {
                                            @unlink($filePath);
                                    }
                            }

                            closedir($dir);
                    }
                }
                $perexFoto = 'perex_photos/'.$name;
            }
            else if ($values['perexPhoto']['direction'] != '0') {
                $imageName = WWW_DIR.'/'.$article['perex_photo_path'];
                $direction = (int)$values['perexPhoto']['direction'];

                $image = Image::fromFile($imageName);
                $rotated = $image->rotate($direction,0);

                list($name, $suffix) = explode('.',$fotoFile,2);
                foreach (glob($name."_*.*") as $filename) {
                    unlink($filename);
                }

                $rotated->save($imageName);

                $rotace = TRUE;
            }

            unset($values['perexPhoto']);
            if (isset($perexFoto)) $values['perex_photo_path'] = $perexFoto;

            $article_press = $article->article_press()->fetchPairs('article_press.press_id');

           /* foreach($values['article_press'] as $press_id) {
                $article->article_press()->insert_update(
                                            array('article_id' => $article['id'],
                                                   'press_id' => $press_id),
                                            array('article_id' => $article['id'],
                                                   'press_id' => $press_id),
                                            array('press_id' => $press_id));
            }*/

            try {
                //$update = $article->update($values);

                $this->flashMessage('Sekce byla úspěšně uložena.','success');

                //$this->redirect('this');

            } catch (PDOException $e) {
                if($e->errorInfo[1] == 1062) {
                        if (strpos($e->getMessage(), $values['url_slug'])) {
                            $form->addError("Článek s touto URL již existuje");
                        }
                }
                else {
                    $this->flashMessage('Ajaj, nepovedlo se.', 'error');
                }
                Debug::log($e, Debug::ERROR);
                //@unlink($imageName);
            }
        }
    }

    public function createComponentArticlesGrid($name) {
        $grid = new DataGrid();

        $grid->bindDataTable(dibi::dataSource('SELECT article.*
                        FROM article
                        LEFT JOIN language ON (article.language_id = language.id)'));

        //nastaveni
        $grid->displayedItems = array(10, 20, 50);

        //sloupce
        $column = $grid->addColumn('language_id', 'Jazyk');
        $column = $grid->addColumn('section', 'Sekce');
        $grid->addDateColumn('date', 'Datum', '%d.%m.%Y'); // český formát: '%d.%m.%Y'
        $column = $grid->addColumn('heading', 'Článek');
        $column = $grid->addColumn('visible', 'Aktivní');

        //filtry
        $grid['section']->addSelectboxFilter($this->sections);
        $grid['visible']->addSelectboxFilter(array( '0' => "Ne", '1' => "Ano"), TRUE);
        $grid['heading']->addFilter();

         //vychozi razeni
        $grid['date']->addDefaultSorting('desc');
        // povolí ukládání stavů komponenty do session
        $grid->rememberState = TRUE;

        // nastavíme klíč pro akce (a také i pro operace, o těch později)
        $grid->keyName = 'id';

        // přidáme sloupec pro akce (sloupců může být i více)
        $grid->addActionColumn('Akce');

        // a naplníme datagrid akcemi pomocí továrničky
        $grid->addAction('editovat', 'edit', Html::el('span')->class('icon icon-edit'), $useAjax = FALSE,'id');
        $grid->addAction('smazat', 'confirmForm:confirmDelete!', Html::el('span')->class('icon icon-del'), $useAjax = TRUE);

        return $grid;
    }

    //CONFIRMATION DIALOG
    public function createComponentConfirmForm()
    {
        $form = new ConfirmationDialog();
        $form->getFormElementPrototype()->addClass('ajax');

        $form->getFormButton('yes')->caption = 'Ano';
        $form->getFormButton('no')->caption = 'Ne';

        $form->addConfirmer(
                'delete',
                array($this, 'delete'),
                array($this, 'questionDelete')

        );

        return $form;
    }

    public function questionDelete($dialog, $params) {

        return sprintf('Chcete opravdu smazat článek s id \'%s\'?', $params['id']);
    }

    public function delete($id, $dialog) {

        try {
            $article = $this->fetchRow('article', $id);
            $perex_photo_path = $article['perex_photo_path'];
            $delete = $article->delete();

            //smazat temp perex obrazky
            $temp = WWW_DIR.'/static/temp/';
            if($perex_photo_path) {
                list($name, $suffix) = explode('.',$perex_photo_path,2);
                foreach (Finder::findFiles(basename($name).'_*.*')->in($temp) as $key => $file) {
                        @unlink($key);
                }
            }
            if ($delete) {
                if($perex_photo_path) @unlink( WWW_DIR.'/static/'.$perex_photo_path);
                $this->flashMessage('Článek smazán.','success');

                $this->redirect('default');
            }
        } catch (PDOException $exc) {
            $this->flashMessage('Ajaj, nepovedlo se článek smazat.','error');
            Debug::log($exc, Debug::ERROR);

            if (!$this->isAjax()) $this->redirect('this');
        }
    }

    protected function createComponentUpload($name) {
        $multiUpload = new MultiUpload();

        return $multiUpload;
    }
    

    protected function createComponentVpGallery($name) {
        $vp = new VisualPaginatorPhotoDialog();
        $vp->type = GalleryModel::WEB;
        $vp->paginator->itemsPerPage = 6;

        return $vp;
    }

    protected function createComponentVpStorageGallery($name) {
        $vp = new VisualPaginatorPhotoDialog();
        $vp->type = GalleryModel::STORAGE;
        $vp->paginator->itemsPerPage = 6;

        return $vp;
    }
}
