<?php 
	include("../packs/medoo.min.php");
	abstract class AbstractRepository{
		
		protected $db=new medoo([
			'database_type' => 'mysql',
			'database_name' => 'EnglishTest',
			'server' => 'localhost',
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8']);
		public function selectData($table,$columns,$where){
			try{
				return $this->$db->select($table,$columns,$where);
			}catch(Exception $e){
				return "";
			}
		}

		public function deleteData($table,$where){
			try{
				$this->$db->delete($table,$where);
				return "";
			}catch(Exception $e){
				return "";
			}
		}

		public function insertData($table, $data){
			try{
				$this->$db->insert($table,$data);
				return "";
			}catch(Exception $e){
				return "";
			}
		}

		public function updateData($table, $data, $where){
			try{
				$this->$db->update($table, $data, $where);
				return "";
			}catch(Exception $e){
				return "";
			}
		}

	}