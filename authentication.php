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
    $sql ='SELECT * FROM `tbl_users` WHERE email ="$email"';
    $result = mysqli_query($con,$sql);
  // echo mysqli_num_rows($result);
   if (mysqli_num_rows($result)==0) {
    //print true;
$sql ='INSERT INTO `tbl_users`( `username`, `email`, `password`) VALUES ($username,$email,$password)';
$result = mysqli_query($con,$sql);
   } else {
    # code...


    $_SESSION['record'] = "Email already exists";
    header("Location: ../views/auth/register.php ");
   }
   
}else{
    $_SESSION['error'] = "The data is incorrect";
    header("Location: ../views/auth/register.php ");

}
?>
