<?php $breadcrumb->display()?>
<div class="container-fluid">
<?php
if(!$editing) {
    echo '<h1>Formulaire d\'inscription</h1>';
    echo '<div class="col-xs-14 col-sm-10 col-md-11 col-sm-offset-1 col-md-offset-2">
            <div class="alert alert-warning">
                <strong>Attention!</strong>
                Votre inscription sera validée manuellement par un membre du CA après réception de votre paiement.<br/>
                Cette adhésion, et donc l\'accès au site, est valable jusqu\'au 1er Janvier de l\'année suivante. <br/><br/>

                Si vous vous êtes déjà inscrit à l\'association par le passé, et avez rempli ce formulaire, merci de réadhérer via le lien suivant :
    <a href="'.Visitor::getRootPage().'/readherer.php">Réadhérer à l\'association</a>
            </div>';
    $user = new models\User();
} else {
    echo '<h1>Editer vos informations</h1>';
    $user = VIsitor::getInstance()->getUser();
}
?>

            <form role="form" method="post">
<?php
if(!$editing) {
    echo '<h2>Adhérez à l\'AFMcK! <small>Et profitez de tous ses avantages</small></h2>';
}
?>
        <hr class="colorgraph">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <input required="required" type="text" name="firstName" id="firstName"
                           class="form-control input-lg" placeholder="Prénom" tabindex="1"
                           value="<?= $user->getFirstName()?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <input required="required" type="text" name="lastName" id="lastName"
                           class="form-control input-lg" placeholder="Nom de famille" tabindex="2"
                           value ="<?= $user->getLastName();?>"
                           >
                </div>
            </div>
        </div>
        <div class="form-group">
            <input required="required" type="text" name="adeliNumber" id="adeliNumber"
                   class="form-control input-lg" placeholder="Numéro ADELI" tabindex="3"
                   value="<?= $user->getAdeliNumber();?>"
                   >
                   <span id="adeli" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Numéro valide
        </div>
        <fieldset>
            <legend>Contact</legend>

            <div class="form-group">
            <div class="input-group input-group-lg">
                <input required="required" type="email" name="email" id="email"
                       class="form-control input-lg" placeholder="Adresse e-mail" tabindex="4"
                       value="<?= $user->getMail();?>"
                       >
              <span class="input-group-addon" id="sizing-addon1">@</span>
            </div>
            </div>
                    <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                            <div class="input-group input-group-lg">
                    <input required="required" type="text" name="phonePro" id="phonePro" data-format="dd dd dd dd dd"
                           class="form-control input-lg bfh-phone" placeholder="Téléphone professionnel" tabindex="5"
                           value="<?= ($user->getPhonePro() != 0 ? $user->getPhonePro() : "");?>"
                           >
                         <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-earphone"></i></span>

                </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                            <div class="input-group input-group-lg">
                    <input type="text" name="phoneMobile" id="phoneMobile" data-format="dd dd dd dd dd"
                           class="form-control input-lg bfh-phone" placeholder="Téléphone mobile" tabindex="6"
                           value="<?= $user->getPhoneMobile();?>"
                           >
                                         <span class="input-group-addon" id="sizing-addon1">
                                         <i class="glyphicon glyphicon-phone"></i></span>

                           </div>
                </div>
            </div>
        </div>

        </fieldset>

        <fieldset>
        <legend>Adresse</legend>
        <div class="form-group">
                            <div class="input-group input-group-lg">
            <input required="required" type="text" name="address" id="address"
                   class="form-control input-lg" placeholder="Adresse (Rue et numéro de rue)" tabindex="7"
                   value="<?= $user->getAddress();?>">
                                         <span class="input-group-addon" id="sizing-addon1">
                                         <i class="glyphicon glyphicon-envelope"></i></span>
                   </div>
        </div>
                <div class="form-group">
                            <div class="input-group input-group-lg">
            <input type="text" name="complementAddress" id="complementAddress"
                   class="form-control input-lg" placeholder="Complément d'adresse (Bâtiment, Appartement, …)" tabindex="8"
                   value="<?= $user->getComplementAddress();?>">
                                         <span class="input-group-addon" id="sizing-addon1">
                                         <i class="glyphicon glyphicon-envelope"></i></span>
                   </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <input required="required" type="text" name="cp" id="cp"
                           class="form-control input-lg" placeholder="Code postal" tabindex="9"
                           value="<?php echo$user->getCp();?>"
                           >
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <input required="required" type="text" name="town" id="town"
                           class="form-control input-lg" placeholder="Ville" tabindex="10"
                           value="<?= $user->getTown();?>"
                           >
                </div>
            </div>
        </div>
        </fieldset>
        <?php
        if(!$editing) {
        echo '
        <fieldset>
        <legend>Mot de passe</legend>';
            include('includes/formPassword.php');
        echo '
        </fieldset>
            ';
        }
        ?>
        <fieldset style="margin-top: 15px;">
        <legend>Formation MDT</legend>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <select tabindex="13" class="selectpicker form-control input-lg" required="required" id="levelFormation" name="levelFormation">
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
                    <div required="required" class='input-group date input-group-lg' id="formationDate">
                        <input data-date-format="MM/YYYY" tabindex="14" type='text'  id='formationDate1' name='formationDate' placeholder="Date de validation" class="form-control input-lg"
                        value="<?= ($user->getFormationDate() != NULL ? $user->getFormationDate()->format("m/Y") : "");?>"
                        />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        </fieldset>
        <fieldset>
            <legend>Charte de bonnes pratiques</legend>
            <div class="form-group">
             <label><input tabindex="15" type="checkbox" <?php if($user->getHasSigned() && $editing) echo "checked=checked"; ?>
    name="signed" id="signed"> &nbsp;Je souhaite signer la charte de bonnes pratiques</label>
            </div>
        </fieldset>
        <!-- Button trigger modal -->
