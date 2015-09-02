<? 
include '../app/controllers/adminController.php';
include '../app/controllers/helperController.php';
$admin=new adminController();
$helper=new helperController();
?>
<script type="text/javascript">
	/*$(document).ready(function(){
		$('.modal-trigger').leanModal({
		      dismissible: false, // Modal can be dismissed by clicking outside of the modal
		      opacity: .5, // Opacity of modal background
		      in_duration: 300, // Transition in duration
		      out_duration: 2000, // Transition out duration
		    }
		  );
	});*/
</script>
<!--START MODAL-->
<div class="fixed-action-btn">
	<a class="btn-floating btn-large waves-effect waves-light red  modal-trigger" data-target="modal1"><i class="material-icons">add</i></a>
</div>
<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <div class="row">
        <div class="input-field col s12">
          <input id="testname" type="text" class="validate">
          <label for="testname">Название теста</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
		    <select id="level">
		      <option value="" disabled selected>Уровень теста</option>
		      <?foreach($helper->getLevel() as $level){
		      echo '<option value="'.$level['id'].'">'.$level['level'].'</option>';}?>
		    </select>
		    
  		</div>
      </div>
      <div class="row">
        <div class="input-field col s12">
		    <select id="category">
		      <option value="" disabled selected>Тип теста</option>
		      <?foreach($helper->getTestCategories() as $category){
		      echo '<option value="'.$category['id'].'">'.$category['type_value'].'</option>';}?>
		    </select>
		    
  		</div>
      </div>
      
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">event_note</i>
          <input id="count_of_questions" type="text" class="validate">
          <label for="icon_prefix">Количество вопросов</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">restore</i>
          <input id="itime_to_test" type="tel" class="validate">
          <label for="icon_telephone">Время на тест</label>
        </div>
      </div>
    </div>
    <div class="modal-footer">
    	<a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cancel</a>
        <a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Add</a>
    </div>
</div>
<!--END MODAL-->

<ul class="collapsible" data-collapsible="accordion" style="margin:15px;">
	<?foreach ($admin->getTest() as $key):?>
    <li>
      <div class="collapsible-header">
      		<i class="material-icons"><?=$helper->getTestIcon($key['test_type_id']);?></i>
      		<?=$key['test_name'];?>
      		<span class="badge">
      			<div class="toolcontroll">
	      			<ul style="display: -webkit-inline-box;">
	      				<li style="margin-right: -10px;"><i class="material-icons" onclick="alert(123);">add</i></li>
	      				<li style="margin-right: -10px;"><i class="material-icons" onclick="alert(123);">create</i></li>
	      				<li><i class="material-icons" onclick="alert(123);">delete</i></li>
	      			</ul>
      			</div>
      		</span>

      </div>
      <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
    </li>
    <?endforeach;?>
  </ul>