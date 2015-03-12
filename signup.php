<?php

//Connect to DB
$db_username = "****";
$db_pass="****";
$db_host = "****";
$db_name = "****";

$con=mysqli_connect("$db_host","$db_username","$db_pass","$db_name"); 
  
// Check connection
if (mysqli_connect_errno()) {
  echo"<script language=javascript>alert('An unexpected error has occurred; please try again.')</script>";
  echo'<script language="JavaScript"> window.location.href ="http://surgeplanet.byethost12.com/signup.html" </script>';
}

// Get form inputs
$email = mysqli_real_escape_string($con, $_POST['login']);
$pass1 = mysqli_real_escape_string($con, $_POST['pass1']);
$pass2 = mysqli_real_escape_string($con, $_POST['pass2']);
$check = mysqli_fetch_array(mysqli_query($con,"SELECT email,pass FROM users WHERE email='$email' "));

//make sure no fields are empty
if ($email=='' || $pass1=='' || pass2=='') {
  echo"<script language=javascript>alert('Please fill in all fields.')</script>";
  echo'<script language="JavaScript"> window.location.href ="http://surgeplanet.byethost12.com/signup.html" </script>';
  mysqli_close($con);

//make sure email isn't already registered
} elseif ($check['email'] == $email) {
  echo "<script language=javascript>alert('An account already exists for this email.')</script>";
  echo'<script language="JavaScript"> window.location.href ="http://surgeplanet.byethost12.com/signup.html" </script>';
  mysqli_close($con);

//make sure passwords match
} elseif ($pass1 != $pass2) {
  echo "<script language=javascript>alert('Passwords do not match.')</script>";
  echo'<script language="JavaScript"> window.location.href ="http://surgeplanet.byethost12.com/signup.html" </script>';
  mysqli_close($con);

//Valid entries --> Post to DB
} else {
  $sql="INSERT INTO users (email,pass) VALUES ('$email','$pass1')";
  mysqli_query($con,$sql);
  echo'<script language="JavaScript"> window.location.href ="http://surgeplanet.byethost12.com/home.html" </script>';
  mysqli_close($con);

}


?>					
