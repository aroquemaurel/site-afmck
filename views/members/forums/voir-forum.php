<?php use utils\Utils;

$breadcrumb->display()?>
<div class="container" style="">
    <h1>Voir le forum « <?php echo $forum->getName();?> »</h1>

    <a href="<?php echo Visitor::getRootPage().'/members/forums/sujets/nouveau.php?forum='.$forum->getId();?>">
        <button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;Créer un nouveau sujet</button>
    </a>

    <table class="table table-hover forum-list" style="margin-top: 15px;">
    <?php
    foreach($forum->getTopics() as $topic) {
        //$style = ($topic->hasRead(Visitor::getInstance()->getUser())?'':'');

        echo '<tr class="'.($topic->hasRead(Visitor::getInstance()->getUser())?'read': 'unread').'" >';
        echo '<td>'.
            '<a href="'.Visitor::getRootPage().'/members/forums/sujets/voir.php?id='.$topic->getId().'">'.
            ($topic->isLocked() ? '<i class="glyphicon glyphicon-lock"></i>&nbsp;':'').$topic->getTitle().'</a><br>';
        if($topic->getSubtitle() != null && $topic->getSubtitle() != "") {
            echo '<p><em style="font-size: 10pt">' . $topic->getSubtitle() . '</em></p>';
        }
        echo '<p style="font-size: 8pt">Par '.$topic->getCreator()->getName().' le '.Utils::getPlainDate($topic->getDate()).'</p>';
        echo '</td>';
        $nbPosts = count($topic->getPosts());
        $lastPost = $topic->getPosts()[$nbPosts-1];
        echo '<td style="width: 100px;" class="forum-stats">'.$nbPosts.' message'.($nbPosts > 1 ? 's':'').'</td>';
        echo '<td class="forum-stats">Dernier message de <br/><b>'.$lastPost->getUser()->getName().'</b> <br/>le '.($lastPost->getDate()->format('d/m/Y à h:i')).'</td>';
        echo '</tr>';
    }
    ?>
    </table>
</div>