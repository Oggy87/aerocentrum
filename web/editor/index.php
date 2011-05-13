<?php

require dirname(__FILE__) . "/../../libs/Nette/Nette/loader.php";

Debug::enable(Debug::DETECT);

function adminer_object() {

    // required to run any plugin
    include_once dirname(__FILE__) . "/../../libs/Adminer/plugins/plugin.php";

    $dir = dirname(__FILE__) . "/../../libs/Adminer/plugins/";

    foreach (Finder::findFiles('*.php')->in($dir) as $file) {
        include_once "$file";
    }

    return new AdminerPlugin(array(
        // specify enabled plugins here
        //new AdminerDumpXml,
        //new AdminerTinymce,
        //new AdminerFileUpload("data/"),
        new AdminerSlugify,
        //new AdminerTranslation,
        //new AdminerForeignSystem,
        new AdminerEditCalendar,
        new AdminerEditTextarea,
        new AdminerEnumOption
    ));
}

// include original Adminer or Adminer Editor
include dirname(__FILE__)  . "/../../libs/Adminer/editor-3.2.0.php";
?>
