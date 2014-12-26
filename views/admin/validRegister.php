<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Validation des inscriptions</h1>
    <table class="table table-striped">
        <tr>
            <th>Numéro ADELI</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Mail</th>
            <th>Date attente validation</th>
            <th></th>
        </tr>
        <?php
        foreach($users as $user) {
            echo '<tr>';
                echo '<td>'.$user->getAdeliNumber().'</td>';
                echo '<td>'.$user->getLastName().'</td>';
                echo '<td>'.$user->getFirstName().'</td>';
                echo '<td  style="font-size: 8pt; font-family: courrier;">'.$user->getMail().'</td>';
                echo '<td>'.$user->getAskValidation().'</td>';

            echo '</tr>';
        }
        ?>
    </table>
</div>