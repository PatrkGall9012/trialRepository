<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registration</title> 

</head>
<h1>Registration</h1>
<body>
<a href="<?=base_url('webproj_app/')?>">Back</a>

	<form method="post" action="<?php echo base_url()?>webproj_app/register">
													<!-- controller/function -->
	<div>
		<label>Username:</label>
		<input type="text" name="user" placeholder="Enter Username"/>
	</div>
		<div>
		<label>Password:</label>
		<input type="password" name="pass" placeholder="Enter Password"/>
	</div>
	<div>
		<label>First name:</label>
		<input type="text" name="fname" placeholder="Enter First name"/>
	</div>
	<div>
		<label>Middle name:</label>
		<input type="text" name="mname" placeholder="Enter Middle name"/>
	</div>
	<div>
		<label>Surname:</label>
		<input type="text" name="lname" placeholder="Enter Surname"/>
	</div>
	<div>
		<label>Address:</label>
		<input type="text" name="addrs" placeholder="Enter Address"/>
	</div>

	<div>
		<label>Phone Number:</label>
		<input type="text" name="phnum" placeholder="Enter Phone Number"/>
	</div>
	<div>
		<label>Email Address:</label>
		<input type="text" name="email" placeholder="Enter Email Address"/>
	</div>
	<div>
		<label>Birthday:</label>
		<input type="text" name="bday" placeholder="Enter Birthday (yyyy-dd-mm)"/>
	</div>
	<div>
		<input type="submit" name="insert" value="Register Now"/>
		</div>

	<?php
	if($this->session->flashdata('success')) {	?>
	<p class="text-success"> <?=$this->session->flashdata('success')?></p>
<?php }?>
</form>

</body>
</html>