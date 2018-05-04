<?php
spl_autoload_register(function($className){
	require str_replace('\\', '/', $className . '.php');
});

define('ROOT_PATH',str_replace('\\', '/', realpath(dirname(__FILE__) . '/')) . "/");

use main\db\Connect;
use main\db\Add;
use main\db\Delete;
use main\db\Update;
use main\db\Select;
use main\transfers\Upload;

Connect::$config = [
	'host'       =>     '127.0.0.1',
	'user'       =>     'root',
	'pass'       =>     '',
	'dbname'     =>     'test'
];

$add = new Add;
$del = new Delete;
$update = new Update;
$select = new Select;
$upload = new Upload;