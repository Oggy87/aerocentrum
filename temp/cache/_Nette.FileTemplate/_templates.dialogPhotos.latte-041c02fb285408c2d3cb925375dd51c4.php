<?php //netteCache[01]000353a:2:{s:4:"time";s:21:"0.21937800 1305116898";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:67:"/var/www/projekty/aero/app/AdminModule/templates/dialogPhotos.latte";i:2;i:1305116895;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/AdminModule/templates/dialogPhotos.latte

?><?php
$_l = LatteMacros::initRuntime($template, NULL, 'ot8ctnwxoh'); unset($_extends);

if (isset($presenter, $control) && $presenter->isAjax() && $control->isControlInvalid()) {
	return LatteMacros::renderSnippets($control, $_l, get_defined_vars());
}
if (isset($gallery)): ?>

    <div id="breadcrumbs">
<?php if ($gallery['type'] == GalleryModel::WEB): ?>
        <a href="<?php echo TemplateHelpers::escapeHtml($control->link("web!")) ?>" class="ajax">Vyberte galerii</a>
<?php elseif ($gallery['type'] == GalleryModel::STORAGE): ?>
        <a href="<?php echo TemplateHelpers::escapeHtml($control->link("storage!")) ?>" class="ajax">Vyberte galerii</a>
<?php endif ?>
        <span> » </span>
        <span>Vyberte foto</span>
    </div>


<?php if (count($photos) > 0): ?>
        <div class="fotos">
<?php foreach ($iterator = $_l->its[] = new SmartCachingIterator($photos) as $foto): $modulus = $iterator->getCounter() % 3 ?>
            <div<?php if ($_l->tmp = trim(implode(" ", array_unique(array('foto',$modulus == 0 ? 'last':null))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>>

            <?php echo TemplateHelpers::escapeHtml($template->image($foto['picture_path'], 260, 170, $foto['description_'], TRUE, FALSE, FALSE, FALSE, NULL, 'f'.$foto['id'])) ?>

            </div>

<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
        </div>

<?php else: ?>
        <div class="notice">Žádné foto zatím nebylo nahráno.</div>
<?php endif ?>
    <div class="clear"></div>

<script type="text/javascript">
head.ready(function() {
    $(document).ready(function(){
        $('.foto').click(function() {
            $('.fotos > .foto').removeAttr('id');
            $(this).attr('id', 'select');
        });

    });
});
</script>
<?php else: if ($type == GalleryModel::WEB): ?>
    <div id="breadcrumbs">
        <span>Vyberte galerii</span>
        <span> » </span>
        <span>web</span>
    </div>

    <div class="tabs">
        <div class="tab current">webové</div>
        <div class="tab"><a href="<?php echo TemplateHelpers::escapeHtml($control->link("storage!")) ?>" class="ajax">úložné</a></div>

        <div class="clear"></div>
    </div>

    <div class="ajaxPaginator"><?php $_ctrl = $control->getWidget("vpGallery"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ?></div>
<?php else: ?>
    <div id="breadcrumbs">
        <span>Vyberte galerii</span>
        <span> » </span>
        <span>úložné</span>
    </div>

    <div class="tabs">
        <div class="tab"><a href="<?php echo TemplateHelpers::escapeHtml($control->link("web!")) ?>" class="ajax">webové</a></div>
        <div class="tab current">úložné</div>

        <div class="clear"></div>
    </div>

    <div class="ajaxPaginator"><?php $_ctrl = $control->getWidget("vpStorageGallery"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ?></div>
<?php endif ?>
    <div class="galleries">
<?php if (count($galleries) > 0): foreach ($iterator = $_l->its[] = new SmartCachingIterator($galleries) as $gallery): $modulus = $iterator->getCounter() % 3 ?>
            <a href="<?php echo TemplateHelpers::escapeHtml($control->link("gallery!", array('id' => $gallery['id']))) ?>"<?php if ($_l->tmp = trim(implode(" ", array_unique(array('ajax','gallery',$modulus == 0 ? 'last':null))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>>

<?php if ($gallery['photo_id']): ?>
                    <?php echo TemplateHelpers::escapeHtml($template->image($gallery->photo['picture_path'], 270, 180, $gallery->photo['description_'], TRUE, TRUE)) ?>

<?php endif ?>
                <div class="box">
                    <div class="date"><?php echo TemplateHelpers::escapeHtml($template->date($gallery['date'])) ?></div>
                    <div class="name"><?php echo TemplateHelpers::escapeHtml($gallery['name_']) ?></div>
                </div>
            </a>

<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ;else: ?>
            <div class="notice">Nebyla zatím vytvořena žádná galerie.</div>
<?php endif ?>
        <div class="clear"></div>
    </div>
<?php if ($type == GalleryModel::WEB): ?>
    <div class="ajaxPaginator"><?php $_ctrl = $control->getWidget("vpGallery"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ?></div>
<?php else: ?>
    <div class="ajaxPaginator"><?php $_ctrl = $control->getWidget("vpStorageGallery"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ?></div>
<?php endif ;endif ;