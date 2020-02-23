<!DOCTYPE html>
<html>
<head>
	<title>home</title>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
	<?php include('invalidinputalert.php'); ?>
	<h2>please enter an employee details </h2>
	<form name="frm1" id="frm1" method="post" action="gettingdata.php">
		 firstname:<input type="text" name="firstname" placeholder="enter your firstname e.g abc" pattern="[a-zA-Z ]+">
		 lastname:<input type="text" name="lastname"  placeholder="enter your lastname e.g abc" pattern="[a-zA-Z ]+">
		 graduation percentage:<input type="text" name="grad"  placeholder="enter your graduation percentile e.g 50%" pattern="\d{1,3}?%">
		 employee salary:<input type="number" name="salary"  placeholder="enter your salary e.g 5000" pattern="\d+">
		 employee domain:<input type="text" name="domain"  placeholder="enter your name e.g java or php or angular js" pattern="php|java|angular js">
		 <input type="submit" name="submit" value="save">

	</form>

</body>
</html>