<?php
/*define('DB_HOST', '188.121.44.76:3306');
define('DB_USER', 'ph20686669851');
define('DB_PASS', '7fg8X_4x');
define('DB_NAME', 'studentweb');*/
/*define('DB_HOST', '188.121.44.76:3306');
define('DB_USER', 'ph20686669851');
define('DB_PASS', '7fg8X_4x');
define('DB_NAME', 'studentweb');*/

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','root');
define('DB_NAME','dbblogoop');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME)
OR die('Could not connect to Mysql: ' . mysqli_connect_error());
?>
