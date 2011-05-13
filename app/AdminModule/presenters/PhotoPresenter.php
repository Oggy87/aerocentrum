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
class Admin_PhotoPresenter extends Admin_BasePresenter
{
    public $lang;
    public $id;
    private $gallery;

    /**
    * Get persistent parameters
    *
    * @return array persistents
    */
    public static function getPersistentParams()
    {
        return array('lang','id');
    }

    public function startup() {
        parent::startup();

        $this->lang = $this->getParam('lang');
        if(!$this->lang) $this->lang = LANG;
        foreach(BaseModel::fetchAll('language') as $lang) {
            $languages[] = $lang['id'];
        }

        if (!in_array($this->lang, $languages))
                throw new InvalidArgumentException("Jazyk '$this->lang' neexistuje.");
    }

    public function actionView($id) {
        if ($id == NULL) {
            $this->flashMessage('Nevybrali jste žádnou galerie', 'error');
            $this->redirect('default');
        }
        $this->gallery = $this->fetchRow('gallery', $id);
    }

    public function actionUpload($id) {
        $this->gallery = $this->fetchRow('gallery', $id);
    }

    public function renderDefault() {

        $galleries = GalleryModel::fetchGalleries(GalleryModel::WEB)->order("date DESC");
        $paginator = $this['vpGallery']->getPaginator();
        $paginator->itemCount = $galleries->count('*');
        $galleries->limit($paginator->itemsPerPage, $paginator->offset);

        $this->template->galleries = $galleries;
    }

    public function renderStorage() {
        $galleries = GalleryModel::fetchGalleries(GalleryModel::STORAGE);
        $paginator = $this['vpStorageGallery']->getPaginator();
        $paginator->itemCount = $galleries->count('*');
        $galleries->limit($paginator->itemsPerPage, $paginator->offset);

        $this->template->galleries = $galleries;
    }

    public function renderView($id) {
        $this->template->gallery = $this->gallery;
        $this->template->photos = $this->gallery->photo();
    }

    public function renderUpload($id) {
        $this->template->gallery = $this->gallery;
    }

    public function handleRotate($photo_id,$direction) {
	$photo = $this->fetchRow('photo', $photo_id);

        $temp = "./static/temp";

        list($name, $suffix) = explode('.',$photo['picture_path'],2);
        foreach (Finder::findFiles(basename($name).'_*.*')->in($temp) as $key => $file) {
            unlink($key);
        }

        $image = Image::fromFile('static/'.$photo['picture_path']);
        $rotatedImage = $image->rotate($direction,0);

        $rotatedImage->save('static/'.$photo['picture_path']);

        $this->invalidateControl('photos');

    }

    public function  beforeRender() {
        parent::beforeRender();

        $this->template->languages = BaseModel::fetchAll('language');
    }

    protected function createComponentVpGallery($name) {
        $vp = new VisualPaginator();
        $vp->paginator->itemsPerPage = 12;

        return $vp;
    }

    protected function createComponentVpStorageGallery($name) {
        $vp = new VisualPaginator();
        $vp->paginator->itemsPerPage = 12;

        return $vp;
    }

    protected function createComponentGalleryForm($name) {

        $form = new AppForm($this,$name);

        $form->addGroup();
        $form->addDatePicker('date', 'Datum:', 15)
                ->addRule(Form::FILLED, 'Zadejte prosím datum.');

        $form->addGroup('Název:');
        $langs = BaseModel::fetchAll('language');
        foreach ($langs as $lang) {
            $form->addText('name_'.$lang['id'], $lang['name'].':', 45, 150);
        }

        $form->addRadioList('visible', 'publikovat:', array(1 => 'ano',0 => 'ne'))
                ->addRule(Form::FILLED,'Označte zda má/nemá být tato galerie publikována.')
                ->setDefaultValue('ne');

        $form->addHidden('type')->setValue('web');

        $form->addSubmit('sendUpload', 'Uložit a nahrát fotky');
        $form->addSubmit('send', 'Uložit');

        $form->onSubmit[] = array($this, 'galleryFormSubmit');

        //$form->getElementPrototype()->class('ajax');

        return $form;
    }

    public function galleryFormSubmit(Form $form) {
        $entry = $form->getValues();
        foreach ($entry as & $val) if ($val === '') $val = NULL;

        try {
            $gallery = GalleryModel::insert($entry);
            $this->flashMessage('Galerie byla úspěšně přidána.','success');
            if ($form['sendUpload']->isSubmittedBy()) {
                $this->redirect('upload', array('id' => $gallery['id']));
            }
            else {
                if ($this->getAction() == 'storage')
                    $this->redirect('storage');
                else
                    $this->redirect('default');
            }
        }
        catch (PDOException $exc) {
            $this->flashMessage('Ajaj, nepovedlo se galerii uložit.', 'error');
            Debug::log($exc, Debug::ERROR);
        }
    }

