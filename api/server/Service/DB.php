<?php
	/**
	 * Created by PhpStorm.
	 * User: andrey
	 * Date: 03.06.2020
	 * Time: 13:43
	 */
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	require_once 'Env.php';

	class DB
	{
		private $link;
		private $maindataTableName = 'maindata';
		private $usersTableName = 'users';

		public function __construct()
		{
			$ENV = new Env();
			$env = $ENV->getEnv();

			$dsn = "mysql:dbname={$env['SERVER_MYSQL_DBNAME']};host={$env['SERVER_MYSQL_HOST']};port={$env['SERVER_MYSQL_PORT']};charset=utf8;socket={$env['SERVER_MYSQL_SOCKET']}";

			$admin_email = 'admin@admin.com';
			$admin_pass = base64_encode(base64_encode('123123123'));
			try {
				$this->link = new PDO($dsn,$env['SERVER_MYSQL_USER'], $env['SERVER_MYSQL_PASSWORD']);
				$this->createTables($admin_email,$admin_pass);

			} catch (PDOException $e) {
				echo 'Подключение не удалось: ' . $e->getMessage();
			}
		}

		private function createTables($admin_email,$admin_pass){
			$create_table_users = "CREATE TABLE IF NOT EXISTS `{$this->usersTableName}` (
				`id` INT AUTO_INCREMENT NOT NULL,
				`email` varchar(200) NOT NULL,
				`passHash` TEXT,
				`remember` INT(1),
				`premission` varchar(255),
				PRIMARY KEY (`id`)) 
				CHARACTER SET utf8 COLLATE utf8_general_ci";

			$create_table_maindata = "CREATE TABLE IF NOT EXISTS `{$this->maindataTableName}` (
				`id` INT AUTO_INCREMENT NOT NULL,
				`AdQub_offer_ID` varchar(255),
				`DATE` varchar(255),
				`Created_by` varchar(255),
				`Advertiser_Aff_network` varchar(255),
				`ADQUB_ADV_NAME` varchar(255),
				`ORIGINAL_Offer_name` varchar(255),
				`AdQub_offer_name` varchar(255),
				`Volume_offer_name` varchar(255),
				`Vertical` varchar(255),
				`Offer_URL` varchar(255),
				`GEO_full` varchar(255),
				`ORIGINAL_payout` varchar(255),
				`Conversion_type` varchar(255),
				`GEO` varchar(255),
				`ORIGINAL_30` varchar(255),
				`ORIGINAL_25` varchar(255),
				`ORIGINAL_20` varchar(255),
				`ORIGINAL_CUSTOM` varchar(255),
				`NEW_payout` varchar(255),
				`PO_change_date` varchar(255),
				`NEW_PO_30` varchar(255),
				`NEW_PO_25` varchar(255),
				`NEW_PO_20` varchar(255),
				`NEW_CUSTOM` varchar(255),
				`NEW_PO_CUSTOM` varchar(255),
				`FINAL_ACTUAL_PO` varchar(255),
				`OS` varchar(255),
				`OS_Version` varchar(255),
				`Green_prelanding_preview` varchar(255),
				`Green_landing_preview` varchar(255),
				`Red_preland` varchar(255),
				`Red_direct_link` varchar(255),
				`Daily_Cap` varchar(255),
				`Total_Cap` varchar(255),
				`PROFITABILITY` varchar(255),
				`Device` varchar(255),
				`Connection_type` varchar(255),
				`Carrier` varchar(255),
				`Browser` varchar(255),
				`Traffic_category` varchar(255),
				`Ad_Format` varchar(255),
				`Any_other_additional_targeting` varchar(255),
				`Status` varchar(255),
				`Browser_language` varchar(255),
				`Browser_version` varchar(255),
				`KPI` varchar(255),
				`Creatives` varchar(255),
				`WL` varchar(255),
				`BL` varchar(255),
				`IP_targeting` varchar(255),
				`NOTES` varchar(255),
				`GALAKSION` varchar(255),
				`ADMAVEN` varchar(255),
				`PROPELLER` varchar(255),
				`ADSTERRA` varchar(255),
				`CLICKADU` varchar(255),
				`ADCASH` varchar(255),
				`ZETADS` varchar(255),
				`ADVERTISER` varchar(255),
				`HILLTOP` varchar(255),
				`ANDRES` varchar(255),
				`MEDIAO` varchar(255),
				`MOBUSI` varchar(255),
				`KIMIA` varchar(255),
				`UNGADS` varchar(255),
				`user_id` INT,
				PRIMARY KEY (`id`)) 
				CHARACTER SET utf8 COLLATE utf8_general_ci";

			$this->link->exec($create_table_users);
			$this->link->exec($create_table_maindata);
			$check = $this->getUserByEmail($admin_email);
			if(count($check)==0){
				$this->addUser($admin_email,$admin_pass,0,'admin');
			}
		}

		private function createInsertQueryFromJSONObject($obj,$tableName){
			$obj = json_decode($obj,true);
			$name = [];
			$values = [];
//			print_r($obj);
			foreach ($obj as $key=>$item) {
				$name[]=$key;
				$values[]="'".$item."'";
			}
			return "INSERT INTO `{$tableName}` (". implode(', ',$name) .") VALUES (". implode(', ',$values).")";
		}

		private function createInsertQueryFromPost($post,$tableName){
			foreach ($post as $key=>$item) {
				$name[]=$key;
				$values[]="'".$item."'";
			}
			return "INSERT INTO `{$tableName}` (". implode(', ',$name) .") VALUES (". implode(', ',$values).")";
		}

		private function selectAllFromTable($tableName){return $this->link->query("SELECT * FROM `{$tableName}`")->fetchAll(PDO::FETCH_NUM);}

		public function getUserByEmail($email){return $this->link->query("SELECT * FROM `{$this->usersTableName}` WHERE email='{$email}'")->fetchAll();}

		public function addUser($email,$pass,$remember=0,$premission = 'client'){
			$passHash = md5($pass);
			$sql = "INSERT INTO `{$this->usersTableName}` (email,passHash,remember,premission) VALUES ('{$email}','{$passHash}',{$remember},'{$premission}')";
			return $this->link->query($sql);
		}

		public function addMainData($post){
			$sql = $this->createInsertQueryFromPost($post,$this->maindataTableName);
			return $this->link->exec($sql);
		}

		public function getMainData(){return $this->selectAllFromTable($this->maindataTableName);}


	}