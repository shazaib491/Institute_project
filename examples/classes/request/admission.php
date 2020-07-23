<?php
include('class.admission.php');
$admission=new Admission();

if(isset($_POST['submit']))
{
    print_r($_POST);    
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $application=$_POST['application'];
    // $slider->uploadFile($_FILES['img']);
    $admission->InsertApplication($fname,$lname,$email,$mobile,$application);

}



?>