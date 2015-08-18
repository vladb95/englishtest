<?
	
	class menuController
	{
		
		function __construct()
		{
			
		}

		public function itemEvent(){
			if (!isset($_GET["action"])) {
				if(isset($_SESSION['log'])){
					return "../app/views/usersTop/top.php";
				}else{
					return "../app/views/layouts/default.php";
				}
			}
			$views=["login"=>"../app/views/layouts/_login.php"];
			return isset($views[$_GET["action"]])?$views[$_GET["action"]]:"../app/views/layouts/404.php";
		}
	}