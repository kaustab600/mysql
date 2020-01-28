<?php

require('connection.php');

if(isset($_POST['submit']))
{
	$first = $_POST['firstname'];
	$firstlower = strtolower($first);
	$last = $_POST['lastname'];

				$grad  = $_POST['grad'];
	$number = explode('%', $grad);
	$percent = $number[0];

	$sal = $_POST['salary'];
	$domain = $_POST['domain'];

	$qr1 = "select count(employee_id) as record from employee_details_table";

	$rs = mysqli_query($conn,$qr1);

	if($rs)
		{
		$row = mysqli_fetch_assoc($rs);
		$new = $row["record"]+1;
		$ide = 'RU'.$new;
	}

	$qr2 = "insert into employee_details_table(employee_id,employee_first_name,employee_last_name,graduation_percentile) values('".$ide."','".$first."','".$last."','".$percent."')";

	$res = mysqli_query($conn,$qr2);



	if(isset($firstlower))
	{
		$empid = 'su'.$firstlower;
	}

	if(isset($domain))
	{
		if($domain == 'java')
		{
			$empcode = 'ru_'.$firstlower;
		}

		if($domain == 'php')
		{
			$empcode = 'du_'.$firstlower;
		}

		if($domain == 'angular js')
		{
			$empcode = 'tu_'.$firstlower;
		}

	}

	
	$qr3 = "insert into employee_code_table(employee_code,employee_code_name,employee_domain) values('".$empid."','".$empcode."','".$domain."')";

	$res1 = mysqli_query($conn,$qr3);


	$qr4 = "insert into employee_salary_table(employee_id,employee_salary,employee_code) values('".$ide."','".$sal."','".$empid."')";

	$res1 = mysqli_query($conn,$qr4);


	mysqli_close($conn);


	

}