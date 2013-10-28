<?php
require_once 'illuminate/autoload.php';
use Illuminate\Database\Capsule\Manager as Manager;
class Capsule extends Manager{
	public function init($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS){
		$this->addConnection(array(
			'driver'    => $DB_TYPE,
			'host'      => $DB_HOST,
			'database'  => $DB_NAME,
			'username'  => $DB_USER,
			'password'  => $DB_PASS,
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
			));
		$this->bootEloquent();
	}
}
?>