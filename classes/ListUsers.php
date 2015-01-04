<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 04/01/15
 * Time: 21:35
 */

class ListUsers {
    private $users;

    public function __construct($list) {
        $this->users = $list;
    }

    public function addUser(User $u) {
        $this->users[] = $u;
    }

    public function usersToString($activate) {
        $ret = "";
        $ret .= '<table class="table table-striped">
        <thead>
        <tr>
            <th>N° ADELI</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Courriel</th>
            <th>Ville</th>';
        if($activate) {
            $ret .= '<th>Désativer</th>';
        } else {
            $ret .= '<th>Activer</th>';
        }
        $ret .= '
        </tr>
        </thead>
        <tbody>';
        foreach($this->users as $user) {
            $ret .= '<tr href="'.Visitor::getInstance()->getRootPage().'/admin/user.php?id='.$user->getId().'">'.
             '<td>'.$user->getAdeliNumber().'</td>'.
            '<td>'.($user->getLastName()).'</td>'.
            '<td>'.($user->getFirstName()).'</td>'.
            '<td  style="font-size: 8pt; font-family: courrier;">'.$user->getMail().'</td>'.
            '<td>'.($user->getTown()).'</td>';
            //echo '<td>'.$user->getAskValidation().'</td>';
            //echo '<td><a href="?valid='.$user->getId().'"><i style="color: green;" class="glyphicon glyphicon-ok"></i></a></td>';
            if($activate) {
                $ret .= '<td><a href="?unvalid=' . $user->getId() . '"><i style="color: red;" class="glyphicon glyphicon-remove"></i></a></td>';
            } else {
                $ret .= '<td><a href="?valid=' . $user->getId() . '"><i style="color: green;" class="glyphicon glyphicon-ok"></i></a></td>';
            }
            $ret .= '</tr>';
        }
        $ret .= '</tbody> </table>';

        return  $ret;
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }


}