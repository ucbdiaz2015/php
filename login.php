<?php
 
//Connect to DB
 
$db_username = "b12_15109132";
$db_pass="squadspot";
$db_host = "sql309.byethost12.com";
$db_name = "b12_15109132_roster";
 
$con=mysqli_connect("$db_host","$db_username","$db_pass","$db_name"); 
 
// Check connection
if (mysqli_connect_errno()) {
  echo"<script language=javascript>alert('An unexpected error has occurred; please try again.')</script>";
  echo'<script language="JavaScript"> window.location.href ="http://surgeplanet.byethost12.com/login.html" </script>';
}
 
// Get form inputs
$email = mysqli_real_escape_string($con,$_POST['login']);
$pass = mysqli_real_escape_string($con,$_POST['pass']);
$check = mysqli_fetch_array(mysqli_query($con,"SELECT email,pass FROM users WHERE email='$email' "));
 
//make sure no fields are empty
if ($email=='' || $pass=='') {
  echo"<script language=javascript>alert('Please fill in all fields.')</script>";
  mysqli_close($con);
  echo'<script language="JavaScript"> window.location.href ="http://surgeplanet.byethost12.com/login.html" </script>';
 
//make sure info is correct
} elseif ($check['email'] == $email && $check['pass'] == $pass) {
  mysqli_close($con);
  echo'<script language="JavaScript"> window.location.href ="http://surgeplanet.byethost12.com/home.html" </script>';
  mysqli_close($con);

//Invalid Info
} else {
  echo"<script language=javascript>alert('The email and password you entered do not match.')</script>";
  echo'<script language="JavaScript"> window.location.href ="http://surgeplanet.byethost12.com/login.html" </script>';
  mysqli_close($con);
}
 
 
?>		
