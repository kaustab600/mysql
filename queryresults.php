<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		/*#tables{
			display: inline-block;
		}

		.table1{
			float:left;
		}

		#table2{
			float:right;
		}
*/
	
	</style>
</head>
<body>



<?php
	require('connection.php');

	$q1 = "select er.employee_referid, ed.employee_first_name , ed.employee_last_name,ed.graduation_percentile from employee_refer_id er  inner join employee_details_table ed on er.employee_id = ed.employee_id";
	$res = mysqli_query($conn,$q1);
	if(mysqli_num_rows($res)>0)
	{
		{ 
	?>
	
	<div id="tables">
	<div class="table1">
	<table  border="1px solid black">
		<tr>
			<th>employee id</th>
			<th>employee first</th>
			<th>employee last</th>
			<th>graduation percentile</th>
		</tr>
		<?php

			while($row = mysqli_fetch_assoc($res))
			{
		?>
		<tr>
			<td><?php echo $row['employee_referid']; ?></td>
			<td><?php echo $row['employee_first_name']; ?></td>
			<td><?php echo $row['employee_last_name']; ?></td>
			<td><?php echo $row['graduation_percentile']; ?></td>
		</tr>
		<?php

			}
		?>
	</table>
</div>
	<?php
		}
	}
		echo"<br><br>";
	$q1 = "select * from employee_code_table";
	$res = mysqli_query($conn,$q1);
	if(mysqli_num_rows($res)>0)
	{
		{ 
	?>
	<div class="table1">
	<table border="1px solid black">
		<tr>
			<th>employee code</th>
			<th>employee code name</th>
			<th>employee domain</th>
			
		</tr>
		<?php

			while($row = mysqli_fetch_assoc($res))
			{
		?>
		<tr>
			<td><?php echo $row['employee_code']; ?></td>
			<td><?php echo $row['employee_code_name']; ?></td>
			<td><?php echo $row['employee_domain']; ?></td>
		</tr>
		<?php

			}
		?>
	</table>
</div>
	<?php
		}
	}

	echo"<br><br>";
	$q1 = "select er.employee_referid, es.employee_salary , es.employee_code from employee_refer_id er  inner join employee_salary_table es on er.employee_id = es.employee_id";
	$res = mysqli_query($conn,$q1);
	if(mysqli_num_rows($res)>0)
	{
		{ 
	?>
	<div class="table1">
	<table border="1px solid black" id="table2">
		<tr>
			<th>employee id</th>
			<th>employee salary</th>
			<th>employee code</th>
			
		</tr>
		<?php

			while($row = mysqli_fetch_assoc($res))
			{
		?>
		<tr>
			<td><?php echo $row['employee_referid']; ?></td>
			<td><?php echo $row['employee_salary']; ?></td>
			<td><?php echo $row['employee_code']; ?></td>
		</tr>
		<?php

			}
		?>
	</table>
</div>
	<?php
		}
	}




	if(isset($_POST['query1']))
	{	
		echo "<br>Q1) WAQ to list all employee first name with salary greater than 50k.<br>";

		$qr1 = "select ed.employee_first_name from employee_details_table ed join employee_salary_table es on ed.employee_id = es.employee_id where es.employee_salary>50000;";
		$rs = mysqli_query($conn,$qr1);
		if(mysqli_num_rows($rs)>0)
		{ 
	?>
	<table cellpadding="10" cellspacing="5" border="1px solid black">
		<tr>
			<th>employee name</th>
		</tr>
		<?php

			while($row = mysqli_fetch_assoc($rs))
			{
		?>
		<tr>
			<td><?php echo $row['employee_first_name']; ?></td>
		</tr>
		<?php

			}
		?>
	</table>
	<?php
		}
	}

	if(isset($_POST['query2']))
	{	echo "<br>Q2) WAQ to list all employee last name with graduation percentile greater than 70%<br>";

		$qr2 = "select ed.employee_last_name from employee_details_table ed where graduation_percentile>70.00";
		$rs = mysqli_query($conn,$qr2);
		if(mysqli_num_rows($rs)>0)
		{ 
	?>
	<table cellpadding="10" cellspacing="5" border="1px solid black">
		<tr>
			<th>employee name</th>
		</tr>
		<?php

			while($row = mysqli_fetch_assoc($rs))
			{
		?>
		<tr>
			<td><?php echo $row['employee_last_name']; ?></td>
		</tr>
		<?php

			}
		?>
	</table>
	<?php
		}
	}

	if(isset($_POST['query3']))
	{
		echo "<br>Q3) WAQ to list all employee code name with graduation percentile less than 70%.<br>";

		$qr3 = "select ec.employee_code_name from employee_code_table ec join employee_salary_table es on ec.employee_code = es.employee_code join employee_details_table ed on es.employee_id = ed.employee_id where ed.graduation_percentile>70.00";
		$rs = mysqli_query($conn,$qr3);
		if($rs)
		{ 
	?>
	<table cellpadding="10" cellspacing="5" border="1px solid black">
		<tr>
			<th>employee_code_name</th>
		</tr>
		<?php

			while($row = mysqli_fetch_assoc($rs))
			{
		?>
		<tr>
			<td><?php  echo $row['employee_code_name']; ?></td>
		</tr>
		<?php

			}
		?>
	</table>
	<?php
		}
	}

	if(isset($_POST['query4']))
	{
		echo "<br>Q4) WAQ to list all employee’s full name that are not of domain Java.<br>";

		$qr4 = "select ed.employee_first_name,ed.employee_last_name from employee_details_table ed join employee_salary_table es on ed.employee_id = es.employee_id join employee_code_table ec on es.employee_code = ec.employee_code where ec.employee_domain!='java'";
		$rs = mysqli_query($conn,$qr4);
		if($rs)
		{ 
	?>
	<table cellpadding="10" cellspacing="5" border="1px solid black">
		<tr>
			<th>employee_full_name</th>
		</tr>
		<?php

			while($row = mysqli_fetch_assoc($rs))
			{
		?>
		<tr>
			<td><?php  echo $row['employee_first_name']." ".$row['employee_last_name'];?></td>
		</tr>
		<?php

			}
		?>
	</table>
	<?php
		}
	}

	if(isset($_POST['query5']))
	{
		echo "Q5) WAQ to list all employee_domain with sum of it's salary.";

		$qr5 = "select ec.employee_domain, sum(es.employee_salary) as totalsal from employee_code_table ec  inner join employee_salary_table es on ec.employee_code=es.employee_code group by ec.employee_domain order by totalsal desc";
		$rs = mysqli_query($conn,$qr5);
		if($rs)
		{ 
	?>
	<table cellpadding="10" cellspacing="5" border="1px solid black">
		<tr>
			<th>employee_domain</th>
			<th>totalamount (in RS)</th>
		</tr>
		<?php

			while($row = mysqli_fetch_assoc($rs))
			{
		?>
		<tr>
			<td><?php echo $row['employee_domain'];?></td>
			<td><?php echo $row['totalsal'];?></td>
		</tr>
		<?php

			}
		?>
	</table>
	<?php
		}
	}

	if(isset($_POST['query6']))
	{
		echo "<br>Q6) Write the above query again but dont include salaries which is less than 30k.<br>";

		$qr6 = "select ec.employee_domain, sum(es.employee_salary) as totalsal from employee_code_table ec  inner join employee_salary_table es on ec.employee_code=es.employee_code where es.employee_salary>30000 group by ec.employee_domain order by totalsal desc";
		$rs = mysqli_query($conn,$qr6);
		if($rs)
		{ 
	?>
	<table cellpadding="10" cellspacing="5" border="1px solid black">
		<tr>
			<th>employee name</th>
			<th>total (in RS)</th>
		</tr>
		<?php

			while($row = mysqli_fetch_assoc($rs))
			{
		?>
		<tr>
			<td><?php echo $row['employee_domain'];?></td>
			<td><?php echo $row['totalsal'];?></td>
		</tr>
		<?php

			}
		?>
	</table>
	<?php
		}
	}

	if(isset($_POST['query7']))
	{
		echo "<br>Q7) WAQ to list all employee id which has not been assigned employee code.<br>";

		$qr7 = "select employee_salary_table.employee_id from employee_salary_table where employee_salary_table.employee_code is null";
		$rs = mysqli_query($conn,$qr7);
		if($rs)
		{ 
	?>
	<table cellpadding="10" cellspacing="5" border="1px solid black">
		<tr>
			<th>employee_id</th>
		</tr>
		<?php

			while($row = mysqli_fetch_assoc($rs))
			{
		?>
		<tr>
			<td><?php echo $row['employee_id'];?></td>
		</tr>
		<?php

			}
		?>
	</table>
	<?php
		}
	}
	mysqli_close($conn);

	?>
</body>
</html>
	