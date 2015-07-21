<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Liste des documents</h1>
    <table class="table table-striped">
        <tr>
        <th>Titre</th>
        <th>Description</th>
        <th>Tags</th>
        <th>Truc</th>
        </tr>
    <?php
    foreach($docs as $doc) {
        echo '<tr>';
        echo '<td>'.$doc->getTitle().'</td>';
        echo '<td>'.$doc->getDescription().'</td>';
        echo '<td>';
        foreach($doc->getTags() as $tag) {
            echo '<span class="label label-primary">'.$tag.'</span> ';
        }
        echo '</td>';
        echo '<td></td>';
        echo '</tr>';
                foreach($doc->getFiles() as $file) {
//                    echo $file->getTitle().' '.$file->getPath();
                }
    }
    ?>
    </table>
</div>