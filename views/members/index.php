<?php $breadcrumb->display()?>

<div class="container-fluid">
<?php
include('news.php');
?>
<!--<p>Le congrés AFMcK 2016 approche à grand pas ! <br/>Vous pouvez avoir accès à toutes les informations pratiques ici : 
<p>Pour vous inscrire, veuillez <b>remplir le formulaire</b> suivant : 
</div>

    <h1>Bienvenue sur le site de l'Association Française McKenzie</h1>-->
<div style="padding-right: 80px;">
    <?php
        if(Visitor::getInstance()->getUser()->mustSignedChart()) {
            echo '<div class="alert alert-warning" role="alert">';
            echo "Vous êtes actuellement d'un niveau D ou supérieur et vous n'avez pas encore signé la charte, qui vous permettrai de figurer sur la carte des praticiens.<br/>
            Si vous souhaitez signer la charte, vous pouvez vous rendre sur cette <a href=\"".Visitor::getInstance()->getRootPage()."/members/signer-la-charte.php\">page</a>
 </div>";
        }
    ?>

<div class="alert alert-info">
Bienvenue sur le site de l'Association Française McKenzie !<br/>
Si vous avez des remarques sur le site, ou avez un problème avec le site, merci d'envoyer un courriel à <a href="mailto:maintenance@afmck.fr">maintenance@afmck.fr</a>, votre aide nous est précieuse ! </div>
    <?php
    echo '<div style="margin-bottom: 0px;">';
    (new utils\Pagination($page, $nbPages, Visitor::getInstance()->getRootPage().'/members/index.php'))->display();
    echo '</div>';
    foreach($news as $new) {
        echo '<div style="padding-right: 80px">';
        echo '<h2>'.$new->getTitle().'&nbsp;<small>'.$new->getSubtitle().'</small></h2>';
        echo '<p style="margin-top: -8px;margin-bottom:15px"><small>Posté le '.$new->getDate()->format('d / m / Y à H:i').' par '.$new->getAuthor()->getFirstName().' '.$new->getAuthor()->getLastname().'</small></p>';
        echo $new->getContent();
        echo '</div>';
    }
    (new utils\Pagination($page, $nbPages, Visitor::getInstance()->getRootPage().'/members/index.php'))->display();
    ?>
</div>
</div>

<?php
