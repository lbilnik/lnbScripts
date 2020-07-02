function AjaxScript() {

var btnAjax = document.getElementById('AjaxButon');

btnAjax.addEventListener('click',function(){
	
	function createObject(){
		return new XMLHttpRequest();
	}
	
	var req = createObject();
	req.open('GET','materials/AjaxDane.json',true);
	req.send();
	req.onreadystatechange = function(){
		if(req.readyState == 4 && req.status == 200) {
			var jsonObj = JSON.parse(req.responseText);
	
					var output = "";
						for (let i in jsonObj.products) {
							output += "<tr>";
							output +="<td>" + jsonObj.products[i].name + "</td>";
							output +="<td>" + jsonObj.products[i].price + "</td>";
							output +="<td>" + jsonObj.products[i].category + "</td>";
							output += "</tr>";
						}
					document.getElementById('AjaxContent').innerHTML = output;
				}
			};
	});
}

function AjaxDisplay() {

var btnAjax2 = document.getElementById('AjaxButon2');

btnAjax2.addEventListener('click',function(){
	
	function createObject2(){
		return new XMLHttpRequest();
	}
	
	var req = createObject2();
	req.open('GET','materials/JsonTextDisplay.txt',true);
	req.send();
	req.onreadystatechange = function(){
		if(req.readyState == 4 && req.status == 200) {
		var textBoj = this.responseText; 

		document.getElementById('AjaxContent2').innerHTML = textBoj;
		document.getElementById('precontent').style.display = "block";
				}
			};
	});
}

function AjaxHide() {
	document.getElementById('precontent').style.display = "none";
}

window.onload = function() {
	AjaxScript();
	AjaxDisplay();
	AjaxHide();
}