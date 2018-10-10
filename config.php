<?php

/*Nome do bd */
define('DB_NAME', 'wda_crud');

/*usuario do bd MySQL */
define('DB_USER', 'root');

/*senha do bd MySQL */
define('DB_PASSWORD', '');

/*Nome do host do mysql */
define('DB_HOST', 'localhost');

/** caminho absoluto para a pasta do sistema **/
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');
/** caminho no server para o sistema **/
if ( !defined('BASEURL') )
    define('BASEURL', '/CRUD_PHP/');
    
 /** caminho do arquivo de banco de dados **/
if ( !defined('DBAPI') )
define('DBAPI', ABSPATH . 'inc/database.php');   

/* caminhos dos templates de header e foter*/
define('HEADER_TEMPLATE', ABSPATH . 'inc/header.php');
define('FOOTER_TEMPLATE', ABSPATH . 'inc/footer.php');


?>