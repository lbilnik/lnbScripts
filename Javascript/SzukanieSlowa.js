function search() {
		document.getElementById('submit_form').onclick = function(){
			var slowo = document.getElementById("inpu").value;
			var sourceText = document.getElementById('source').innerHTML; 		
						
			var expr = slowo;
			var exprStr = String(expr);
			var result = sourceText.search(exprStr, 'g'); 
			var xpr = new RegExp(exprStr, 'g');
			var isGlobal = xpr.global;
			var resu = xpr.test(sourceText);
			
			var cls = document.getElementById("message");
			cls.className += " massager";
			
			if(expr == ''){
					document.getElementById('message').innerHTML = " Pole jest puste ";
					return false;
			}
			if(expr.length > 18){
					document.getElementById('message').innerHTML = " Słowo jest za długie ";
					return false;
			}
			
			if(expr.length < 2){
					document.getElementById('message').innerHTML = " Podaj minimum 2 litery ";
					return false;
			}
			if(!isNaN(expr)){
					document.getElementById('message').innerHTML = " Podaj Słowo a nie liczbe ";
					return false;
			}
			
			if (result == -1){ 
				document.getElementById('message').innerHTML = "Nie znaleziono";
				return false;				
				
			} 
			else if (resu == true){ 

			document.getElementById('message').innerHTML = "Słowo: " + slowo + "," + " Ilość liter w słowie: " + exprStr.length; 
			
			function podmianaSTR(){
			var podmieniany = '<span id="podmiana">'+ slowo + '</span>';
			var zamiana = sourceText.replace(xpr, podmieniany);
			return zamiana;
			}
			
			//var podmiana = sourceText.replaceAll(exprStr, '<span id="podmiana">'+ slowo + '</span>');
			var podmiana = podmianaSTR();
			document.getElementById('source').innerHTML = podmiana;		
			return false;			

			}else { 			
				document.getElementById('message').innerHTML = "Pozycja słowa: " + slowo + " od poczatku akapitu to: " + result + " znaków" + " Ilość wystąpień w tekście: " + expr.length + " " + isGlobal;
				return false;	
			}
			
		}	
	}
	
	function reload() {
	location.reload(); 
}