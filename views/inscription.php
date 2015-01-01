<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Formulaire d'inscription</h1>


        <div class="col-xs-14 col-sm-10 col-md-11 col-sm-offset-1 col-md-offset-2">
            <div class="alert alert-warning">
                <strong>Attention!</strong> Votre inscription n'est possible que si vous êtes adhérent à l'association. <br/>
                Votre inscription sera validée manuellement par un membre du CA. Une fois validée, cette inscription sera valable pendant un an.
            </div>
            <form role="form" method="post">
                <h2>Inscrivez-vous ! <small>Pour pouvoir profiter du site</small></h2>
                <hr class="colorgraph">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input required="required" type="text" name="firstName" id="firstName"
                                   class="form-control input-lg" placeholder="Prénom" tabindex="1">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input required="required" type="text" name="lastName" id="lastName"
                                   class="form-control input-lg" placeholder="Nom de famille" tabindex="2">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input required="required" type="text" name="adeliNumber" id="adeliNumber"
                           class="form-control input-lg" placeholder="Numéro ADELI" tabindex="3">
                </div>
                <div class="form-group">
                    <input required="required" type="email" name="email" id="email"
                           class="form-control input-lg" placeholder="Adresse e-mail" tabindex="4">
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input required="required" type="password" name="password" id="password" autocomplete="off" class="form-control input-lg"
                                   placeholder="Mot de passe" tabindex="5">
                        </div>
                        <span id="8char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Longueur 6 caractères<br>
                        <span id="ucase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Une lettre majuscule
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input required="required" type="password" name="passwordConfirmation" autocomplete="off" id="passwordConfirmation"
                                   class="form-control input-lg" placeholder="Confirmation du mot de passe" tabindex="6">
                        </div>
                        <span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Les deux mots de passes sont différents<br>
                    </div>
                </div>
                <div class="form-group" style="margin-top: 15px">
                    <input required="required" type="email" name="address" id="address"
                           class="form-control input-lg" placeholder="Adresse" tabindex="7">
                </div>
                                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input required="required" type="text" name="cp" id="cp"
                                   class="form-control input-lg" placeholder="Code postal" tabindex="8">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input required="required" type="text" name="town" id="town"
                                   class="form-control input-lg" placeholder="Ville" tabindex="9">
                        </div>
                    </div>
                </div>
                <hr class="colorgraph">
                    <button id="submit" type="submit" style="margin: auto; width: 200px; "class="btn btn-primary btn-block btn-lg" >
                        <i class="glyphicon glyphicon-ok-sign"></i> Je m'inscris
                    </button>
            </form>
            <p></p>
            <p><br/></p>
        </div>
</div>
</div>
<?php
$script = '<script src="'.Visitor::getInstance()->getRootPage().'/views/formRegister.js"></script>';
