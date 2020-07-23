<?php
include('class.courses.php');
$courses=new Courses();

if(isset($_POST['submit']))
{
    // print_r($_GET);
    $title=$_POST['title'];
    $subtitle=$_POST['subtitle'];
    $description=$_POST['description'];
    $img=$_FILES['img'];
    $temp=time();
    $category=$_POST['category'];
    $duration=$_POST['duration'];
    $fees=$_POST['fees'];
    $strtTime=$_POST['strtTime'];
    $endTime=$_POST['endTime'];
    // $stime=date($strtTime);
    $strtTime = date('h:i A', strtotime($_POST['strtTime']));
    $endTime = date('h:i A', strtotime($_POST['endTime']));
    // $slider->uploadFile($_FILES['img']);
    $courses->InsertCourses($title,$subtitle,$description,$temp,$category,$img,$duration,$fees,$strtTime,$endTime);
}
else
    if(isset($_POST['update']))
    {
        
        $title=$_POST['title'];
        $subtitle=$_POST['subtitle'];
        $description=$_POST['description'];
        $category=$_POST['category'];
        $duration=$_POST['duration'];
        $fees=$_POST['fees'];
        $strtTime=$_POST['strtTime'];
        $endTime=$_POST['endTime'];
        $img=$_FILES['img'];
        $id=$_POST['id'];
        if (empty($_FILES['img']['name'][0])) { 
            $courses->updateCourses($id,$title,$subtitle,$description,$category,$duration,$fees,$strtTime,$endTime);
        }
         else{
            $courses->updateCoursesWithImages($id,$title,$subtitle,$description,$category,$img,$duration,$fees,$strtTime,$endTime);
            }
    }
?>