    protected function createComponentGalleryStorageForm($name) {

        $form = $this->createComponentGalleryForm($name);

        $form->removeComponent($form['date']);
        $form->removeComponent($form['visible']);
        $form->addHidden('visible')->setValue('0');
        $form['type']->setValue(GalleryModel::STORAGE);

        return $form;
    }

    protected function createComponentGalleryEditForm($name) {

        $form = $this->createComponentGalleryForm($name);

        $form->setDefaults($this->gallery);

        $form->removeComponent($form['sendUpload']);

        $form->onSubmit = array();
        $form->onSubmit[] = array($this, 'galleryEditFormSubmit');

        return $form;
    }

    protected function createComponentGalleryStorageEditForm($name) {

        $form = $this->createComponentGalleryForm($name);

        $form->removeComponent($form['date']);
        $form->removeComponent($form['visible']);
        $form->addHidden('visible')->setValue('0');
        $form['type']->setValue(GalleryModel::STORAGE);

        $form->setDefaults($this->gallery);

        $form->removeComponent($form['sendUpload']);

        $form->onSubmit = array();
        $form->onSubmit[] = array($this, 'galleryEditFormSubmit');

        return $form;
    }

    public function galleryEditFormSubmit(Form $form) {
        $entry = $form->getValues();
        foreach ($entry as & $val) if ($val === '') $val = NULL;
        $galleryId = (int) $this->getParam('id');

        try {
            $this->gallery->update($entry);
            $this->flashMessage('Galerie byla úspěšně upravena.','success');

            $this->redirect('view', array('id' => $galleryId));

        } catch (PDOException $exc) {
            $this->flashMessage('Ajaj, nepovedlo se galerii uložit.', 'error');
            Debug::log($exc, Debug::ERROR);
        }

    }

    protected function createComponentPhotos($name) {
        $form = new AppForm($this, $name);

        $gallery = $this->gallery;
        $photos = $this->gallery->photo();

        $photoIds = array();

        $photoContainer = $form->addContainer('photo');
        foreach ($photos as $photo) {

            $photoIds[$photo['id']] = '';

            $sub = $photoContainer->addContainer($photo['id']);
            $sub->addTextArea('description_'.$this->lang, 'popis:')
                    ->setDefaultValue($photo['description_']);
                    //->setValue($foto->popis);

            $sub->addCheckbox('delete', 'Smazat foto');
        }

        $form->addRadioList('photo_id', 'titulní foto', $photoIds)
                    ->addRule(Form::FILLED, 'Vyberte úvodní foto')
                    ->setDefaultValue($gallery['photo_id']);
                    //->setValue($gallery->fotoId);

        $form->addSubmit("save", "Uložit");

        $form->onSubmit[] = array($this,"onPhotosSubmit");

        return $form;
    }

    public function onPhotosSubmit(Form $form)
    {
        $values = $form->getValues();

        $args = array('photo_id' => (int) $values['photo_id']);
        try {
            $update = $this->gallery->update($args);

            if ($update) $this->flashMessage('Titulní foto úspěšně nastaveno', 'success');
        }
        catch (PDOException $exc) {
            $this->flashMessage('Ajaj, nepovedlo se nastavit titulní foto.', 'error');
            Debug::log($exc, Debug::ERROR);
        }

        foreach ($values['photo'] as $photoId => $photoValues) {
            $photo = $this->fetchRow('photo', $photoId);

            if (!$photoValues['delete']) {
                if(!$photoValues['description_'.$this->lang] == '') {
                    $args = array('description_'.$this->lang => $photoValues['description_'.$this->lang]);
                    try {
                        $update = $photo->update($args);
                    } catch (PDOException $exc) {
                        $this->flashMessage('Ajaj, nepovedlo se upravit popis u fota id - '.$photoId, 'error');
                        Debug::log($exc, Debug::ERROR);
                    }
                }
            }
            else {
                $temp = WWW_DIR.'/static/temp/';
                list($name, $suffix) = explode('.',$photo['picture_path'],2);
                foreach (Finder::findFiles(basename($name).'_*.*')->in($temp) as $key => $file) {
                    @unlink($key);
                }

               try {
                   $delete = $photo->delete();
                   if ($delete) {
                       @unlink( WWW_DIR.'/static/'.$photo['picture_path']);
                   }
               } catch (PDOException $exc) {
                   $this->flashMessage('Ajaj, nepovedlo se smazat foto id - '.$photoId, 'error');
                   Debug::log($exc, Debug::ERROR);
               }

            }
        }

        $this->redirect('this', array('id' => $this->gallery['id']));
    }

