/**
 * 
 */

function beforeSubmit(){
	var login = document.getElementById('login-key').value;
	var password = document.getElementById('login-pass').value;
	
	if(!/^[a-zA-Z]{4,}[0-9]*$/.test(login) || (password == '' || password == null)){
		document.getElementById('login-error').innerHTML = "Wrong login!";
		return false;
		//$("#login").submit();
	}	
	return true;
}