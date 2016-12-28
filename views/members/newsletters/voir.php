<?php use viewers\HomeViewer;

$breadcrumb->display()?>

<div class="container-fluid">
    <?= \viewers\NewsViewer::getHtmlNew($new) ?>
</div>