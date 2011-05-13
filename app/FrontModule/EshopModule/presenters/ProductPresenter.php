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
class Front_Eshop_ProductPresenter extends Front_Eshop_BasePresenter
{

    /** @persistent */
    public $id;
    private $product;

    /**
     * Get persistent parameters
     *
     * @return array persistents
    */
 /*   public static function getPersistentParams() {
        return array('id');

    }
*/
    protected function  startup() {
        parent::startup();

        try {
            $this->product = $this->fetchRow("product", $this->getParam('id'));
        }
        catch (BadRequestException $exc) {
            throw new InvalidArgumentException("Produkt neexistuje.");
        }
    }

    public function  beforeRender() {
        parent::beforeRender();

        $this->template->product = $this->product;

    }

    public function renderDefault() {
        $eshop = $this['webStructure']->getComponent('eshop');
        $category = new NoMenuNode('category'.$this->product['category_id'], $this->product->category['name'], ':Front:Eshop:Category:', array('id'=> $this->product['category_id']));
        $eshop->addComponent($category,$category->componentName);
        $product = new NoMenuNode('product'.$this->product['id'], $this->product['name'], ':Front:Eshop:Product:', array('id'=> $this->product['id']));
        $category->addComponent($product,$product->componentName);

        $this['webStructure']->setCurrent($product);
    }
    

}
