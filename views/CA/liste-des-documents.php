<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Liste des documents</h1>
    <?php
    $canEdit =Visitor::getInstance()->getUser()->isInGroup('SECRETAIRE') || Visitor::getInstance()->getUser()->isInGroup('ADMINISTRATEUR');
    if($canEdit) {
        echo '<a href="'.VIsitor::getInstance()->getRootPage().'/admin/add-document.php"><button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;Ajouter un document</button></a><br/><br/>';
    }
    ?>
    <?php
	$lastCat = null;
    foreach($docs as $doc) {
		if($doc->getCategory()->getId() != $lastCat) { // new Category
			if($lastCat != null) {
				echo ' </table>';
			}
			echo '<h2>'.$doc->getCategory()->getName().'</h2>';
			echo '<table class="table table-striped">
				<tr>
				<th style="width: 55%">Titre</th>
				<th style="width:30%">Mots clés</th>
				<th style="width: 15%">Auteur</th>';
					if($canEdit) {
						echo '<th style="width: 5%">Actions</th>';
					}
			echo '</tr>';
			$lastCat = $doc->getCategory()->getId();
		}
        echo '<tr>';
			echo '<td><a data-toggle="tooltip" title="'.$doc->getDescription().'" href="'.VIsitor::getInstance()->getRootPage().'/docs/CA/'.$doc->getFiles()[0]->getPath().'">'.$doc->getTitle().'</a></td>';
			echo '<td>';
			foreach($doc->getTags() as $tag) {
				echo '<span class="label label-primary">'.$tag.'</span> ';
			}
		echo '</td>';
        echo '<td>'.$doc->getUser()->toString().'</td>';
        if($canEdit) {
            echo '<td>';
  //                  <a href="'.VIsitor::getInstance()->getRootPage().'/admin/add-document.php?d='.$doc->getId().'">
    //                    <i class="glyphicon glyphicon-pencil"></i>
      //              </a>&nbsp';
            echo '  <a href="?remove=1&d='.$doc->getId().'">
                        <i class="glyphicon glyphicon-trash"></i>
                    </a>
                </td>';
        }
        echo '</tr>';
    }

	
	if($lastCat != null) {
	echo '</table>';
	}
    ?>

      </div>
