<? 
	include("../app/models/AbstractRepository.php");
	class accountController
	{
		private $incorrect_account="Неверный логин или пароль";
		private $data;
		function __construct()
		{
			$this->data=new AbstractRepository();
		}

		public function checkValidAccount(){
			$login=$_POST['login'];
			$pass=md5($_POST['pass']);
			if(($login=="")|($pass==""))
				return;
			$resp=$this->data->selectData("users",['login','pass','role_id'],["login[=]"=>$login]);
			if(!count($resp)||count($resp)>1){
				echo '<script>Materialize.toast("'.$this->incorrect_account.'", 4000);</script>';
				return;
			}else{

				if($resp[0]['pass']===$pass){
					$_SESSION['login']=$resp[0]['pass'];
					$role="";
					if($resp[0]['role_id']=='1'){
						$role=md5("admingodasdfg");
					}else{
						$role=md5("usergodasdfg");
					}
					echo '<script>document.cookie="role='.$role.'";document.location.href="/";</script>';
				}else{
					echo '<script>Materialize.toast("'.$this->incorrect_account.'", 4000);</script>';
					return;
				}
			}
		}

		public function changePassword(){

		}

		public function singUp(){
			$name=$_POST['name'];
			$login=$_POST['login'];
			$pass=md5($_POST['pass']);
			$email=$_POST['email'];
			$activate_key=md5($this->generatePassword(10));
			$last_account_id=$this->data->insertData("users",["login"=>$login,"pass"=>$pass,"role_id"=>2]);
			$this->data->insertData("profile",["name"=>$name,"users_id"=>$last_account_id,"email"=>$email]);
			$link=$_SERVER['SERVER_NAME']+"".$activate_key;
			$email_text="<h1>Благодарим за регистрацию!</h1><p>Ваш логин: ".$login."<br>Ваш пароль: ".$_POST['pass']."<br>Перейдите по ссылке для активации аккаунта ".$link."</p>";
			mail($email, "Активация аккаунта englishtest", $email_text);
		}

		private function generatePassword($length = 8){
		  $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
		  $numChars = strlen($chars);
		  $string = '';
		  for ($i = 0; $i < $length; $i++) {
		    $string .= substr($chars, rand(1, $numChars) - 1, 1);
		  }
		  return $string;
		}
	}