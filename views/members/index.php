<?php
use models\forum\Post;
use viewers\AnnounceViewer;
use viewers\HomeViewer;

$breadcrumb->display()?>

<div class="container-fluid">
    <?php
    if(Visitor::getInstance()->getUser()->mustSignedChart()) {
        echo '<div class="alert alert-warning" role="alert">';
        echo "Vous êtes actuellement d'un niveau D ou supérieur et vous n'avez pas encore signé la charte, qui vous permettrai de figurer sur la carte des praticiens.<br/>
            Si vous souhaitez signer la charte, vous pouvez vous rendre sur cette <a href=\"".Visitor::getRootPage()."/members/signer-la-charte.php\">page</a>
 </div>";
    }
    ?>
    <div class="row">
        <div class="col-md-7 block-member-home">
            <?= \viewers\NewsViewer::getHtmlNew($lastNew, 750); ?>
        </div>
        <div class="col-md-5">
            <div class="row block-member-home">
                <h2>Dernières actualités</h2>
                <?= HomeViewer::getNewThings() ?>
            </div>
            <div class="row block-member-home">
                <h2>Demandes de remplacement</h2>
                <?= AnnounceViewer::getAnnouncesList($listAnnounces); ?>
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7 block-member-home">
            <?php
        echo '<h2>Dernières newsletters <small style="right: 130px; position: absolute"><a href="'.Visitor::getRootPage().'/members/newsletters/index.php">Toutes les news</a></small></h2>';
        echo \viewers\NewsViewer::getHtmlNewslettersMemberList($listNews)
                ?>
            </div>
        <div class="col-md-5 block-member-home">
            <h2>Derniers sujets sur le forum</h2>
            <?php
            $topics = array();
            $i = 0;
            foreach(Post::getLastPosts(20) as $post) {
                if($i >= 5) {
                    break;
                }
                $topic = $post->getTopic();
                if(!in_array($topic, $topics)) {
                    $topics[] = $topic;
                    echo '<a href="' . Visitor::getRootPage() . '/members/forums/sujets/voir.php?id=' . $topic->getId() . '">';
                    echo '<h3>' . $topic->getTitle() . ' <small>' . $topic->getSubtitle() . '</small></h3>';
                    echo  '<p style="font-size: 8pt">Par ' . $post->getUser()->toString() . ' le ' . $topic->getDate()->format('d / m / Y à H:i') . '</p>';
                    echo '</a>';
                    ++$i;
                }
            }
            ?>
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
