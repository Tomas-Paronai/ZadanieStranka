<?php 
?>

<div class="registration-pointer">If not registered, you can register <a id="registration-link" href="?page=comunity&sub=registration">here</a>.</div>

<form id="login" method="POST" onSubmit="return beforeSubmit()" action="API/Login.php">
	<ul id="login-form">
		<li><b>Login:</b> <input type="text" id="login-key"><span id="login-error"></span></li>
		<li><b>Password:</b> <input type="password" id="login-pass"></li>
		<li><input type="submit" value="Login" name="submit" "></li>
	</ul>
</form>