<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Liste des newsletter</h1>
    <p><a href="<?php echo Visitor::getInstance()->getRootPage()."/admin/add-news.php";?>"><button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;AJouter une news</button></a><br/><br/>
    </p>
    <?php
    (new utils\Pagination($page, $nbPages, Visitor::getInstance()->getRootPage().'/admin/list-news.php'))->display();
    ?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($news as $new) {
        echo '<tr href="'.Visitor::getInstance()->getRootPage().'/admin/user.php?id='.$new->getId().'">'.
            '<td>'.$new->getTitle().' <small>'.$new->getSubtitle().'</small></td>'.
            '<td><i class="glyphicon glyphicon-user"></i> '.($new->getAuthor()->getFirstname().' '.$new->getAuthor()->getLastname()).'</td>'.
            '<td>'.($new->getDate()->format('d/m/Y à H:i')).'</td>'.
            '<td>'.(
            !$new->isSend() ? ('<a href="'.Visitor::getInstance()->getRootPage().'/admin/envoyer-news.php?id='.$new->getId().'">
            <i class="glyphicon glyphicon-envelope"></i></a>')
                                        : '<i class="glyphicon glyphicon-envelope"></i>'
        ).
            '&nbsp;&nbsp;<a href="'.Visitor::getInstance()->getRootPage().'/admin/editer-news.php?id='.$new->getId().'">
            <i class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp;
            <a href="'.Visitor::getInstance()->getRootPage().'/admin/supprimer-news.php?id='.$new->getId().'">
            <i class="glyphicon glyphicon-trash"></i></a>
            </td>';
            echo '</tr>';
        }
?>
        </tbody> </table>
    <?php
    (new utils\Pagination($page, $nbPages, Visitor::getInstance()->getRootPage().'/admin/list-news.php'))->display();
    ?>
    </div>
