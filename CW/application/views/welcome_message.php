<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">
		body {
			background-color: #202225;
			margin: 40px;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #4F5155;
		}

		a {
			color: #003399;
			background-color: transparent;
			font-weight: normal;
		}

		a:hover {
			color: #97310e;
		}

		#container {
			margin: 10px;
			display: flex;
			justify-content: flex-end;
		}

		#nav {
			background-color: #202225;
			color: #fff;
			padding: 10px 20px;
			display: flex;
			align-items: center;
			justify-content: space-between;
			font-family: 'Arial', sans-serif;
			border-bottom: 3px solid #5865F2;
		}

		h1, h2 {
			color: #fff;
		}

		input, h2 {
			margin: 10px;
		}

		input[type="text"],
		input[type="password"],
		input[type="email"] {
			width: 50%;
			padding: 12px 20px;
			margin-bottom: 15px;
			border: 1px solid #ccc;
			border-radius: 4px;
		}

		input[type="submit"] {
			color: #ffffff;
			background-color: #015546;
			padding: 12px 20px;
		}

		#section {
			width: 50%;
		}

		#subsection{
			padding-top: 10px;
			padding-bottom: 10px;
			border-bottom: 3px solid #89f258;
		}

	</style>
</head>
<body>

<div id="nav">
	<h1>Welcome to Gamers United!</h1>
</div>

<div id="container">
	<div id="section">
		<div id="subsection">
			<form>
				<h2>Login or Sign-up</h2><br>
				<input type="text" id="usernameLogin" name="usernameLogin" placeholder="Username">
				<input type="password" id="passLogin" name="passLogin" placeholder="Password"><br>
				<input type="submit" value="Login"><br>
			</form>
		</div>
		<div id="subsection">
			<form>
				<input type="text" id="fname" name="fname" placeholder="First Name"><br>
				<input type="text" id="lname" name="lname" placeholder="Last Name"><br>
				<input type="text" id="usernameSignup" name="usernameSignup" placeholder="Username"><br>
				<input type="password" id="passSignup" name="passSignup" placeholder="Password"><br>
				<input type="password" id="passConfirm" name="pass" placeholder="Password Confirmation"><br>
				<input type="email" id="pass" name="pass" placeholder="Email"><br>
				<input type="submit" value="Signup">
			</form>
		</div>

	</div>

</div>

</body>
</html>
