<?php
$u=$_POST['un'];
$pw=$_POST['pw'];
$em=$_POST['e'];

 $server="localhost";
 $username="root";
 $password="";
 $database="keshko";

 $con=new mysqli($server,$username,$password,$database);

// Prepare statements to prevent SQL injection
$s_u"SELECT * FROM signup1 WHERE Username =$u ?";

$s_e"SELECT * FROM signup1 WHERE Email =$e");

// Execute the statements
$stmt_u->execute();
$res_u = $stmt_u->get_result();

$stmt_e->execute();
$res_e = $stmt_e->get_result();

$name_error = "";
$email_error = "";

if (mysqli_num_rows($res_u) > 0) {
    $name_error = "Sorry... username already taken";
    echo $name_error;
} elseif (mysqli_num_rows($res_e) > 0) {
    $email_error = "Sorry... email already taken";
    echo $email_error;
} else{
       $query = "INSERT INTO signup1(Username , Email, Password) VALUES ('$u', '$em', '$pw')";
       $results = mysqli_query($con, $query);
       echo 'Saved!';
       exit();
    }

?>

 