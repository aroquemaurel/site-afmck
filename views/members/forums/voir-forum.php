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

        if(!$topic->isHided() || ($topic->isHided() && Visitor::getInstance()->getUser()->isModerator())) {
            echo '<tr class="'.($topic->hasRead(Visitor::getInstance()->getUser())?'read': 'unread').'" >';
        // If we have to display topic (we are moderator or the topic is not hided)
            echo '<td>' .
                ($topic->isNew(Visitor::getInstance()->getUser()) ? '<i class="label label-info new">Nouveau</i> ' : '') .
                '<a href="' . Visitor::getRootPage() . '/members/forums/sujets/voir.php?id=' . $topic->getId() . '">' .
                ($topic->isHided() ? '<i class="glyphicon glyphicon-eye-close"></i>&nbsp;':'').
                ($topic->isLocked() ? '<i class="glyphicon glyphicon-lock"></i>&nbsp;' : '') . $topic->getTitle() . '</a><br>';
            if ($topic->getSubtitle() != null && $topic->getSubtitle() != "") {
                echo '<p><em style="font-size: 10pt">' . $topic->getSubtitle() . '</em></p>';
            }
            echo '<p style="font-size: 8pt">Par ' . $topic->getCreator()->getName() . ' le ' . Utils::getPlainDate($topic->getDate()) . '</p>';
            echo '</td>';
            $nbPosts = $topic->getNbPosts($entityManager);
            $lastPost = $topic->getLastPost($entityManager);
            echo '<td style="width: 100px;" class="forum-stats">'.$nbPosts.' message'.($nbPosts > 1 ? 's':'').'</td>';
            echo '<td class="forum-stats">Dernier message de <br/><b>'.$lastPost->getUser()->getName().'</b> <br/>le '.($lastPost->getDate()->format('d/m/Y à H:i')).'</td>';
            echo '</tr>';
        }
    }
    ?>
    </table>
</div>