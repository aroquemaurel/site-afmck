<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Validation des inscriptions</h1>
    <h2>Comptes à valider</h2>
    <table class="table table-striped">
        <tr>
            <th>N° ADELI</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Courriel</th>
            <th>Date attente validation</th>
            <th colspan="2">Valider</th>
        </tr>
        <?php
        foreach($usersDisable as $user) {
            echo '<tr>';
                echo '<td>'.$user->getAdeliNumber().'</td>';
                echo '<td>'.$user->getLastName().'</td>';
                echo '<td>'.$user->getFirstName().'</td>';
                echo '<td  style="font-size: 8pt; font-family: courrier;">'.$user->getMail().'</td>';
                echo '<td>'.$user->getAskValidation()->format("Y-m-d").'</td>';
                echo '<td><a href="?valid='.$user->getId().'"><i style="color: green;" class="glyphicon glyphicon-ok"></i></a></td>';
                echo '<td><a href="?unvalid='.$user->getId().'"><i style="color: red;" class="glyphicon glyphicon-remove"></i></a></td>';

            echo '</tr>';
        }
        ?>
    </table>

    <h2>Comptes qui seront désactivés prochainement</h2>
    <table class="table table-striped">
        <tr>
            <th>N° ADELI</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Courriel</th>
            <th>Date attente validation</th>
            <th colspan="2">Valider</th>
        </tr>
        <?php
        foreach($users as $user) {
            echo '<tr>';
            echo '<td>'.$user->getAdeliNumber().'</td>';
            echo '<td>'.$user->getLastName().'</td>';
            echo '<td>'.$user->getFirstName().'</td>';
            echo '<td  style="font-size: 8pt; font-family: courrier;">'.$user->getMail().'</td>';
            echo '<td>'.$user->getAskValidation()->format("Y-m-d").'</td>';
            echo '<td><a href="?valid='.$user->getId().'"><i style="color: green;" class="glyphicon glyphicon-ok"></i></a></td>';
            echo '<td><a href="?unvalid='.$user->getId().'"><i style="color: red;" class="glyphicon glyphicon-remove"></i></a></td>';

            echo '</tr>';
        }
        ?>
    </table>

</div>