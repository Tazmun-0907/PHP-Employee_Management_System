<?php

include("db.php");

$username="";
$salary="";
$rank="";

$usernameError="";
$salaryError="";
$rankError="";
$message="";

if($_SERVER["REQUEST_METHOD"]=="POST")

{

$username=$_POST["username"];

$salary=$_POST["salary"];

$rank=$_POST["rank"];


if(empty($username))

{

$usernameError="Enter Username";

}


if(empty($salary))

{

$salaryError="Enter Salary";

}


if($rank=="")

{

$rankError="Enter Rank";

}


if($usernameError=="" && $salaryError=="" && $rankError=="")

{


$check="SELECT * FROM Employee

WHERE first_name='$username'";

$result=mysqli_query($conn,$check);


if(mysqli_num_rows($result)>0)

{

$message="Username Already Exists";

}

else

{


$sql="INSERT INTO Employee(first_name,salary,`Rank`)

VALUES('$username','$salary','$rank')";


if(mysqli_query($conn,$sql))

{

$message="Registration Successful";

}

else

{

$message="Registration Failed";

}

}

}

}

?>

<!DOCTYPE html>

<html>

<head>

<title>Registration</title>

</head>

<body>

<h1 align="center">

Employee Registration

</h1>

<hr>

<fieldset>

<legend><b>Registration</b></legend>

<form method="post">

Username

<br>

<input

type="text"

name="username"

value="<?php echo $username;?>"

>

<span style="color:red;">

<?php echo $usernameError;?>

</span>

<br><br>


Salary

<br>

<input

type="number"

name="salary"

value="<?php echo $salary;?>"

>

<span style="color:red;">

<?php echo $salaryError;?>

</span>

<br><br>


Rank

<br>

<input

type="number"

name="rank"

value="<?php echo $rank;?>"

>

<span style="color:red;">

<?php echo $rankError;?>

</span>

<br><br>


<input type="submit" value="Register">

<input type="reset" value="Reset">

<a href="login.php">

<input type="button" value="Login">

</a>

<br><br>

<span style="color:green;">

<?php echo $message;?>

</span>

</form>

</fieldset>

<hr>

<p align="center">

Copyright &copy;

<?php echo date("Y");?>

</p>

</body>

</html>