<?php
	/**
	 * Created by PhpStorm.
	 * User: andrey
	 * Date: 03.06.2020
	 * Time: 12:49
	 */
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	require_once 'Service/DB.php';

	class App
	{
		private $db;
		private $LoginDays = 7;
		public function __construct()
		{
			$this->db = new DB();
			$this->CORS();
		}
		private function CORS(){
			header("Access-Control-Allow-Origin: *");
			header("Access-Control-Allow-Headers: *");
			header('Access-Control-Allow-Credentials: true');
			header('Access-Control-Max-Age: 86400');    // cache for 1 day
		}
		public function BadRequest(){
			header("HTTP/1.1 404 Page Not Found");
		}
		private function BadAuth(){
			header("HTTP/1.1 401 Unauthorized");
			$this->CORS();
		}
		private function NotModify(){
			header("HTTP/1.1 304 Not Modified");
			$this->CORS();
		}
		public function SuccesData(){
			$this->CORS();
			header("HTTP/1.1 200 OK");
		}
		public function getLogin($post){
			if($post){
				$passHash = md5($post['pass']);
				$data = $this->db->getUserByEmail($post['email']);
				if($data){
					if($data[0]['passHash']===$passHash){
						$this->SuccesData();
						unset($data[0]['passHash']);
						unset($data[0][2]);
						$expTime = time()+((3600*24)*$this->LoginDays);
						$loginToken['email']=$post['email'];
						$token['data']=$data[0];
						$token['exptime']=$expTime;
						$loginToken['token'] = base64_encode(base64_encode( json_encode($token) ));
						$result =base64_encode(json_encode($loginToken));
						return $result;
					}else{
						$this->BadAuth();
					}
				}else{
					$this->BadAuth();
				}
			}else{
				$this->BadAuth();
			}

		}
		public function addMainData($post){
			if($post){
				$data = $this->db->addMainData($post);
				if($data==1){
					$this->SuccesData();
					$res['message']='Добавлено';
					return $res;
				}else{
					$this->NotModify();
					$res['error']='Не может изменится';
					return $res;
				}
			}else{
				$this->NotModify();
				$res['error']='Не может изменится';
				return $res;
			}
		}
		public function getMainData(){
			return $this->db->getMainData();
		}
		public function getUsersList(){
			return $this->db->getUsersList();
		}
		public function addUser($post){
			return $this->db->addUser($post['email'],$post['pass']);
		}
		public function echoJSON($data){
			header("Content-type: application/json; charset=utf-8");
			echo json_encode($data);
		}
	}