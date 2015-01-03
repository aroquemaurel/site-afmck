<?php $breadcrumb->display()?>
<div class="container-fluid">
<?php
if(!$editing) {
    echo '<h1>Formulaire d\'inscription</h1>';
    echo '<div class="col-xs-14 col-sm-10 col-md-11 col-sm-offset-1 col-md-offset-2">
            <div class="alert alert-warning">
                <strong>Attention!</strong> Votre inscription n\'est possible que si vous êtes adhérent à l\'association. <br/>
                Votre inscription sera validée manuellement par un membre du CA. Une fois validée, cette inscription sera valable pendant un an.
            </div>';
    $user = new User();
} else {
    echo '<h1>Editer vos informations</h1>';
    $user = VIsitor::getInstance()->getUser();
}
?>

            <form role="form" method="post">
<?php
if(!$editing) {
    echo '<h2>Inscrivez-vous ! <small>Pour pouvoir profiter du site</small></h2>';
}
?>
        <hr class="colorgraph">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <input required="required" type="text" name="firstName" id="firstName"
                           class="form-control input-lg" placeholder="Prénom" tabindex="1"
                           value="<?php echo $user->getFirstName()?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <input required="required" type="text" name="lastName" id="lastName"
                           class="form-control input-lg" placeholder="Nom de famille" tabindex="2"
                           value ="<?php echo $user->getLastName();?>"
                           >
                </div>
            </div>
        </div>
        <div class="form-group">
            <input required="required" type="text" name="adeliNumber" id="adeliNumber"
                   class="form-control input-lg" placeholder="Numéro ADELI" tabindex="3"
                   value="<?php echo $user->getAdeliNumber();?>"
                   >
                   <span id="adeli" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Numéro valide
        </div>
        <div class="form-group">
            <input required="required" type="email" name="email" id="email"
                   class="form-control input-lg" placeholder="Adresse e-mail" tabindex="4"
                   value="<?php echo $user->getMail();?>"
                   >
        </div>
        <?php
        if(!$editing) {
            include('includes/formPassword.php');
        }
        ?>
        <div class="row" style="margin-top: 15px;">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <select tabindex="7" class="form-control input-lg" required="required" id="levelFormation" name="levelFormation">
                        <option disabled selected>Niveau de formation MDT</option>
                        <option <?php if($user->getLevelFormation() == 1) echo "selected"?> value="1">A</option>
                        <option <?php if($user->getLevelFormation() == 2) echo "selected"?> value="2">B</option>
                        <option <?php if($user->getLevelFormation() == 3) echo "selected"?> value="3">C</option>
                        <option <?php if($user->getLevelFormation() == 4) echo "selected"?> value="4">D</option>
                        <option <?php if($user->getLevelFormation() == 5) echo "selected"?> value="5">Certifié</option>
                        <option <?php if($user->getLevelFormation() == 6) echo "selected"?> value="6">Diplômé</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <div required="required" class='input-group date' id="formationDate">
                        <input tabindex="8" type='text'  id='formationDate1' name='formationDate' placeholder="Date de validation" class="form-control input-lg"
                        value="<?php echo $user->getFormationDate()->format("d/m/Y");?>"
                        />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <input required="required" type="text" name="address" id="address"
                   class="form-control input-lg" placeholder="Adresse" tabindex="9"
                   value="<?php echo $user->getAddress();?>">
        </div>
                        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <input required="required" type="text" name="cp" id="cp"
                           class="form-control input-lg" placeholder="Code postal" tabindex="10"
                           value="<?php echo$user->getCp();?>"
                           >
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <input required="required" type="text" name="town" id="town"
                           class="form-control input-lg" placeholder="Ville" tabindex="11"
                           value="<?php echo $user->getTown();?>"
                           >
                </div>
            </div>
        </div>

        <hr class="colorgraph">
            <button id="submit" type="submit" style="margin: auto; width: 250px; "
            class="btn btn-primary btn-block btn-lg">
                <i class="glyphicon glyphicon-ok-sign"></i>
                <?php echo (!$editing ? "Je m'inscris" : "Modifier mes informations")?>
            </button>
    </form>
    <p></p>
    <p><br/></p>
</div>
</div>
</div>
<?php
$script = '<script src="' . Visitor::getInstance()->getRootPage() . '/style/js/moment.js"></script>';
$script .= '<script src="' . Visitor::getInstance()->getRootPage() . '/style/js/bootstrap-datetimepicker.js"></script>';
if(!$editing) {

    $script .= '<script src="' . Visitor::getInstance()->getRootPage() . '/views/formRegister.js"></script>';
    $script .= "        <script type=\"text/javascript\">
            $(function () {
                $('#formationDate').datetimepicker({
                					pickTime: false
                });
            });
</script>";
}
