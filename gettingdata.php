<?php

require('connection.php');

if(isset($_POST['submit']))
{
      $first = $_POST['firstname'];
      $last = $_POST['lastname'];

      $firstlower = strtolower($first);
      $grad  = $_POST['grad'];


      $number = explode('%', $grad);
      $percent = intval($number[0]);

      $sal = $_POST['salary'];

      $domain = $_POST['domain'];

  if(!preg_match('/^[a-zA-Z ]+$/', $first) or !preg_match('/^[a-zA-Z ]+$/', $last))
  {
    header('Location:index.php?msg=please enter valid first or last name');
   
  }
  elseif(!preg_match('/^\d+$/', $sal))
  {
    header('Location:index.php?msg=please enter salary in numbers');
    
  }
  elseif(!preg_match('/^\d{1,3}\%$/', $grad))
  {
    header('Location:index.php?msg=please enter graduation percentage with %');
    
  }
  else{

      //$qr1 = "select count(employee_id) as record from employee_details_table";
      /*$qr1= "select max(employee_id) as maxid from employee_details_table";
      $rs = mysqli_query($conn,$qr1);

      if($rs)
        {
        $row = mysqli_fetch_assoc($rs);
        $new = $row["maxid"];
        //$ide = 'RU'.$new;
        
        $num = filter_var($new,FILTER_SANITIZE_NUMBER_INT);
        $numM = $num + 1;
        $ide = 'RU'.$numM;

      }*/

      $qr2 = "insert into employee_details_table(employee_first_name,employee_last_name,graduation_percentile) values('".$first."','".$last."','".$percent."')";

      $res = mysqli_query($conn,$qr2);


      $qr00 = "select max(employee_id) as max from employee_details_table";
      $rs = mysqli_query($conn,$qr00);
      $row = mysqli_fetch_assoc($rs);
      $newid = $row['max'];

      $qr01 = "insert into employee_refer_id(employee_referid) values('RU".$newid."')";
      $res = mysqli_query($conn,$qr01);

      if(isset($firstlower))
      {
        $empid = 'su_'.$firstlower;
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


      $qr4 = "insert into employee_salary_table(employee_salary,employee_code) values('".$sal."','".$empid."')";

      $res1 = mysqli_query($conn,$qr4);


  }

  mysqli_close($conn);

}

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
    #frm1{
      display:inline-block;
      padding: 10px;
    }
    #navbar{
      display:block;
      width:100%;
      float:left;
    }
  </style>
</head>
<body> 
  <div id="navbar">
    <form name="frm1" id="frm1" method="post" action="<?php  echo $_SERVER['PHP_SELF'];   ?>">
    <input type="submit" name="query1" value="query1">
    <input type="submit" name="query2" value="query2">
    <input type="submit" name="query3" value="query3">
    <input type="submit" name="query4" value="query4">
    <input type="submit" name="query5" value="query5">
    <input type="submit" name="query6" value="query6">
    <input type="submit" name="query7" value="query7">
      </form>
    </div>
      <?php include('queryresults.php')?>

</body>
</html>