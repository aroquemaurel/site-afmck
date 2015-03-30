<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Je signe la charte !</h1>
    <div class="alert alert-info">
        <p>
            Votre demande de signature a bien été prise en compte par l'association, le secrétariat en a été informé
        </p>
    </div>

    <p>
        Afin que votre demande soit bien prise en compte et que vous apparaissez sur la liste des praticiens,
        vous devez signer la charte ci-dessous, la scanner et la renvoyer par e-mail à l'adresse suivante
    </p>
    <div class="bs-callout bs-callout-info">
        <p><a href="mailto:secretariat@afmck.fr">secretariat@afmck.fr</a></p>
        <p>Merci de nous signaler si vous possédez déjà la charte plastifiée, afin de ne pas vous la renvoyer.</p>
    </div>

    <p style="text-align: center"><a href="<?php echo Visitor::getInstance()->getRootPage()."/docs/members/charte des praticiens adherents AFMcK.pdf";?>">
            <button class="btn btn-primary"><i class="glyphicon glyphicon-download-alt"></i>
                &nbsp;Télécharger la charte de bonnes pratiques</button></a></p>


    <p>Une fois que la charte signée aura été reçue, vous recevrez un mail de confirmation.

        Vous allez également recevoir par la poste une charte plastifiée que vous devez afficher dans votre cabinet.
    </p>
</div>
