<?
	
	class menuController
	{
		
		function __construct()
		{
			
		}

		public function itemEvent(){
			if (!isset($_GET["action"])) {
				if(isset($_SESSION['login'])){
					return "../app/views/usersTop/top.php";
				}else{
					return "../app/views/layouts/default.php";
				}
			}
			$views=["top"=>"../app/views/usersTop/top.php","test"=>'../app/views/test/index.php'];
			$viewsUn=["login"=>"../app/views/layouts/_login.php","singup"=>"../app/views/layouts/_singup.php","activate"=>"../app/views/layouts/_activate.php"];
			$viewAdmin=['test'=>'../app/views/admin/test.php','result'=>'../app/views/admin/result.php'];
			if($_COOKIE['role']==md5("admingodasdfg")){
				return isset($viewAdmin[$_GET["action"]])?$viewAdmin[$_GET["action"]]:"../app/views/layouts/404.php";
			}
			if(isset($_SESSION['login'])){
				if(isset($viewsUn[$_GET["action"]])&&!isset($views[$_GET["action"]])){
					return "../app/views/layouts/default.php";
				}
				return isset($views[$_GET["action"]])?$views[$_GET["action"]]:"../app/views/layouts/404.php";
			}else{
				return isset($viewsUn[$_GET["action"]])?$viewsUn[$_GET["action"]]:"../app/views/layouts/404.php";
			}
		}
	}