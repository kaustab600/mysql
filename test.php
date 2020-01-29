<?php require('connection.php'); ?>

<?php  mysqli_close($conn); ?>

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
		<input type="submit" name="query1" value="query1">
		<input type="submit" name="query2" value="query2">
		<input type="submit" name="query3" value="query3">
		<input type="submit" name="query4" value="query4">
		<input type="submit" name="query5" value="query5">
		<input type="submit" name="query6" value="query6">
		<input type="submit" name="query7" value="query7">
	    </form>
	    <?php include('test2.php')?>
	    

</body>
</html>