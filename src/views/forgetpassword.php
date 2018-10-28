<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>J'ai oublié mon mot de passe</h1>
    <form role="form" method="post">
        <div class="form-group">
            <input required="required" type="text" name="adeliNumber" id="adeliNumber"
                   class="form-control input-lg" placeholder="Numéro ADELI" tabindex="3"
                >
        </div>
        <div class="form-group">
            <input required="required" type="email" name="email" id="email"
                   class="form-control input-lg" placeholder="Adresse e-mail" tabindex="4"
                >
        </div>
        <hr class="colorgraph">
        <button id="submit" type="submit" style="margin: auto; width: 350px; "
                class="btn btn-primary btn-block btn-lg">
            <i class="glyphicon glyphicon-ok-sign"></i>
            Envoyer un nouveau mot de passe
        </button>

    </form>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p><p>&nbsp;</p>

</div>
