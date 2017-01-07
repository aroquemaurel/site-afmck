<?php use utils\StringHelper;
use utils\Utils;

$breadcrumb->display()?>
<div class="container forums-page">
    <h1><?= $title;?></h1>
    <?php
    $catIt = 0;
    foreach($categories as $category) {
        $thereIsForum = false;
        foreach($category->getForums() as $forum) {
            if($forum->hasRights(Visitor::getInstance()->getUser())) {
               $thereIsForum = true;
                break;
            } 
        }

        if($thereIsForum) {
                echo '<h3>'.$category->getName().'</h3>';
                $isAdmin = $title == 'Administration des forums';
                \viewers\forums\ForumViewer::getTableForumsOfCategory($category, $isAdmin, $catIt, $categories);
        }
        ++$catIt;
    }
    ?>
    </table>
</div>
