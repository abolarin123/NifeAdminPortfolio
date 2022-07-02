<?php 
//print($_POST['username']);
include('validation.php');
include('connDriver.php');
$username =isValidated($_POST['username']);
$email=isValidated(isValidEmail($_POST['email']));
$password =isValidated($_POST['password']);
$password= md5($password);
//print $password;
if($check==true){
   $sql ='SELECT COUNT(*)FROM `tbl_users` WHERE email ="$email"';
$result = mysqli_query($con,$sql);
   echo $result ;
}else{
    $_SESSION['error'] = "The data is incorrect";
    header("Location: ../views/auth/register.php ");

}
?>
