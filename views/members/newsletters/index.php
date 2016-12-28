<?php
use viewers\HomeViewer;

$breadcrumb->display();
?>

<div class="container-fluid">
    <h1>Liste des newsletters</h1>
    <?= \viewers\NewsViewer::getHtmlNewslettersMemberList($news, $page, 15)?>
</div>