<?php   
$halaman = (isset($_GET['page']) && $_GET['page']) ? $_GET['page'] : '';

define('PATH',''); //path website
define('SITE_URL',PATH.'index.php');
define('POSITION_URL', PATH.'?page='.$halaman);
define('DB_HOST','');
define('DB_USERNAME','');
define('DB_PASSWORD','');
define('DB_NAME','');


?>