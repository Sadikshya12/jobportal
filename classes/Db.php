<?php 
namespace App;
Class Db{

	protected static $connection;

	public static function connect(){

		if (!isset(self::$connection)){
			global $config;
			
			// self::$connection = new \mysqli ($config['host'], $config['username'],
			// 	$config['password'],$config['db_name']);

			self::$connection = new \mysqli ('localhost', 'root',
				'','job');
		}

		if (self::$connection===false){
			return false;
		}
		return self::$connection;
		
	}
}

?>