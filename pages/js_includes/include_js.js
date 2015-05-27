function DisableButton(id1,id2,id3,id4){
		var bid1 = document.getElementById(id1);
		var bid2 = document.getElementById(id2);
		var bid3 = document.getElementById(id3);
		var bid4 = document.getElementById(id4);
		bid1.disabled = true;
		bid2.disabled = true;
		bid3.disabled = true;
		bid4.disabled = true;
	}
	
function DisableUpId(id){
var element = document.getElementById(id);
element.style.display = 'none';
}

function focusCheck(id){
	  var inputElems = document.getElementsByTagName("input"),
			count = 0;
		for (var i=0; i<inputElems.length; i++) {
			if (inputElems[i].type === "checkbox" && inputElems[i].checked === true) {
				count++;
			}
		 if (count > 1){document.getElementById(id).disabled = true;
		 document.getElementById(id).style.background = "#999";}
		 else {document.getElementById(id).disabled = false;
		 document.getElementById(id).style.background = "#03F";}
		}
	}
	
function callHome(id){
	var lid = id;
	var myEvt = document.createEvent('MouseEvents');
	myEvt.initEvent(
	   'click'      // event type
	   ,true      // can bubble?
	   ,true      // cancelable?
	);
	document.getElementById(lid).dispatchEvent(myEvt);
}

 function capitalize(str){
  var strArr = str.split(" ");
  var newArr = [];
  for(var i = 0 ; i < strArr.length ; i++ ){
    var FirstLetter = strArr[i].charAt(0).toUpperCase();
    var restOfWord = strArr[i].slice(1);
    newArr[i] = FirstLetter + restOfWord;
  }
  return newArr.join(' ');
}

function generateUsername(val1,val2,result){
		var value1 = document.getElementById(val1);
		var value2 = document.getElementById(val2);
		var text = document.getElementById(result);
		text.value = capitalize(value1.value) + " " + capitalize(value2.value);
	}
	
function matchPass(pass,con,msg){
	var val1 = document.getElementById(pass);
	var val2 = document.getElementById(con);
	if(val1.value !== val2.value){
		document.getElementById(msg).style.color = "red";
		document.getElementById(msg).innerHTML = "Your password does not match!";
	}else if(val2.value == "" || val2.value.length < 8){
		document.getElementById(msg).style.color = "red";
		document.getElementById(msg).innerHTML = "Password can not be nothing or lower than 8 charators!";
	}else{
		document.getElementById(msg).style.color = "green";
		document.getElementById(msg).style.textShadow = "1px 1px 1px green,2px 2px 1px pink";
		document.getElementById(msg).innerHTML = "Completed!";	
	}
	}

function countLength(str,msg){
	var strLength = str.length;
	if(strLength < 8){
		document.getElementById(msg).style.color = "red";
		document.getElementById(msg).innerHTML = "Your password is less than 8 charactors!";
		}else if(strLength >= 8){
			document.getElementById(msg).style.color = "green";
			document.getElementById(msg).style.textShadow = "1px 1px 1px green,2px 2px 1px pink";
			document.getElementById(msg).innerHTML = "Completed!";
		}
	}
	
function Getdate(){
	var d = new Date();
	return d;
	}
		