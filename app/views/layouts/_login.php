<?
include("../app/controllers/loginController.php");
$login=new loginController();
?>

 <div class="row">
        <div class="col s12 m6">
          <div class="card lime lighten-5">
          	<form class="col s12">
          	  <div >
		      <div class="row">
		        <div class="input-field col s6">
		          <input id="icon_prefix" type="text" class="validate">
		          <label for="icon_prefix">Login</label>
		        </div>
		      </div>
		      <div class="row">
		        <div class="input-field col s6">
		          <input id="icon_telephone" type="tel" class="validate">
		          <label for="icon_telephone">Password</label>
		        </div>
		      </div>
		      </div>
		    </form>
          </div>
        </div>
</div>