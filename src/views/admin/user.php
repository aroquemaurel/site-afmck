<?php $breadcrumb->display()?>
    <div class="container-fluid">
        <h1>Utilisateur <?=$user->getFirstName()." ".$user->getLastName();?></h1>
        <?php
        echo $user->toHtml();
        ?>
    </div>
