<?php 
	require_once "../app/packs/medoo.min.php";
	class AbstractRepository{
		
		protected $db;

		function __construct(){
			$this->db=new medoo([
			'database_type' => 'mysql',
			'database_name' => 'EnglishTest',
			'server' => 'localhost',
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8']);
		}

		public function selectData($table,$columns,$where=null){
			try{
				return $this->db->select($table,$columns,$where);
			}catch(Exception $e){
				echo $e;
				return null;
			}
		}

		public function deleteData($table,$where){
			try{
				$this->db->delete($table,$where);
				return "";
			}catch(Exception $e){
				return "";
			}
		}

		public function insertData($table, $data){
			try{
				$this->db->insert($table,$data);
				return "";
			}catch(Exception $e){
				return "";
			}
		}

		public function updateData($table, $data, $where){
			try{
				$this->db->update($table, $data, $where);
				return "";
			}catch(Exception $e){
				return "";
			}
		}

	}