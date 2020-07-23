<?php
include('class.slider.php');
$slider=new Slider();

if(isset($_POST['submit']))
{
    $content=mysqli_real_escape_string($_POST['content']);
    $img=$_FILES['img'];
        $slider->InsertSlide($content,$img);

}
else
    if(isset($_POST['update']))
    {
        
        $id=$_POST['custId'];
    $content=$_POST['content'];
    // $img=$_FILES['img'];
    if (empty($_FILES['img']['name'][0])) { 
        $slider->updateSlideText($id,$content);
    }else{
        $slider->updateSlide($id,$content,$_FILES['img']);
    }
    }
else
{
    echo "No request is coming";
}


?>