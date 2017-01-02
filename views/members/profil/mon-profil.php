<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Mon profil</h1>
    <?php
    echo Visitor::getInstance()->getUser()->toHtml();
    ?>


</div>
