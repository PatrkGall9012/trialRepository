<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registration</title> 

</head>
<h1>Log In</h1>
<body>
<a href="<?=base_url('webproj_app/')?>">Back</a>

	<form method="post" action="<?php echo base_url()?>webproj_app/loginnow">
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
		<input type="submit" name="insert" value="Log In"/>
	</div>

	<?php
	if($this->session->flashdata('error')) {	?>
	<p class="text-success"> <?=$this->session->flashdata('error')?></p>
<?php }?>
</form>

</body>
</html>