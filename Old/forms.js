function formhash(form, password) {
    // Tworzenie nowego elementu, który bedzie naszym shashowanym hasłem 
    var p = document.createElement("input");
 
    // dodanie elementu do form. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
 
    // upewnienie się że password nie został przesłany 
    password.value = "";
 
    // przesłanie formularza
    form.submit();
}
 
function regformhash(form, uid, email, password, conf) {
     // sprawdzanie pól
    if (uid.value == ''         || 
          email.value == ''     || 
          password.value == ''  || 
          conf.value == '') {
 
        alert('You must provide all the requested details. Please try again');
        return false;
    }
 
    // Sprawdzanie username
 
    re = /^\w+$/; 
    if(!re.test(form.username.value)) { 
        alert("Username must contain only letters, numbers and underscores. Please try again"); 
        form.username.focus();
        return false; 
    }
 
    // Sprawdzenie długości hasła
    if (password.value.length < 6) {
        alert('Passwords must be at least 6 characters long.  Please try again');
        form.password.focus();
        return false;
    }
 
    // Wyrażenie regularne jedna Duża litera jedna mała litera + Sprawdzenie długości
 
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/; 
    if (!re.test(password.value)) {
        alert('Passwords must contain at least one number, one lowercase and one uppercase letter.  Please try again');
        return false;
    }
 
    // sprawdzenie hasła i potwierdzenia że są identyczne
    if (password.value != conf.value) {
        alert('Your password and confirmation do not match. Please try again');
        form.password.focus();
        return false;
    }
 
    // Stworzenie elementu input, pole password hash 
    var p = document.createElement("input");
 
    // dodanie elementu p do form
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
 
    
    password.value = "";
    conf.value = "";
 
    // przesłanie formularza. 
    form.submit();
    return true;
}