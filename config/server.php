<?php
define('CONFIG', 'dev');

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
    ini_set('display_errors',1);
    define('ROOT_PATH', '/homez.441/afmck/www/');
    define('TRESORERIE_MAIL', 'tresorerie@afmck.fr');
    define('ROOT_PAGE', '');
    define('SECRETARIAT_MAIL', 'secretariat@afmck.fr');

    define('FORUM_NB_POSTS_TOPIC', 15);
    define('FORUM_NB_TOPIC_FORUM', 20);

    define('NEWS_NB_MAILS', 50);
}
?>
