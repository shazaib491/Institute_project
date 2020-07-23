<?php
include('classes/courses/class.courses.php');
$deleteCourses=new Courses();
$id=$_GET['id'];
$deleteCourses->deleteCourses($id);


?>