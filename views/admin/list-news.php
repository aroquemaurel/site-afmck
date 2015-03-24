<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Liste des newsletter</h1>
    <p><button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;AJouter une news</button><br/><br/>
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
            '<td><i class="glyphicon glyphicon-pencil"></i>&nbsp;&nbsp;<i class="glyphicon glyphicon-trash"></i></td>';
//            '<td  style="font-size: 8pt; font-family: courrier;">'.$new->getMail().'</td>'.
  //          '<td>'.($new->getTown()).'</td>';
            //echo '<td>'.$new->getAskValidation().'</td>';
            //echo '<td><a href="?valid='.$new->getId().'"><i style="color: green;" class="glyphicon glyphicon-ok"></i></a></td>';
    //        if($activate) {
      //      $ret .= '<td><a href="?unvalid=' . $new->getId() . '"><i style="color: red;" class="glyphicon glyphicon-remove"></i></a></td>';
       //     } else {
        //    $ret .= '<td><a href="?valid=' . $new->getId() . '"><i style="color: green;" class="glyphicon glyphicon-ok"></i></a></td>';
          //  }
            echo '</tr>';
        }
?>
        </tbody> </table>
    <?php
    (new utils\Pagination($page, $nbPages, Visitor::getInstance()->getRootPage().'/admin/list-news.php'))->display();
    ?>
    </div>
