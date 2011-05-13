<?php

/**
 * Description of WebNode
 *
 * @author Petr Ogurcak
 */
abstract class WebNode extends ComponentContainer {

    /** @var string */
    public $componentName;

    /** @var string */
    public $label = "undefined";

    /** @var string */
    public $url = NULL;

    /**@var array*/
    public $args;

    /**@var array*/
    public $others;

    /** @var bool */
    public $isCurrent = false;

    public function __construct($name,$label,$url = NULL, $args = NULL,$others = NULL) {
        parent::__construct();

        $this->componentName = $name;
        $this->label = $label;
        if ($url) $this->url = $url;
        if ($args) $this->args = $args;
        if ($others) $this->others = $others;
    }
   
}
?>
