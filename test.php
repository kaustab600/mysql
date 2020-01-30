
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#frm1{
			display:inline-block;
			padding: 10px;
		}
	</style>
</head>
<body> 
		<form name="frm1" id="frm1" method="post" action="<?php  echo $_SERVER['PHP_SELF'];   ?>">
		<input type="text" name="validate">
		<input type="submit" name="submit" value="submit">
	    </form>
	   <?php

	   	if(isset($_POST['submit']))
	   	{
	   		$val = $_POST['validate'];
	   		$num = filter_var($val,FILTER_SANITIZE_NUMBER_INT);
	   		//echo $num;
	   		if($num<250)
	   		{
	   			echo $num;
	   		}
	   		else
	   		{
	   			echo "invalid";
	   		}
	   	}


	   ?>
	    

</body>
</html>