<?
require('../../app/controllers/adminController.php');
require('../../app/controllers/helperController.php');
class ajaxController{
	protected $_instance;

	private $_admin;
	private $_helper;

	private function __construct(){
		$this->$_admin=new adminController();
		$this->$_helper=new helperController();
		self::getInstance();
	}

	private function __clone(){

	}

	public static function getInstance(){
		if(null===self::$_instance){
			self::$_instance=new self();
		}
		return self::$_instance;
	}

	public function switchControllerFunction(){
		switch($_REQUEST['type']){
			case 'create_test':$this->createTest();
				break;
			case 'update_test':$this->updateTest();
				break;
			case 'delete_test':$this->deleteTest();
				break;
			case 'create_question':$this->createQuestion();
				break;
			case 'update_question':$this->updateQuestion();
				break;
			case 'delete_question':$this->deleteQuestion();
				break;
			case 'get_test':$this->getTest();
				break;
		}
	}

	/*Test*/
	private function createTest(){
		echo $this->admin->createTest($_REQUEST['name'],$_REQUEST['type'],$_REQUEST['duration'],$_REQUEST['level']);
	}

	private function updateTest(){

	}

	private function deleteTest(){

	}
    /*End test*/

    /*Question*/
	private function createQuestion(){

	}

	private function updateQuestion(){

	}

	private function deleteQuestion(){

	}

	private function getTest(){
		$tests=$this->admin->getTest();
	    echo $tests;
	}
	/*End question*/
}

/*ajax hendler*/
$hendler=ajaxController::getInstance();
$hendler->switchControllerFunction();
/*end hendler*/