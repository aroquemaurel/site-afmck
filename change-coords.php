<?php
include('begin.php');

if(isset($_GET['key']) && isset($_GET['id']) && isset($_GET['lgt']) && isset($_GET['lat'])) {
    if(md5($_GET['id']." Vous savez, moi je ne crois pas qu’il y ait de bonne ou de mauvaise situation. Moi, si je devais résumer ma vie aujourd’hui avec vous, je dirais que c’est d’abord des rencontres. Des gens qui m’ont tendu la main, peut-être à un moment où je ne pouvais pas, où j’étais seul chez moi. Et c’est assez curieux de se dire que les hasards, les rencontres forgent une destinée... Parce que quand on a le goût de la chose, quand on a le goût de la chose bien faite, le beau geste, parfois on ne trouve pas l’interlocuteur en face je dirais, le miroir qui vous aide à avancer. Alors ça n’est pas mon cas, comme je disais là, puisque moi au contraire ")) {
        $db = new DatabaseUser();
        $user = $db->getUserById($_GET['id']);
        $user->setLatitude($_GET['lat']);
        $user->setLongitude($_GET['lgt']);
        $user->commit();
    }
}