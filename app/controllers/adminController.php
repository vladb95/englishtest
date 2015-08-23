<?
include("../app/models/AbstractRepository.php");
class adminController{
	private $data;
	public function __construct(){
		$this->data=new AbstractRepository();
	}

	
}