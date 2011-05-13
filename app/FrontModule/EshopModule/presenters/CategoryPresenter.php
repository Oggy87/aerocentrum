<?php

/**
 * My Application
 *
 * @copyright  Copyright (c) 2010 John Doe
 * @package    MyApplication
 */



/**
 * Homepage presenter.
 *
 * @author     John Doe
 * @package    MyApplication
 */
class Front_Eshop_CategoryPresenter extends Front_Eshop_BasePresenter
{
    /** @persistent */
    public $tags;
    /** @persistent */
    public $id;
    private $category;

    /**
     * Get persistent parameters
     *
     * @return array persistents
    */
    public static function getPersistentParams() {
        return array('id','tags');

    }

    protected function  startup() {
        parent::startup();

        $this->tags = $this->getParam('tags');
        try {
            $this->category = $this->fetchRow("category", $this->getParam('id'));
        } catch (BadRequestException $exc) {
            throw new InvalidArgumentException("Kategorie neexistuje.");
        }
    }

    public function  beforeRender() {
        parent::beforeRender();

        $this->template->category = $this->category;
        
        $this->template->tags = BaseModel::fetchAll('tag')->where("id",explode('+', $this->tags))->order("url_slug");

        $this->template->products = BaseModel::fetchAll('product');
        if($this->category) $this->template->products->where("category_id", $this->category['id']);
        foreach ($this->template->tags as $tag) {
            $this->template->products->where("id", BaseModel::fetchAll('product_tag')->where("tag_id", $tag['id'])->select("product_id"));

        }
        //2.varianta
        /*$products = BaseModel::fetchAll('product')->where("id", BaseModel::fetchAll('product_tag')->where("tag_id", $this->template->tags)
                ->group("product_id", "COUNT(*) = " . count($this->template->tags))
                ->select("product_id")
        );*/


        $paginator = $this['vpProducts']->getPaginator();
        $paginator->itemCount = $this->template->products->count('*');
        $this->template->products->limit($paginator->itemsPerPage, $paginator->offset);

    }

    public function renderDefault() {
        $category_tagGroup = $this->category->category_tagGroup()->order("'order'");
        $this->template->tagGroupes = BaseModel::fetchAll("tagGroup")->where("id",$category_tagGroup->select("tagGroup_id"));

        $parent = $this['webStructure']->getComponent('eshop');

        $category = new NoMenuNode('category'.$this->category['id'], $this->category['name'], ':Front:Eshop:Category:', array('id'=> $this->category['id']));
        $parent->addComponent($category,$category->componentName);

        $this['webStructure']->setCurrent($category);

    }

    function renderIcon($id) {
        $category = $this->fetchRow('category', $id);

	$contentType = image_type_to_mime_type(Image::getFormatFromString($category['icon']));
	$this->getHttpResponse()->setContentType($contentType);
	echo $category['icon'];
	$this->terminate();
    }

    protected function createComponentVpProducts($name) {
        $vp = new VisualPaginator();
        $vp->paginator->itemsPerPage = 4;

        return $vp;
    }

}
