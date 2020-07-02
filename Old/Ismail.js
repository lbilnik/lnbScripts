function send() {
document.getElementById('Wyslij').onclick = function(){
			var imie = document.getElementById('username').value;	
			
			var fieldIds = {mailId:'mail',usernameId:'imie',tematId:'temat'};
			var inputFields = document.getElementsByTagName('input');
			var message = document.getElementById('message2');
			
			document.contact_form.onsubmit = function(){
				for (field in inputFields){
					fieldId = this.field.id;
					alert(fieldId);
					var theField = document.getElementById(fieldId);
					
					if(theField.value == ''){
						message.innerHTML = "Wymagane pole " + fieldId + " jest puste";
						return false;
					}
		
					if(theField.length > 12){
							document.getElementById('message2').innerHTML = " Imie jest za długie ";
							return false;
					}
					
					if(theField.length < 3){
							document.getElementById('message2').innerHTML = " Podaj minimum 4 litery ";
							return false;
					}
					if(!isNaN(theField)){
							document.getElementById('message2').innerHTML = " Podaj Imie a nie liczbe ";
							return false;
					}							
					else { 
						
						document.getElementById('message2').innerHTML = "Imie jest prawidłowe";
						return false;	
					}
									
				} 
			}