<!-- Modal -->
<div  class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div style="width: 70%" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div style="width: 100%;margin:auto" class="modal-body">
          <object style="width: 100%; margin:auto;" type="application/pdf" data="<?= Visitor::getRootPage().'/docs/members/charte des praticiens adherents AFMcK.pdf';?>" width="500" height="500">this is not working as expected</object>
      </div>
      <div class="modal-footer">
        <button type="button" id="acceptBtn" class="btn btn-primary">je comprends et accepte les engagements inhérents à la signature de cette charte</button>
        <button type="button" id="closeBtn" class="btn btn-default" data-dismiss="modal">je refuse de signer la charte pour le moment</button>
      </div>
    </div>
  </div>
</div>
    <fieldset>
            <legend>Paiement</legend>
            <div class="form-group">
                <select tabindex="16" class="selectpicker form-control input-lg" required="required" id="payment" name="payment">
                    <option disabled selected>Moyen de paiement</option>
                    <option <?php if($user->getPayment()->getIdType() == 1) echo "selected"?> value="1">Chèque</option>
                    <option <?php if($user->getPayment()->getIdType() == 2) echo "selected"?> value="2">Virement bancaire</option>
                    <option <?php if($user->getPayment()->getIdType() == 3) echo "selected"?> value="3">Carte bancaire via helloasso.com</option>
                </select>
            </div>

            <div class="form-group">
                <select tabindex="17" class="selectpicker form-control input-lg" required="required" id="valuePaid" name="valuePaid">
                    <option disabled selected>Montant de la cotisation</option>
                    <option <?php if($user->getValuePaid() == 60) echo "selected"?> value="60">Libéral : 60€</option>
                    <option <?php if($user->getValuePaid() == 40) echo "selected"?> value="40">Salarié : 40€</option>
                    <option <?php if($user->getValuePaid() == 100) echo "selected"?> value="100">Membre bienfaiteur : 100€ et +</option>
                </select>
            </div>
        </fieldset>
        <fieldset>
            <legend>Newsletter</legend>
            <div class="form-group">
                     <label><input tabindex="18" type="checkbox" <?php if(!$user->getNewsletter() && $editing) echo "checked=checked";?>
                     name="newsletter" id="newsletter"> &nbsp;Je ne souhaite pas recevoir la newsletter</label>
            </div>
        </fieldset>

        <hr class="colorgraph">
            <button id="submit" type="submit" style="margin: auto; width: 250px; "
            class="btn btn-primary btn-block btn-lg">
                <i class="glyphicon glyphicon-ok-sign"></i>
                <?= (!$editing ? "Je m'inscris" : "Modifier mes informations")?>
            </button>
    </form>
    <p></p>
    <p><br/></p>
</div>
</div>
</div>
<?php
$script = '<script src="' . Visitor::getRootPage() . '/style/js/moment.js"></script>';
$script .= '<script src="' . Visitor::getRootPage() . '/style/js/bootstrap-select.min.js"></script>';
$script .= '<script src="' . Visitor::getRootPage() . '/style/js/bootstrap-datetimepicker.js"></script>';
$script .= '<script src="' . Visitor::getRootPage() . '/style/js/bootstrap-formhelpers.min.js"></script>';

$script .= "
        <script type=\"text/javascript\">
            $(function () {
                $('#formationDate').datetimepicker({
                					pickTime: false,
                					viewMode: 'months',
                					minViewMode: 'months'
                });
            });
             $('.selectpicker').selectpicker();
            $('#signed').click(function () {
                if ($(this).prop('checked')) {
                    $('#myModal').collapse('show');
                }
            });
             $('#closeBtn').click(function() {
                 $('#myModal').collapse('hide');
                 $('#signed').attr('checked', false);
             });
             $('#acceptBtn').click(function() {
                 $('#myModal').collapse('hide');
             });
</script>";

if(!$editing) {
    $script .= '<script src="' . Visitor::getRootPage() . '/views/formRegister.js"></script>';
}
