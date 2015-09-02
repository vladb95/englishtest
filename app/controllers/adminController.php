<?
include("../app/models/AbstractRepository.php");
class adminController{
	private $data;
	public function __construct(){
		$this->data=new AbstractRepository();
	}
	
	public function getTest(){
		return $this->data->selectData('test',['test_name','test_type_id','time']);
	}

	public function createTest(){
		
	}
}