<?php 

// Load Config
// TODO: refactor require to use short path
require_once '../app/config/config.php';

require_once 'helpers/url_helper.php';

// Autoload Core Libraries
spl_autoload_register(function($className) {
    require_once 'libs/' . $className . '.php';
});