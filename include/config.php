<?php 

define('SITE_ROOT', dirname(dirname(__FILE__)));


define('PRESENTATION_DIR', SITE_ROOT . '/presentation/');


define('TEMPLATE_DIR', PRESENTATION_DIR . 'templates');

// We enable and enforce SSL when this is set to anything else than 'no'
define('USE_SSL', 'no');

// Server HTTP port (can omit if the default 80 is used)
define('HTTP_SERVER_PORT', '80');

/* Name of the virtual directory the site runs in, for example:
 '/tshirtshop/' if the site runs at http://www.example.com/tshirtshop/
 '/' if the site runs at http://www.example.com/ */
define('VIRTUAL_LOCATION', '/');


?>
