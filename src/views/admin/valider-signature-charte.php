<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Validation de la charte</h1>
    <h2>Chartes à valider <?='('.count($usersToValid).')'; ?></h2>
    <table class="table table-striped">
        <tr>
            <th>N° ADELI</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Courriel</th>
            <th colspan="2">Signée</th>
        </tr>
        <?php
        foreach($usersToValid as $user) {
            echo '<tr>';
            echo '<td>'.$user->getAdeliNumber().'</td>';
            echo '<td>'.$user->getLastName().'</td>';
            echo '<td>'.$user->getFirstName().'</td>';
            echo '<td  style="font-size: 8pt; font-family: courrier;">'.$user->getMail().'</td>';
            echo '<td><a href="?valid='.$user->getId().'"><i style="color: green;" class="glyphicon glyphicon-ok"></i></a></td>';
            echo '<td><a href="?unvalid='.$user->getId().'"><i style="color: red;" class="glyphicon glyphicon-remove"></i></a></td>';

            echo '</tr>';
        }
        ?>
    </table>

    <h2>Chartes signées <?='('.count($usersValides).')'; ?></h2>
    <table class="table table-striped">
        <tr>
            <th>N° ADELI</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Courriel</th>
            <th colspan="2">Signée</th>
        </tr>
        <?php
        foreach($usersValides as $user) {
            echo '<tr>';
            echo '<td>'.$user->getAdeliNumber().'</td>';
            echo '<td>'.$user->getLastName().'</td>';
            echo '<td>'.$user->getFirstName().'</td>';
            echo '<td  style="font-size: 8pt; font-family: courrier;">'.$user->getMail().'</td>';
            echo '<td><a href="?valid='.$user->getId().'"><i style="color: green;" class="glyphicon glyphicon-ok"></i></a></td>';
            echo '<td><a href="?unvalid='.$user->getId().'"><i style="color: red;" class="glyphicon glyphicon-remove"></i></a></td>';

            echo '</tr>';
        }
        ?>
    </table>

    <h2>Chartes non signées <?='('.count($usersNotValidates).')'; ?></h2>
    <table class="table table-striped">
        <tr>
            <th>N° ADELI</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Courriel</th>
            <th colspan="2">Signée</th>
        </tr>
        <?php
        foreach($usersNotValidates as $user) {
            echo '<tr>';
            echo '<td>'.$user->getAdeliNumber().'</td>';
            echo '<td>'.$user->getLastName().'</td>';
            echo '<td>'.$user->getFirstName().'</td>';
            echo '<td  style="font-size: 8pt; font-family: courrier;">'.$user->getMail().'</td>';
            echo '<td><a href="?valid='.$user->getId().'"><i style="color: green;" class="glyphicon glyphicon-ok"></i></a></td>';
            echo '<td><a href="?unvalid='.$user->getId().'"><i style="color: red;" class="glyphicon glyphicon-remove"></i></a></td>';

            echo '</tr>';
        }
        ?>
    </table>

</div>
