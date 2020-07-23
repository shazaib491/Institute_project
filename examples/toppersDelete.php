<?php
include('classes/toppers/class.toppers.php');
$topper=new Toppers;
$id=$_GET['id'];
$topper->deleteToppers($id);


?>