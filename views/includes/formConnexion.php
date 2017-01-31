<form action="<?=Visitor::getRootPage().'/'.(isset($readhesion) ? "readherer.php" : "connexion.php") ;?>" method="post">
    <div class="form-group">
        <label for="inputAdeli">Numéro ADELI</label>
        <input type="string" name="inputAdeli" class="form-control" id="inputAdeli" placeholder="Numéro ADELI">
    </div>
    <div class="form-group">
        <label for="inputPassword">Mot de passe</label>
        <input type="password" name="inputPassword" class="form-control" id="inputPassword" placeholder="Mot de passe">
    </div>
    <?php
    if(!isset($readhesion)) {
    ?>
        <div class="checkbox">
            <label><input type="checkbox" name="remember">Se souvenir de moi</label>
        </div>
    <?php
        }
    ?>
    <div class="form-group" style="margin: auto;text-align: center">
        <button type="submit" class="btn btn-primary""><i class="glyphicon glyphicon-user"></i>&nbsp; Se connecter</button>
    </div>
    <p style="text-align: center"><a href="forgetpassword.php">J'ai oublié mon mot de passe</a></p>
    <?php
    if(!isset($readhesion)) {
        ?>
    <p style="text-align: center"><a href="<?=Visitor::getRootPage();?>/readherer.php">Réadhérer à l'association</a></p>
    <?php
    }
?>
</form>
