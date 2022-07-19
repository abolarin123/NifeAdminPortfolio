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
   if (mysqli_num_rows($result)>0) {
    //print true;
    $_SESSION['error'] = "Email already in use";
    header("Location: ../views/auth/register.php ");
   
   } else {
    # code...
  
    $sql ="INSERT INTO `tbl_users`( `username`, `email`, `password`) VALUES ('$username', '$email', '$password')";
    $result = mysqli_query($con, $sql);
    $user_id=mysqli_insert_id($con);
   // print $user_id;
    if(isset($user_id)) {
       auth($user_id,$username,$email);
    }

    

   }
   
}else{
    $_SESSION['error'] = "The data is incorrect";
    header("Location: ../views/auth/register.php ");

    } 
    function auth($userID,$Username,$userEmail)
{
  $_SESSION['userid'] = $userID;
  $_SESSION['username']= $username;
  $_SESSION['useremail']= $userEmail;
  $_SESSION['last_login_time']= time();
  header("Location: ../views/pages/dashboard.php ");

}
?>
