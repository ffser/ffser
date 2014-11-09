<?php
use Illuminate\Database\Capsule\Manager as Capsule;
error_reporting(E_ALL ^E_NOTICE ^E_DEPRECATED);
!defined('FFSER_PATH')&&define('FFSER_PATH',dirname(__FILE__));
require dirname(APP_PATH).'/vendor/autoload.php';
// Eloquent ORM

$capsule = new Capsule;

$capsule->addConnection(require FFSER_PATH.'/config/database.php');

$capsule->bootEloquent();

require APP_PATH.'/config/routes.php';
