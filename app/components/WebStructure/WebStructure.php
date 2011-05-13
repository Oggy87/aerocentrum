<?php

/**
 * Description of WebStructure
 *
 * @author Petr Ogurcak
 */
class WebStructure extends Control {

    /** @var WebNode */
    public $current;

    /**
    * Set node as current
    * @param NavigationNode $node
    */
    public function setCurrent(WebNode $node) {
        if (isset($this->current)) {
            $this->current->isCurrent = false;
        }
        $node->isCurrent = true;
        $this->current = $node;
    }

    /**
     * Render
     */
     public function renderMenu() {
         $template = $this->createTemplate()
             ->setFile(dirname(__FILE__) . "/menu.latte");

         $template->section = $this;//->getComponents(FALSE,'SectionNode');

         $items = array();
         $node = $this->current;

         while (isset($node)) {
            if ($node instanceof SectionNode) array_unshift($items, $node);
            $node = $node->getParent();
         }
         $template->path = $items;

         $template->render();
     }

     public function renderMenuPage() {
         if (empty($this->current)) return;

         $items = array();
         $node = $this->current;

         while (isset($node)) {
            if ($node instanceof SectionNode) array_unshift($items, $node);
            $node = $node->getParent();
         }

         $template = $this->createTemplate()
                         ->setFile(dirname(__FILE__) . "/menuPage.latte");
        $template->path = $items;
        $template->render();
     }


    /**
     * Render breadcrumbs
     */
    public function renderBreadcrumbs() {
        if (empty($this->current)) return;

        $items = array();
        $node = $this->current;

        while (isset($node)) {
            if ($node instanceof WebNode) array_unshift($items, $node);
            $node = $node->getParent();
        }

        $template = $this->createTemplate()
                         ->setFile(dirname(__FILE__) . "/breadcrumbs.latte");
        $template->items = $items;
        $template->render();
    }

    public function renderSitemap() {

        $template = $this->createTemplate()
                         ->setFile(dirname(__FILE__) . "/sitemap.latte");

        $template->section = $this;

        $template->render();
    }



}
?>
