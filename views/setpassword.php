<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Modifier le mot de passe</h1>
    <form role="form" method="post">
    <?php
    include('includes/formPassword.php');
    ?>

    <input type="hidden" value="<?= $user->getId()?>" name="user" />
    <hr class="colorgraph">
    <button id="submit" type="submit" style="margin: auto; width: 250px; "
            class="btn btn-primary btn-block btn-lg">
        <i class="glyphicon glyphicon-ok-sign"></i>
        Modifier le mot de passe
    </button>
</form>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php
$script = '<script src="' . Visitor::getRootPage() . '/views/formPassword.js"></script>';
?>
