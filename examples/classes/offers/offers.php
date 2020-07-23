<?php
include('class.offers.php');
$offers=new Offers();

if(isset($_POST['submit']))
{
    $title=$_POST['title'];
    $icon=$_POST['icon'];
    $descrip=$_POST['descrip'];
    $temp=time();
    // $slider->uploadFile($_FILES['img']);
    $offers->InsertOffers($title,$icon,$descrip,$temp);
}
else
    if(isset($_POST['update']))
    {
        
    $title=$_POST['title'];
    $icon=$_POST['icon'];
    $descrip=$_POST['descrip'];
    $id=$_POST['id'];
    // echo $id;
        $offers->updateSlide($id,$title,$icon,$descrip);
    }
else
{
    echo "No request is coming";
}


?>