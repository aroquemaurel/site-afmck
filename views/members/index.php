<?php $breadcrumb->display()?>

<div class="container-fluid">
    <?php
    if(Visitor::getInstance()->getUser()->mustSignedChart()) {
        echo '<div class="alert alert-warning" role="alert">';
        echo "Vous êtes actuellement d'un niveau D ou supérieur et vous n'avez pas encore signé la charte, qui vous permettrai de figurer sur la carte des praticiens.<br/>
            Si vous souhaitez signer la charte, vous pouvez vous rendre sur cette <a href=\"".Visitor::getInstance()->getRootPage()."/members/signer-la-charte.php\">page</a>
 </div>";
    }
    ?>
    <div class="row">
        <div class="col-md-7">
            <?= \viewers\NewsViewer::getHtmlNew($lastNew, 750); ?>
        </div>
        <div class="col-md-5">
            <div class="row">
            <h2>Dernières actualités</h2>
            </div>
            <div class="row">
                <h2>Demandes de remplacement</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7">
        <h2>Dernières news <small style="right: 130px; position: absolute"><a href="#">Toutes les news</a></small></h2>
                <?php
                foreach($listNews as $new) {
                    echo '<a href="#">';
                    echo '<h3>'.$new->getTitle().' <small>'.$new->getSubtitle().'</small></h3>';
                    echo '<p style="font-size: 8pt">Par '.$new->getAuthor()->toString().' le ' . $new->getDate()->format('d / m / Y à H:i').'</p>';
                    echo '</a>';
                }
                ?>
            </div>
        <div class="col-md-5">
            <h2>Derniers sujets sur le forum</h2>
        </div>
        </div>

    </div>
<?php
//    include('news.php');
?>
<div style="padding-right: 80px;">

</div>
</div>

<?php
