<?php
	require('connection.php');


	if(isset($_POST['query1']))
	{
		$qr1 = "select employee_details_table.employee_first_name from employee_details_table join employee_salary_table on employee_details_table.employee_id = employee_salary_table.employee_id where employee_salary_table.employee_salary>'50k'";
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
	{
		$qr2 = "select em.employee_last_name from employee_details_table em where em.graduation_percentile>70";
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
		$qr3 = "select ec.employee_code_name from employee_code_table ec where ec.employee_code in (select es.employee_code from employee_salary_table es where es.employee_id in (select em.employee_id from employee_details_table em where em.graduation_percentile<70))";
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
		$qr4 = "select ed.employee_first_name , ed.employee_last_name from employee_details_table ed where ed.employee_id in (select es.employee_id from employee_salary_table es where es.employee_code in (select ec.employee_code from employee_code_table ec where ec.employee_domain='java'))";
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
		$qr5 = "select ec.employee_domain , sum(es.employee_salary) as totalamount from employee_code_table ec inner join employee_salary_table es on ec.employee_code=es.employee_code group by ec.employee_domain order by totalamount desc";
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
			<td><?php echo $row['totalamount'];?></td>
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
		$qr6 = "select ec.employee_domain , sum(es.employee_salary) total from employee_code_table ec join employee_salary_table es on ec.employee_code = es.employee_code where es.employee_salary>'25k' group by ec.employee_domain order by total desc";
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
			<td><?php echo $row['total'];?></td>
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

	