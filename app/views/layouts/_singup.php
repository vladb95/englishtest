<?
	require("../app/controllers/accountController.php");
	$control=new accountController();
	?>
<div class="row">
        <div class="col s12 m6">
          <div class="card lime lighten-5">

          	<form class="col s12" method="post" action="">
          	  <div >
          	  	 <div class="row">
			        <div class="input-field col s6">
			          <input id="icon_prefix" name="login" type="text" class="validate">
			          <label for="icon_prefix">Name</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s6">
			          <input id="icon_prefix" name="login" type="email" class="validate">
			          <label for="icon_prefix">Email</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s6">
			          <input id="icon_prefix" name="login" type="text" class="validate">
			          <label for="icon_prefix">Login</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s6">
			          <input id="icon_telephone" name="pass" type="password" class="validate">
			          <label for="icon_telephone">Password</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s6">
			          <input id="icon_telephone" name="pass" type="password" class="validate">
			          <label for="icon_telephone">Repeat password</label>
			        </div>
			      </div>
			      <div class="row">
			      	<div class="g-recaptcha" data-sitekey="6LewjgsTAAAAANonY4rHQoTl2kKpgyd3NltQ8Hql"></div>
			      </div>
			      <div class="row">
			      	 <button class="btn waves-effect waves-light" type="submit" name="action" value="Login">Sing up</button>
			      </div>
		      </div>
		    </form>
          </div>
        </div>
 </div>