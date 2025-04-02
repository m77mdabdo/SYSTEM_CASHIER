<?php 

use Os\Test\public\Request;
use Os\Test\public\App;
require_once '../../vendor/autoload.php';
require_once 'Session.php';
$request = new Request;
define('base_app', str_replace('\\','/',__DIR__).'/' );
define('base_url','http://localhost/project_mvc/src/public/index.php?');
$app = new App($request);