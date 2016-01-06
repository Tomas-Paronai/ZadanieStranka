/**
 * 
 */

function beforeRegPost(){
	
	var name = document.getElementById('name').value;
	var surname = document.getElementById('surname').value;
	var email = document.getElementById('email').value;
	var passwords = document.getElementsByName('password');
	var errors = 0;
	
	
	
	if(!/^[a-zA-Z]{2,}$/.test(name)){
		errors++;
		document.getElementById('name-err').innerHTML = '*Invalid name format!';
	}
	else{
		document.getElementById('name-err').innerHTML = '*OK';
	}
	
	
	if(!/^[a-zA-Z]{2,}$/.test(surname)){
		errors++;
		document.getElementById('surname-err').innerHTML = '*Invalid surname format!';
	}
	else{
		document.getElementById('surname-err').innerHTML = '*OK';
	}
	
	if(email == "" || email == null){
		errors++;
		document.getElementById('email-err').innerHTML = '*Invalid email!';
	}
	else{
		document.getElementById('email-err').innerHTML = '*OK';
	}
		
	if(passwords[0].value != passwords[1].value || passwords[0].value.length <= 6){
		errors++;
		document.getElementById('pass-err').innerHTML = '*Passwords does not match!';
		if(passwords[0].value.length <= 6){
			document.getElementById('pass-err').innerHTML = '*Password must be longer than 6 chars!';
		}
	}
	else{
		document.getElementById('pass-err').innerHTML = '*OK';
	}
	
	
	if(errors != 0){
		return false;
	}
	
	return true;
}

function backToLogin(){
	window.location.href='?page=comunity';
}