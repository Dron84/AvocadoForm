<?php
	/**
	 * Created by PhpStorm.
	 * User: andrey
	 * Date: 03.06.2020
	 * Time: 13:19
	 */
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	class Env
	{
		private $env ;
		public function __construct()
		{
			$env = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/api/.env',FILE_USE_INCLUDE_PATH);
//	print_r($env);
			$env = explode(PHP_EOL, $env);
			$newEnv = [];
			for ($i = 0; $i < count($env); $i++) {
				$name = explode('=',$env[$i]);
				$newEnv[$name[0]]=$name[1];
			}
			$this->env = $newEnv;
		}
		public function getEnv (){
			return $this->env;
		}
	}