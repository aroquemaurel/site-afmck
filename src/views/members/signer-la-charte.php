<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Je souhaite signer la charte</h1>
    <div class="alert alert-info">
    <p>Vous souhaitez signer la charte ? Vous êtes au bon endroit !</p>
    </div>
    <?php
    if(!Visitor::getInstance()->getUser()->mustSignedChart()) {
        ?>
        <div class="bs-callout bs-callout-warning">
    <p>Vous pouvez signer la charte et l'afficher dans votre cabinet, cependant tant que vous n'êtes pas niveau D ou supérieur, vous n'apparaitrez pas dans la liste des praticiens signataires.</p>
    </div>
<?php
    } else {
    ?>
        <div class="bs-callout bs-callout-warning">
            <p>Vous êtes actuellement de niveau D ou supérieur, une fois la charte signée, vous aller donc apparaître sur la carte des praticiens.<br/>
        Attention, si vous restez niveau D pendant 2 ans sans être certifié, vous serez supprimé de la carte</p>
    </div>
    <?php
    }
    ?>

    Afin de signer la charte, de recevoir un exemplaire plastifié, et d'éventuellement apparaitre sur le carte,
    vous pouvez cliquer sur le lien ci-dessous.
                <div style="width: 100%;margin:auto" class="modal-body">
                    <object style="width: 100%; margin:auto;" type="application/pdf" data="<?= Visitor::getRootPage().'/docs/members/charte des praticiens adherents AFMcK.pdf';?>" width="500" height="500">this is not working as expected</object>
                </div>
                <div style="text-align: center">
                    <a href="<?= Visitor::getRootPage()."/members/je-signe.php";?>"><button type="button" id="acceptBtn" class="btn btn-primary"><i class="glyphicon glyphicon-ok-sign"></i>&nbsp;Je comprends et accepte les engagements inhérents à la signature de cette charte</button></a>
                </div>

</div>
