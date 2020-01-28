<?php

require('connection.php');

if(isset($_POST['submit']))
{
	$first = $_POST['firstname'];
	$firstlower = strtolower($first);
	$last = $_POST['lastname'];

$sqltrigger = "CREATE TRIGGER MysqlTrigger BEFORE INSERT ON test FOR EACH ROW SET test.id=CONCAT('RU',LPAD(LAST_INSERT_ID(),3,'0'));";

$qw=mysqli_query($conn,$sqltrigger);

if ($qw) {
    echo "New record created successfully";
} else {
    echo "Error: ";
}


print "<h2>MySQL: Update Statement</h2>";

$qry = "INSERT INTO test(id,fname,lname) VALUES(2,".$first.",".$last.")";
$st = mysqli_query($conn,$qry);
	if($st)
		{ 

			echo "Table has been updated.";
		}



print "<h2>MySQL: Effect of Trigger</h2>";
$we = "SELECT * FROM test";

$result = mysqli_query($conn,$we);
echo "<table border='1'>

<tr>

<th>EmpId</th>

<th>Firstname</th>

<th>Salary</th>

</tr>";

while($row = mysqli_fetch_array($result))

{


echo "<tr>";

echo "<td>" . $row['id'] . "</td>";

echo "<td>" . $row['fname'] . "</td>";

echo "</tr>";

}

echo "</table>";

mysqli_close($conn);


/*create trigger stud_marks 
before INSERT 
on 
Student 
for each row 
set Student.total = Student.subj1 + Student.subj2 + Student.subj3, Student.per = Student.total * 60 / 100;

	$sql = "INSERT INTO employee_details_table(employee_id, employee_first_name, employee_last_name,graduation_percentile)VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}*/

	

}