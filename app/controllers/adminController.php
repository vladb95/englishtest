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

	public function createTest($name,$type_id,$time,$level_id){
		try{
			$data->insertData('test',['test_name'=>$name,'test_type_id'=>$type_id,'time'=>$time,'language_level_id'=>$level_id]);
			return 'Success operation';
		}catch(Exception $e){
			return 'Unknown exception';
		}
	}

	public function getTestsResult(){
		return $this->data->selectData('test_event',['profile_id','test_id','hits','status_id']);
	}
}