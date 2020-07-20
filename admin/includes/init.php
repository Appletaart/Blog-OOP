<?php //this for looking for directory 

/*defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] .DS. 'blogoop');
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT .DS. 'admin'.DS. 'includes');
defined('IMAGES_PATH') ? null : define('IMAGES_PATH', SITE_ROOT .DS. 'admin' .DS. 'img');*/

//print_r($_SERVER['DOCUMENT_ROOT']); = G:\PleskVhosts\applepanithi.com\httpdocs

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
define('SITE_ROOT', DS. 'Applications' .DS. 'MAMP' .DS. 'htdocs' .DS. 'blogoop'); //'studentweb'
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT .DS. 'admin'.DS. 'includes');
defined('IMAGES_PATH') ? null : define('IMAGES_PATH', SITE_ROOT .DS. 'admin' .DS. 'img');

require_once(INCLUDES_PATH.DS."functions.php");
require_once(INCLUDES_PATH.DS."config.php");
require_once(INCLUDES_PATH.DS."Database.php");
require_once(INCLUDES_PATH.DS."Db_object.php");
require_once(INCLUDES_PATH.DS."User.php");
require_once(INCLUDES_PATH.DS."Photo.php");
require_once(INCLUDES_PATH.DS."Session.php");
require_once(INCLUDES_PATH.DS."Comment.php");
require_once(INCLUDES_PATH.DS."Paginate.php");
?>