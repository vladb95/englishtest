<?
 /*include("../app/models/AbstractRepository.php");*/
 class helperController{
 	private $data;
 	private $icons;

 	public function __construct(){
 		$this->data=new AbstractRepository();
 		$this->icons=[1=>'forum',2=>'description',3=>'list'];
 	}

 	public function getTestCategories(){
 		return $this->data->selectData('test_type',['id','type_value']);
 	}

 	public function getLevel(){
 		return $this->data->selectData('language_level',['id','level']);
 	}

 	public function getTestIcon($test_cat){
 		return isset($this->icons[$test_cat])?$this->icons[$test_cat]:'label_outline';
 	}
 }