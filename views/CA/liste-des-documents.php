<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Liste des documents</h1>
    <?php
    $canEdit =Visitor::getInstance()->getUser()->isInGroup('SECRETAIRE') || Visitor::getInstance()->getUser()->isInGroup('ADMINISTRATEUR');
    if($canEdit) {
        echo '<a href="'.VIsitor::getInstance()->getRootPage().'/admin/add-document.php"><button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;Ajouter un document</button></a><br/><br/>';
    }
    ?>
    <table class="table table-striped">
        <tr>
        <th>Titre</th>
        <th>Description</th>
        <th>Mots clés</th>
        <th>Auteur</th>
            <?php
            if($canEdit) {
                echo '<th>Actions</th>';
            }
            ?>
        </tr>
    <?php
    foreach($docs as $doc) {
        echo '<tr>';
        echo '<td><a href="'.VIsitor::getInstance()->getRootPage().'/docs/CA/'.$doc->getFiles()[0]->getPath().'">'.$doc->getTitle().'</a></td>';
        echo '<td><a href="'.VIsitor::getInstance()->getRootPage().'/docs/CA/'.$doc->getFiles()[0]->getPath().'">'.$doc->getDescription().'</a></td>';
        echo '<td>';
        foreach($doc->getTags() as $tag) {
            echo '<span class="label label-primary">'.$tag.'</span> ';
        }
        echo '</td>';
        echo '<td>'.$doc->getUser()->toString().'</td>';
        if($canEdit) {
            echo '<td>';
//                    <a href="'.VIsitor::getInstance()->getRootPage().'/admin/add-document.php?d='.$doc->getId().'">
  //                      <i class="glyphicon glyphicon-pencil"></i>
    //                </a>&nbsp;
            echo '  <a href="?remove=1&d='.$doc->getId().'">
                        <i class="glyphicon glyphicon-trash"></i>
                    </a>
                </td>';
        }
        echo '</tr>';

    }
    ?>
    </table>
</div>