<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Changer de mot de passe</h1>
    <form role="form" method="post">
    <hr class="colorgraph">
        <div class="form-group">
            <input required="required" type="password" name="lastPassword" id="lastPassword"
                   autocomplete="off" class="form-control input-lg"
                   placeholder="Ancien mot de passe" tabindex="5">
        </div>

        <?php
        include(Visitor::getInstance()->getRootPath().'/views/includes/formPassword.php');
        ?>
    <hr class="colorgraph">
        <button id="submit" type="submit" style="margin: auto; width: 250px; "
                class="btn btn-primary btn-block btn-lg">
            <i class="glyphicon glyphicon-ok-sign"></i>
            Je change de mot de passe
        </button>
    </form>

</div>
<?php
$script = '<script src="' . Visitor::getInstance()->getRootPage() . '/views/formPassword.js"></script>';
