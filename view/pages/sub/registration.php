<?php
?>

<div><h2 class="registration-header" >Registration</h2></div>
<form  method="POST" onSubmit="return beforeRegPost()" action="API/Register.php">
	<ul id="registration">
		<li class="registration-item">Nick: <input type="text" id="nick" name="nick" placeholder="Nickname..."><span id="nick-err">*</span></li>
		<li class="registration-item">Name: <input type="text" id="name" name="name" placeholder="Name..."><span id="name-err">*</span></li>
		<li class="registration-item">Surname: <input type="text" id="surname" name="surname" placeholder="Surname..."><span id="surname-err">*</span></li>
		<li class="registration-item">Email: <input type="email" id="email" name="email" placeholder="email@guru.com..."><span id="email-err">*</span></li>
		<li class="registration-item">Password: <input type="password" name="password" placeholder="password..."><span id="pass-err">*</span></li>
		<li class="registration-item">Repeat password:<input type="password" name="password" placeholder="password..."></li>
		<li class="registration-item"><input type="submit" value="Register" name="submit"><input type="button" value="Login" onClick="backToLogin()"></li>
	</ul>
</form>