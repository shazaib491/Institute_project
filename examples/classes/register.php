<?php 
session_start();
include 'class.authenticate.php';
$register=new Authenticate();
if(isset($_POST['submit']))
{
    $uname=$_POST['uname'];  
    $email=$_POST['email'];  
    $password=$_POST['password'];  
    $cpassword=$_POST['cpassword'];
    if(empty($uname) && empty($email))
    {
        $_SESSION['detail']="Please fill the Field";
        header('location:../register.php');
    }

    if($password==$cpassword)
    {
        $register->Register($uname,$email,$password,$cpassword);
        $_SESSION['success']="You Account is Registered Login please";
        header('location:../register.php');
    }
    else
    {
        $_SESSION['error']="Password is not matching";
        header('location:../register.php');
    }
}



?>