<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Liste des documents</h1>
    <table class="table table-striped">
        <tr>
        <th>Titre</th>
        <th>Description</th>
        <th>Tags</th>
        </tr>
    <?php
    foreach($docs as $doc) {
        echo '<tr>';
        echo '<td><a href="'.$doc->getFiles()[0]->getPath().'">'.$doc->getTitle().'</a></td>';
        echo '<td><a href="'.$doc->getFiles()[0]->getPath().'">'.$doc->getDescription().'</a></td>';
        echo '<td>';
        foreach($doc->getTags() as $tag) {
            echo '<span class="label label-primary">'.$tag.'</span> ';
        }
        echo '</td>';
        echo '</tr>';

    }
    ?>
    </table>
</div>