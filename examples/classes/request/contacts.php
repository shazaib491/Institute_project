<?php
include('class.contacts.php');
$contacts=new Contacts();

if(isset($_POST['submit']))
{
    
    $msg=$_POST['message'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $course=$_POST['course'];
    // $slider->uploadFile($_FILES['img']);
    $contacts->InsertContacts($msg,$name,$email,$mobile,$course);

}



?>