<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
	<h2>please enter an employee details </h2>
	<form name="frm1" id="frm1" method="post" action="gettingdata.php">
		 firstname:<input type="text" name="firstname">
		 lastname:<input type="text" name="lastname">
		 graduation percentage:<input type="text" name="grad">
		 employee salary:<input type="text" name="salary">
		 employee domain:<input type="text" name="domain">
		 <input type="submit" name="submit" value="save">

	</form>
	<?php
		include('invalidinputalert.php');

	?>

</body>
</html>