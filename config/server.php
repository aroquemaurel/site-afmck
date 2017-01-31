<?php
define('CONFIG', 'dev');

define('MAINTENANCE', false);
define('AUTHORIZED_IP', array('192.168.1.25'));

define('KEY_AJAX_PRATICIENS', ' Vous savez, moi je ne crois pas qu’il y ait de bonne ou de mauvaise situation. Moi, si je devais résumer ma vie aujourd’hui avec vous, je dirais que c’est d’abord des rencontres. Des gens qui m’ont tendu la main, peut-être à un moment où je ne pouvais pas, où j’étais seul chez moi. Et c’est assez curieux de se dire que les hasards, les rencontres forgent une destinée... Parce que quand on a le goût de la chose, quand on a le goût de la chose bien faite, le beau geste, parfois on ne trouve pas l’interlocuteur en face je dirais, le miroir qui vous aide à avancer. Alors ça n’est pas mon cas, comme je disais là, puisque moi au contraire ');
define('FORUM_NAME_ANNOUNCES', 'Petites annonces');
if(CONFIG == 'dev') {
    define('ROOT_PAGE', '/dev/site-afmck');
    define('ROOT_PATH', '/data/dev/www/');
    define('TRESORERIE_MAIL', 'trash.dev.zero+tresorerie@gmail.com');
    define('SECRETARIAT_MAIL', 'trash.dev.zero+secretariat@gmail.com');

    define('NEWS_NB_MAILS', 3);

    define('FORUM_NB_POSTS_TOPIC', 5);
    define('FORUM_NB_TOPIC_FORUM', 2);

    ini_set('display_errors',1);
} else if(CONFIG == 'prod') {
    ini_set('display_errors',0);
    define('ROOT_PATH', '/homez.441/afmck/www/');
    define('TRESORERIE_MAIL', 'tresorerie@afmck.fr');
    define('ROOT_PAGE', '');
    define('SECRETARIAT_MAIL', 'secretariat@afmck.fr');

    define('FORUM_NB_POSTS_TOPIC', 15);
    define('FORUM_NB_TOPIC_FORUM', 20);

    define('NEWS_NB_MAILS', 50);
} else if(CONFIG == 'preprod') {
    ini_set('display_errors', 1);
    define('ROOT_PATH', '/homez.441/afmck/preprod/');
    define('TRESORERIE_MAIL', 'tresorerie@afmck.fr');
    define('ROOT_PAGE', '');
    define('SECRETARIAT_MAIL', 'secretariat@afmck.fr');

    define('FORUM_NB_POSTS_TOPIC', 15);
    define('FORUM_NB_TOPIC_FORUM', 20);

    define('NEWS_NB_MAILS', 50);
}
?>