    protected function createComponentMultiUploadForm($name) {
        $form = new AppForm($this,$name);
        //$form->getElementPrototype()->class[] = "ajax";

        //$form->addFile('soub', 'soubor');
        $form->addSubmit("save", "Odeslat");

        $form->onSubmit[] = array($this,"onMultiSubmit");

    }
    
    public function onMultiSubmit(Form $form) {

        $targetDir = "gallery/photo/".$this->gallery['id'];

        // Create target dir
	if (!file_exists(WWW_DIR.'/static/'.$targetDir))
		@mkdir(WWW_DIR.'/static/'.$targetDir);

        $count = 0;

        $titleFotoId = $this->gallery['photo_id'];

        foreach ($_POST['flash_uploader'] as $uploadedFile) {
            $uploadedFile['name'] = String::webalize($uploadedFile['name'], '.');

            $imageTemp = TEMP_DIR."/plupload/".$uploadedFile['tmpname'];
            $imageName = WWW_DIR.'/static/'.$targetDir."/".$uploadedFile['name'];

            if(!file_exists($imageName)) {
                $move = rename($imageTemp, $imageName);

                if ($move) {
                    $args = array(
                        'gallery_id' => $this->gallery['id'],
                        'picture_path' => $targetDir."/".$uploadedFile['name']
                    );
                    try {
                        $insertPhoto = $this->gallery->photo()->insert($args);
                        if (!$titleFotoId) {
                           if($count == 0) GalleryModel::setTitlePhoto($this->gallery, $insertPhoto);
                        }
                        $count += 1;
                    }
                    catch (PDOException $exc) {
                        if ($exc->getCode() == 1062) {
                             $this->flashMessage('Foto - '.$uploadedFile["name"].' již v této galerii existuje.', 'error');
                         }
                         else {
                             $this->flashMessage('Ajaj, nepovedlo se nahrát foto - '.$uploadedFile["name"].'. Chyba:'.$exc->getCode().' - '.$exc->getMessage(), 'error');
                         }
                         @unlink($imageName);
                    }

                }
                else {
                    $this->flashMessage('Nepodařilo se nahrát fotku -'.$uploadedFile["name"], $type);
                }

            }
            else {
               $this->flashMessage('Foto - '.$uploadedFile["name"].' již v této galerii existuje.', 'error');
            }

        }

        $this->redirect('view', array('id' => $this->gallery['id']));

    }

    protected function createComponentMultiUpload($name) {
        $multiUpload = new MultiUpload();

        return $multiUpload;
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
                array($this, 'deleteGallery'),
                array($this, 'questionDelete')

        );

        return $form;
    }

    public function questionDelete($dialog, $params) {
        return sprintf('Chcete opravdu smazat galerii \'%s - %s\' a všechny fotky v této galerii?', TemplateHelpers::date($this->gallery['date']), $this->gallery['name_']);
    }

    public function deleteGallery($id, $dialog)
    {
        foreach($this->gallery->photo() as $photo) {

            $temp = WWW_DIR.'/static/temp/';
            list($name, $suffix) = explode('.',$photo['picture_path'],2);
            foreach (Finder::findFiles(basename($name).'_*.*')->in($temp) as $key => $file) {
                    @unlink($key);
            }

            try {
                $delete = $photo->delete();
                if ($delete) {
                    @unlink( WWW_DIR.'/static/'.$photo['picture_path']);
                }
            } catch (PDOException $exc) {
                   $this->flashMessage('Ajaj, nepovedlo se smazat foto id - '.$photoId, 'error');
                   Debug::log($exc, Debug::ERROR);
            }
        }

        $dir = WWW_DIR.'/static/gallery/photo/'.$id;
        if(file_exists($dir)) rmdir($dir);

        try {
            $deleteGallery = $this->gallery->delete();
            if($deleteGallery) {
                $this->flashMessage('Galerie \''.TemplateHelpers::date($this->gallery['date']).' - '.$this->gallery['name_'].'\' byla úspěšně smazána', 'success');
                $this->redirect('default');
            }
        } catch (PDOException $exc) {
            $this->flashMessage('Nepodařilo se galerii vymazat', 'error');
            Debug::log($exc, Debug::ERROR);
            if (!$this->isAjax()) $this->redirect('this');
        }

    }

}
