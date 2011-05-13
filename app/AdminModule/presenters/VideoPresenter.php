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
class Admin_VideoPresenter extends Admin_BasePresenter
{
    public $lang;
    private $video;

    /**
    * Get persistent parameters
    *
    * @return array persistents
    */
    public static function getPersistentParams()
    {
        return array('lang');
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
            $this->flashMessage('Nevybrali jste žádné video', 'error');
            $this->redirect('default');
        }
        $this->video = $this->fetchRow('video', $id);
    }

    public function  beforeRender() {
        parent::beforeRender();

        $this->template->languages = BaseModel::fetchAll('language');
    }

    public function renderDefault() {

        $videos = BaseModel::fetchAll("video")->order("date DESC");
        $paginator = $this['vpVideo']->getPaginator();
        $paginator->itemCount = $videos->count('*');
        $videos->limit($paginator->itemsPerPage, $paginator->offset);

        $this->template->videos = $videos;
    }

    public function renderView($id) {
        $this->template->video = $this->video;
    }

    public function handleDeleteThumb($id) {
        $this->template->newthumb = TRUE;

        $this->terminate();
    }

    protected function createComponentVideoForm($name) {

        $form = new RequestButtonReceiver($this,$name);
        //$form->getElementPrototype()->class('ajax');

        $video = $form->addContainer('video');
        $video->addHidden('name');
        $video->addHidden('tmpname')->addRule(Form::FILLED, 'Nahrajte prosím video.');

        $video = $form->addContainer('thumb');
        $video->addHidden('name');
        $video->addHidden('tmpname');

        $form->addGroup();
        $form->addDatePicker('date', 'Datum:', 15)
                ->addRule(Form::FILLED, 'Zadejte prosím datum.');
        $form->addCheckbox('visible', 'Publikované');

        $form->addGroup('Název:');
        $langs = BaseModel::fetchAll('language');
        foreach ($langs as $lang) {
            $form->addText('name_'.$lang['id'], $lang['name'].':', 45, 150);
        }

        $form->addGroup('Popis:');
        $langs = BaseModel::fetchAll('language');
        foreach ($langs as $lang) {
            $form->addTextArea('description_'.$lang['id'], $lang['name'].':');
        }

        $form->addRequestButtonBack('back', 'Neukládat a vrátit zpět.');
        $form->addSubmit('send', 'Uložit');

        $form->onSubmit[] = array($this, 'videoFormSubmit');

        return $form;
    }

    protected function createComponentVideoEditForm($name) {

        $form = $this->createComponentVideoForm($name);

        $form->setDefaults($this->video);

        $form->onSubmit = array();
        $form->onSubmit[] = array($this, 'videoEditFormSubmit');

        return $form;
    }

    public function videoFormSubmit(Form $form) {

        $entry = $form->getValues();
        foreach ($entry as & $val) if ($val === '') $val = NULL;

        try {
            $video_entry = $entry['video'];
            unset($entry['video']);
            $thumb_entry = $entry['thumb'];
            unset($entry['thumb']);
            $video = VideoModel::insert($entry);

            $targetDir = "gallery/video";

            // Create target dir
            if (!file_exists(WWW_DIR.'/static/'.$targetDir))
                    @mkdir(WWW_DIR.'/static/'.$targetDir);

            //ulozeni videa
            $video_entry['name'] = String::webalize($video_entry['name'], '.');
            $videoTemp = TEMP_DIR."/plupload/".$video_entry['tmpname'];
            $video_path = $targetDir."/".$video['id'].'_'.$video_entry['name'];
            $videoName = WWW_DIR.'/static/'.$video_path;

            if(!file_exists($videoName)) {
                $move = rename($videoTemp, $videoName);

                if ($move) {
                    $this->flashMessage('Video bylo úspěšně uloženo.','success');
                    $video->update(array('video_path' => $video_path));
                }
                else {
                    $this->flashMessage('Nepodařilo se video uložit.','error');
                    $video->delete();
                }
            }
            
            //ulozeni nahledu
            $thumb_entry['name'] = String::webalize($thumb_entry['name'], '.');
            $thumbTemp = TEMP_DIR."/plupload/".$thumb_entry['tmpname'];
            $thumb_path = $targetDir."/thumbs/".$video['id'].'_'.$thumb_entry['name'];
            $thumbName = WWW_DIR.'/static/'.$thumb_path;

            if(!file_exists($thumbName)) {
                $move = rename($thumbTemp, $thumbName);

                if ($move) {
                    $this->flashMessage('Náhled videa byl úspěšně uložen.','success');
                    $video->update(array('thumb_path' => $thumb_path));
                }
                else {
                    $this->flashMessage('Nepodařilo se náhled videa uložit.','error');
                }
            }
        }
        catch (PDOException $exc) {
            $this->flashMessage('Ajaj, nepovedlo se video uložit.', 'error');
            Debug::log($exc, Debug::ERROR);
        }
        
        $this->redirect('view', array('id' => $video['id']));


    }

    public function videoEditFormSubmit(Form $form) {
        $entry = $form->getValues();
        foreach ($entry as & $val) if ($val === '') $val = NULL;

        try {
            $this->video->update($entry);
            //ulozeni nahledu
            $targetDir = "gallery/video";
            $entry['thumb']['name'] = String::webalize($_POST['thumb']['name'], '.');
            $thumbTemp = TEMP_DIR."/plupload/".$_POST['thumb']['tmpname'];
            $thumb_path = $targetDir."/thumbs/".$this->video['id'].'_'.$_POST['thumb']['name'];
            $thumbName = WWW_DIR.'/static/'.$thumb_path;
            @unlink( WWW_DIR.'/static/'.$this->video['thumb_path']);
            if(!file_exists($thumbName)) {
                $move = rename($thumbTemp, $thumbName);

                if ($move) {
                    $this->flashMessage('Náhled videa byl úspěšně uložen.','success');
                    $this->video->update(array('thumb_path' => $thumb_path));
                }
                else {
                    $this->flashMessage('Nepodařilo se náhled videa uložit.','error');
                }
            }
            $this->flashMessage('Video bylo úspěšně upraveno.','success');

            $this->redirect('this');
        }
        catch (PDOException $exc) {
            $this->flashMessage('Ajaj, nepovedlo se změny uložit.', 'error');
            Debug::log($exc, Debug::ERROR);
        }
        //$this->redirect('view', array('id' => $this->video['id']));
    }

    protected function createComponentUpload($name) {
        $multiUpload = new MultiUpload();

        return $multiUpload;
    }

    protected function createComponentVpVideo($name) {
        $vp = new VisualPaginator();
        $vp->paginator->itemsPerPage = 8;

        return $vp;
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
                array($this, 'deleteVideo'),
                array($this, 'questionDelete')

        );

        return $form;
    }

    public function questionDelete($dialog, $params) {
        return sprintf('Chcete opravdu smazat video \'%s\'?', $this->video['name_']);
    }

    public function deleteVideo($id, $dialog)
    {
        try {
            $video = $this->fetchRow('video', $id);
            $video_path = $video['video_path'];
            $thumb_path = $video['thumb_path'];
            $delete = $video->delete();
            if ($delete) {
                @unlink( WWW_DIR.'/static/'.$video_path);
                @unlink( WWW_DIR.'/static/'.$thumb_path);
                $this->flashMessage('Video smazáno.','succes');

                $this->redirect('default');
            }
        } catch (PDOException $exc) {
            $this->flashMessage('Ajaj, nepovedlo se smazat video.','error');
            Debug::log($exc, Debug::ERROR);

            if (!$this->isAjax()) $this->redirect('this');
        }
    }
}
