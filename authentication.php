<?php 
//print($_POST['username']);
include('validation.php');
$username =isValidated($_POST['username']);
$email=isValidated(isValidEmail($_POST['email']));
$password =isValidated($_POST['password']);
$password= md5($password);
//print $password;
if($check==true){
   
}else{
    $_SESSION['invalid'] = "the data is incorrect";
    header("Location: ../views/auth/register.php ");
    
}
?>