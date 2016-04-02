<?php
define('CONFIG', 'prod');

if(CONFIG == 'dev') {
    define('ROOT_PAGE', '/dev/site-afmck');
    define('ROOT_PATH', '/data/dev/www/');
    define('TRESORERIE_MAIL', 'trash.dev.zero+tresorerie@gmail.com');
    define('SECRETARIAT_MAIL', 'trash.dev.zero+secretariat@gmail.com');

    define('NEWS_NB_MAILS', 3);
} else if(CONFIG == 'prod') {
    define('ROOT_PATH', '/homez.441/afmck/www/');
    define('TRESORERIE_MAIL', 'tresorerie@afmck.fr');
    define('ROOT_PAGE', '');
    define('SECRETARIAT_MAIL', 'secretariat@afmck.fr');

    define('NEWS_NB_MAILS', 50);
}
?>
