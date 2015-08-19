<?
include("../app/controllers/accountController.php");
$login=new accountController();
if(isset($_POST))
	$login->checkValidAccount();
?>

 <div class="row">
        <div class="col s12 m6">
          <div class="card lime lighten-5">
          	<form class="col s12" method="post" action="">
          	  <div >
			      <div class="row">
			        <div class="input-field col s6">
			          <input id="icon_prefix" name="login" type="text" class="validate">
			          <label for="icon_prefix">Username</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s6">
			          <input id="icon_telephone" name="pass" type="password" class="validate">
			          <label for="icon_telephone">Password</label>
			        </div>
			      </div>
			      <div class="row">
			      	 <button class="btn waves-effect waves-light" type="submit" name="action" value="Login">Log in</button>
			      </div>
		      </div>
		    </form>
          </div>
        </div>
 </div>