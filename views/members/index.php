<?php $breadcrumb->display()?>

<div class="container-fluid">
<?php
include('news.php');
?>
<div class="bs-callout bs-callout-info">
<h2><center>Les Inscriptions aux 5èmes journées de l’AFMcK sont ouvertes !</center></h2>
<center>
<p>
<iframe frameborder="0" width="480" height="270" src="//www.dailymotion.com/embed/video/kKWmwwQ84aulYndvLPH" allowfullscreen></iframe><br /><a href="http://www.dailymotion.com/video/kKWmwwQ84aulYndvLPH" target="_blank">AFMcK - 5e congr&egrave;s - Montpellier</a> <i>par <a href="http://www.dailymotion.com/antoinederoquemaurel" target="_blank">antoinederoquemaurel</a></i>
</p>
</center>
<div class="alert alert-warning">
<p>
Les inscriptions sont réservées aux adhérents jusqu’au 6 novembre et ouvertes à tous ensuite ! Dépéchez-vous de vous inscrire :) 
</p>
</div>
<ul>
<li>
<strong>Etape 1</strong> : Lire le programme & Informations pratiques : <a href="<?php echo Visitor::getInstance()->getRootPage();?>/docs/members/afmckday/montpellier/programme-montpellier.pdf">Programme</a>
</li><li>
<strong>Etape 2</strong> : Pour vous inscrire remplissez le formulaire : <a href="https://docs.google.com/forms/d/1NrUETlyEZKwsma10d-MQhLiTH-w7VhpAMezK1d32My4/viewform?c=0&w=1">Inscription au congrès</a></p>
</li>
<li>
<strong>Etape 3</strong> : Envoyez votre chèque à cette adresse : 
</li>
</ul>
<div class="alert alert-info">
<p>Anne-Marie GASTELLU-ETCHEGORRY<br/>
27 av. du 10ème Dragon<br/>
82000 Montauban</p>
</div>

<p>Vous trouverez plus d'informations pratiques ici :  <a href="<?php echo Visitor::getInstance()->getRootPage();?>/members/travaux-association/journees/2016-montpellier.php">Montpellier 2016</a>.</p>

<p>Rendez vous à Montpellier !!!</p>

<p>Toute l’équipe de l’AFMcK </p>
</p>
</div>
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
