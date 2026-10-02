<?php

session_start();

include("db.php");

$username="";

$password="";

$error="";

if($_SERVER["REQUEST_METHOD"]=="POST")

{

$username=$_POST["username"];

$password=$_POST["password"];

if(empty($username))

{

$error="Enter Username(first name)";

}

else if(empty($password))

{

$error="Enter Password (salary)";

}

else

{

$sql="SELECT * FROM Employee

WHERE first_name='$username'

AND salary='$password'";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==1)

{

$row=mysqli_fetch_assoc($result);

$_SESSION["id"]=$row["salary"];

$_SESSION["username"]=$row["first_name"];

header("Location: dashboard.php");

exit();

}

else

{

$error="Invalid Username or Password";

}

}

}

?>

<!DOCTYPE html>

<html>

<head>

<title>Login</title>

</head>

<body>

<h1 align="center">

Employee Management System

</h1>

<hr>

<fieldset>

<legend>

<b>LOGIN</b>

</legend>

<form method="post">

Username(first name)

<br>

<input

type="text"

name="username"

value="<?php echo $username;?>">

<br><br>

Password (salary)

<br>

<input

type="password"

name="password">

<br><br>

<input

type="submit"

value="Login">

<a href="registration.php">

<input

type="button"

value="Registration">

</a>

<br><br>

<span style="color:red;">

<?php

echo $error;

?>

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
 