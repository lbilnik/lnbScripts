function send() {

var isimie = document.forms["formulaz"]["imie"].value;
if (isimie == null || isimie == "")
 {
  alert("Podaj imię i nazwisko");
  return false;
 }
if (isimie.length > 20)
 {
  alert("Imie i nazwisko jest za długie (maksymalnie 20 znaków)");
  return false;
 }
if (isimie.length < 3)
 {
  alert("Imie i nazwisko jest za krótkie (minimalnie 3 znaki)");
  return false;
 }
 if (!isNaN(isimie))
 {
  alert("Podaj imie i nazwisko a nie cyfry");
  return false;
 }
 
 /* E-mail */
 var ismail = document.forms["formulaz"]["mail"].value;
 var regex = /^([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)@([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)[\\.]([a-zA-Z]{2,9})$/;
 
 if (ismail == null || ismail == "")
 {
  alert("Podaj E-mail");
  return false;
 }
 if(!regex.test(ismail))
 {
  alert("Podaj prawidłowy E-mail");
  return false;
 }
 if (ismail.length < 5)
 {
  alert("E-mail jest nie prawidłowy");
  return false;
 }
 if (ismail.length > 24)
 {
  alert("E-mail zwiera za wiele znaków (maksymalnie 24 znaków)");
  return false;
 }
 /* Temat */
  var istemat = document.forms["formulaz"]["temat"].value;
 
 if (istemat == null || istemat == "")
 {
  alert("Wpisz Temat");
  return false;
 }
 if (istemat.length < 5)
 {
  alert("Temat ma zawierać co najmniej 5 znaków");
  return false;
 }
 if (istemat.length > 50)
 {
  alert("Temat zawiera za wiele znaków (maksymalnie 50 znaków");
  return false;
 }
 /* AreaText */
  var istekst = document.forms["formulaz"]["tresc"].value;
 
 if (istekst == null || istekst == "")
 {
  alert("Wpisz wiadomość");
  return false;
 }
 if (istekst.length < 3)
 {
  alert("Wiadomość jest za krótka");
  return false;
 }
 if (istekst.length > 500)
 {
  alert("Wiadomość zawiera za wiele znaków (maksymalnie 500 znaków");
  return false;
 } 
 else {
	 alert("Wiadomość została wysłana");
 }

}