<? 
	include("../app/models/AbstractRepository.php");
	class accountController
	{
		private $incorrect_account="Неверный логин или пароль";
		private $registration_success="Благодарим за регистрацию, активируйте Ваш аккаунт. Ключ для активации выслан на Ваш почтовый ящик.";
		private $registration_error="Ошибка при регистрации!";
		private $uncorrect_key="Неверный ключ активации!";
		private $success_key="Регистрация прошла успешно!";
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
			try{
				$name=$_POST['name'];
				$login=$_POST['login'];
				$pass=md5($_POST['pass']);
				$email=$_POST['email'];
				$activate_key=md5($this->generatePassword(10));
				$last_account_id=$this->data->insertData("users",["login"=>$login,"pass"=>$pass,"role_id"=>2]);
				$this->data->insertData("profile",["name"=>$name,"users_id"=>$last_account_id,"email"=>$email]);
				$link=$_SERVER['SERVER_NAME']+"/?key=".$activate_key;
				$this->data->insertData('',["user_id"=>$last_account_id,"activate_key"=>$activate_key]);
				$email_text="<h1>Благодарим за регистрацию!</h1><p>Ваш логин: ".$login."<br>Ваш пароль: ".$_POST['pass']."<br>Перейдите по ссылке для активации аккаунта ".$link."</p>";
				mail($email, "Активация аккаунта englishtest", $email_text);
				echo '<script>Materialize.toast("'.$this->registration_success.'", 10000);</script>';
			}catch(Exception $e){
				echo '<script>Materialize.toast("'.$this->registration_error.'", 5000);</script>';
			}
		}

		public function activateAccount(){
			try{
				$key=$_GET['key'];
				if($key==""&$key==null){
					echo '<script>Materialize.toast("'.$this->uncorrect_key.'", 5000);</script>';
					return;
				}
				$result=$this->data->selectData('activate',["user_id","activate_key"],["activate_key[=]"=>$key]);
				if(count($result)==0){
					echo '<script>Materialize.toast("'.$this->uncorrect_key.'", 5000);</script>';
					return;
				}
				$user=$this->data->selectData('users',['login','pass','role_id'],['id'=>$result[0]['user_id']]);
				$this->data->updateDate('users',['activate'=>1],['id[=]'=>$result[0]['user_id']]);
				$this->data->deleteData('activate',['user_id[=]'=>$result[0]['user_id']]);
				$_SESSION['login']=$user[0]['pass'];
				echo '<script>document.cookie="role='.$user[0]['role_id'].'";document.location.href="/";</script>';
				echo '<script>Materialize.toast("'.$this->success_key.'", 5000);</script>';
			}catch(Exception $e){
				echo '<script>Materialize.toast("'.$this->uncorrect_key.'", 5000);</script>';
			}

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