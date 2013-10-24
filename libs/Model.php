<?php
class Model {

    function __construct() {
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
        $capsule = new Capsule;
		/*$capsule->init(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);*/
	}

	function Eloquent($table){
		/*$table='ubicacion_estado';
		eval("class $table extends Illuminate\Database\Eloquent\model{
			protected \$table='$table';
		}
		\$Eloquent = new $table;
		");
		return $Eloquent;*/
	}

}