<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Gamers United</title>

	<style type="text/css">
		body {
			background-color: #202225;
			margin: 40px;
			font: 13px/20px 'Orbitron', sans-serif;
			color: #4F5155;
		}

		a {
			color: #33b249;
			background-color: transparent;
			font-weight: normal;
			text-decoration: none;
			transition: color 0.3s ease;
		}

		a:hover {
			color: #5865F2;
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
			font-family: 'Orbitron', sans-serif;
			border-bottom: 3px solid #33b249;
		}

		h1, h2, p, label {
			color: #fff;
		}

		input, h2, {
			margin: 10px;
		}

		input[type="text"],
		input[type="password"],
		input[type="email"] {
			width: 50%;
			padding: 12px 20px;
			margin-bottom: 15px;
			border: 1px solid #ccc;
			border-radius: 5px;
		}

		input[type="submit"]{
			color: #fff;
			background-color: #5865F2;
			padding: 12px 20px;
			border-radius: 5px;
		}

		input[type="file"]{
			margin: 10px;
		}

		#sectionLeft{
			display: flex;
			flex-direction: column;
			align-items: flex-start;
			width: 50%;
		}

		#sectionRight {
			width: 50%;
		}

		#subsection{
			display: flex;
			justify-content: space-between;
			padding-top: 10px;
			padding-bottom: 10px;
			border-bottom: 3px solid #33b249;
			margin: 10px;
		}

		#panel {
			width: 60%;
			padding: 30px;
			margin: auto;
			background-color: #1e1e1e;
			color: #fff;
			box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.4);
			border-radius: 15px;
			border: 3px solid #33b249;
			font-family: 'Orbitron', sans-serif;
			text-align: center;
		}


		#subsubsectionLeft {
			flex: 1;
			width: 60%;
		}

		#subsubsectionRight {
			flex: 1;
			width: 40%;
		}

		#imagePreviewContainer {
			width: 150px;
			height: 150px;
			overflow: hidden;
			margin: 10px;
			border-radius: 50%;
			border: 3px solid #33b249;
			display: flex;
			justify-content: center;
			align-items: center;
			background: #000;
		}

		#imagePreview {
			width: 100%;
			height: 100%;
			object-fit: cover;
			border-radius: 50%;
		}

		.checkbox-container {
			display: flex;
			align-items: center;
			margin: 10px;
		}

		.checkbox-container input[type="checkbox"] {
			margin-right: 8px;
		}

		.checkbox-container label {
			margin: 0;
			line-height: 1.5;
		}

		.success {
			color: green;
			font-weight: bold;
		}

		.error {
			color: red;
			font-weight: bold;
		}

	</style>
</head>
<body>

<div id="nav">
	<h1>Welcome to Gamers United!</h1>
</div>

<div id="container">
	<div id="sectionLeft">
		<div id="panel">
			<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque dignissim mattis nisl,
				eu porttitor lorem accumsan sit amet. Curabitur arcu nibh, mollis eu finibus ac, aliquet id velit.
				Maecenas sollicitudin diam id turpis varius, in euismod metus maximus. Duis id neque a neque tincidunt mattis sed ut ante.
				Maecenas volutpat rutrum purus, a rutrum metus mattis egestas. Donec lacus tellus, faucibus id ullamcorper vel, consectetur eu lacus.
				Integer pretium felis ac malesuada laoreet. Sed dignissim, lacus sed efficitur pulvinar, erat lacus mollis neque, a scelerisque ligula mi non risus.
			</h3>
		</div>
	</div>
	<div id="sectionRight">
		<div id="subsection">
			<form>
				<h2>Login or Sign-up</h2><br>
				<input type="text" id="usernameLogin" name="usernameLogin" placeholder="Username">
				<input type="password" id="passLogin" name="passLogin" placeholder="Password"><br>
				<input type="submit" value="Login"><br>
			</form>
		</div>
		<div id="subsection">
			<div id="subsubsectionLeft">
				<form id="signupform" name="signupform">
					<input type="text" id="fname" name="fname" placeholder="First Name"><br>
					<input type="text" id="lname" name="lname" placeholder="Last Name"><br>
					<input type="text" id="usernameSignup" name="usernameSignup" placeholder="Username"><br>
					<input type="password" id="passSignup" name="passSignup" placeholder="Password"><br>
					<input type="password" id="passConfirm" name="passConfirm" placeholder="Password Confirmation"><br>
					<input type="email" id="email" name="email" placeholder="Email"><br>
					<input type="submit" value="Signup">
				</form>
			</div>
			<div id="subsubsectionRight">
				<form>
					<div id="imagePreviewContainer">
						<img id="imagePreview" />
					</div>
					<input type="file" id="profilePic" name="profilePic" accept="image/*" onchange="previewImage(event)"><br>
					<div class="checkbox-container">
						<input type="checkbox" id="terms" name="terms">
						<label for="terms">By using our services, you agree to our <a href="URL_TO_YOUR_TERMS" target="_blank">Terms of Service</a>.
							Read them for details on user conduct, content guidelines, and privacy policies.
							Contact our support team for questions.</label>
					</div>
					<div class="checkbox-container">
						<input type="checkbox" id="newsletter" name="newsletter">
						<label for="newsletter">Subscribe to our newsletter for the latest updates and exclusive content.
							By checking the box, you consent to receive newsletters and promotional emails.
							Unsubscribe anytime in your account settings. We respect your privacy and won't share your email.</label>
					</div>

				</form>
			</div>
		</div>

	</div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		$('#signupform').submit(function(event) {
			event.preventDefault(); // Prevent form submission

			// Collect form data
			var formData = {
				fname: $('#fname').val(),
				lname: $('#lname').val(),
				usernameSignup: $('#usernameSignup').val(),
				passSignup: $('#passSignup').val(),
				passConfirm: $('#passConfirm').val(),
				email: $('#email').val()
			};

			// Client-side validation
			if (!formData.fname || !formData.lname || !formData.usernameSignup || !formData.passSignup || !formData.passConfirm || !formData.email) {
				alert('All fields are required.');
				return;
			}

			if (!validateEmail(formData.email)) {
				alert('Please enter a valid email address.');
				return;
			}

			if (formData.passSignup !== formData.passConfirm) {
				alert('Passwords do not match.');
				return;
			}

			// Send data to the server
			$.ajax({
				type: 'POST',
				url: 'http://localhost/CW/index.php/welcome_controller/signup',
				data: formData,
				success: function(response) {
					// Handle success
					console.log('Signup successful:', response);
					var res = JSON.parse(response);
					if(res.success) {
						alert('Signup successful!');
					} else {
						alert('Signup failed: ' + res.message);
					}
				},
				error: function(xhr, status, error) {
					// Handle error
					console.error('Error:', error);
					alert('An error occurred. Please try again.');
				}
			});
		});
	});

	function validateEmail(email) {
		var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
		return re.test(String(email).toLowerCase());
	}

	function previewImage(event) {
		var reader = new FileReader();
		reader.onload = function() {
			var output = document.getElementById('imagePreview');
			output.src = reader.result;
		};
		reader.readAsDataURL(event.target.files[0]);
	}
</script>
</body>
</html>
