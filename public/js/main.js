(function(){

	this.materializeDialog=function(toast){
		Materialize.toast(toast, 4000);
	}

	this.ajaxAbstract=function(method,linkToScript,data,delegate){
		$.ajax({
		   type: method,
		   url: linkToScript,
		   data: data,
		   success: delegate
		 });
	}

	this.createTest=function(testName,testType,testDuration,testLevel,questionsCount){
		var reqParams="name="+testName+"&type="+testType+"&duration="+testDuration+"&level="+testLevel+"&count="+questionsCount;
		ajaxAbstract('POST','/public/ajax/ajaxController.php',reqParams,materializeDialog);
	}

	this.loadTest=function(){
		var reqParams="key=get_test";
		ajaxAbstract('GET','/public/ajax/ajaxController.php?'+reqParams,null,function(resp){
			var testul=document.getElementById('testUl');
			alert(resp);
			/*resp.forEach(function(item,i){
				alert(item);
			});*/
		});
	}

})();