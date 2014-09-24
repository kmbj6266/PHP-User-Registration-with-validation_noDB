<?php
	session_start();
?>
<html>
<head>
		<title>Basic I - EMAIL VALIDATION</title>
		<style>
			p{
				color:red;
				font-weight: bold;
			 }
			.asterik
				{
				color:red;
				}
		</style>

</head>
	<body>
		<form action='process.php' method='post'>

			<p>* required field</p>
<!-- return an error above the form that asks the user to correct the info -->

	<?php 
				if(isset($_SESSION['error'])) 
				{
					foreach ($_SESSION['error'] as $error) {
						echo "<p>{$error}</p>";
					}
					unset($_SESSION['error']);
				} 
	?>

			<div>
				Email:<span class="asterik">*</span><input type='text' name='email'>
			</div>
			
			<div>

				First Name:<span class="asterik">*</span><input type='text' name='first_name'>
			</div>	

			<div>
				Last Name:<span class="asterik">*</span><input type='text' name='last_name'>
			</div>	

			<div>
				Password:<span class="asterik">*</span><input type='password' name='password'>
			</div>	

			<div>
				Confirm Password:<span class="asterik">*</span><input type='password' name='confirm_password'>
			</div>	

			<div>
				Birthdate:<input type='date' name='birthdate' >
			</div>	

			<!-- <div>
				Please upload a profile picture:
				<label for="picture">Upload Photo</label>
				<input type="file" name="photo">
			</div> -->

			<div>
				<input type='submit' value='SUBMIT NOW!'>
			</div>

			</form>
		</body>
		</html>