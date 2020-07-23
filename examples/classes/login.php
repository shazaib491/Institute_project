<?php 
session_start();
include 'class.authenticate.php';
$login=new Authenticate();
if(isset($_POST['submit']))
{
    $email=$_POST['email'];  
    $password=$_POST['password'];    
    $login->login($email,$password);
}   
    else
    {
        $_SESSION['error']="Please Fill Right Information";
        header('location:../login.php');
    }




?>