(function(){
	this.getXmlHttp=function(){
	  var xmlhttp;
	  try {
	    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	  } catch (e) {
	    try {
	      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	    } catch (E) {
	      xmlhttp = false;
	    }
	  }
	  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
	    xmlhttp = new XMLHttpRequest();
	  }
	  return xmlhttp;
	}

	this.materializeDialog=function(toast){
		Materialize.toast(toast, 4000);
	}

	this.ajaxAbstract=function(method,linkToScript,data,delegate){
		var req = getXmlHttp();
		req.onreadystatechange = function() { 
			if (req.readyState == 4) { 

				if(req.status == 200) { 
					if(delegate!=null){
						delegate(req.responseText);
					}
				}
			}

		}
		req.open(method, linkToScript, true);  
		req.send(data);
	}

	this.createTest=function(testName,testType,testDuration,testLevel,questionsCount){
		var reqParams="name="+testName+"&type="+testType+"&duration="+testDuration+"&level="+testLevel+"&count="+questionsCount;
		ajaxAbstract('POST','',reqParams,materializeDialog);
	}

})();