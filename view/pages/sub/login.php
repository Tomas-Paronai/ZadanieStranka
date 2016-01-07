<?php 
?>

<div class="registration-pointer">If not registered, you can register <a class="registration-link" href="?page=comunity&sub=registration">here</a>.</div>

<form id="login" method="POST" onSubmit="return beforeSubmit()" action="API/Login.php">
	<ul id="login-form">
		<li><b>Login:</b> <input type="text" name="login-key"><span id="login-error"></span></li>
		<li><b>Password:</b> <input type="password" name="login-pass"></li>
		<li><input type="submit" value="Login" name="submit" "></li>
	</ul>
</form>