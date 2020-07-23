<?php
include('class.toppers.php');
$toppers=new Toppers();

if(isset($_POST['submit']))
{

    $year=$_POST['year'];
    $image=$_FILES['image'];
    $name=$_POST['name'];
    $rank=$_POST['rank'];
    $percent=$_POST['percent'];
    $subject=$_POST['subject'];
    $division=$_POST['division'];
    $temp=time();    // $slider->uploadFile($_FILES['img']);
    $toppers->InsertLists($year,$image,$name,$rank,$percent,$subject,$temp,$division);
}
else
    if(isset($_POST['update']))
    {
        
        $year=$_POST['year'];
    $image=$_FILES['image'];
    $name=$_POST['name'];
    $rank=$_POST['rank'];
    $percent=$_POST['percent'];
    $subject=$_POST['subject'];
    $division=$_POST['division'];

        $id=$_POST['id'];
        if (empty($_FILES['image']['name'][0])) { 
            $toppers->updateToppersText($id,$year,$name,$rank,$percent,$subject,$division);
        }
         else{
            $toppers->updateToppers($id,$year,$image,$name,$rank,$percent,$subject,$division);
            }
    }
?>