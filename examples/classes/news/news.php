<?php
include('class.news.php');
$news=new News();

if(isset($_POST['submit']))
{
    $head=$_POST['head'];
    $img=$_FILES['img'];
    $detail=$_POST['detail'];
    // $slider->uploadFile($_FILES['img']);
    $news->InsertNews($head,$img,$detail);

}
else
    if(isset($_POST['update']))
    {
        
        $head=$_POST['head'];
        $detail=$_POST['detail'];
        $id=$_POST['id'];
    // $img=$_FILES['img'];
         if (empty($_FILES['img']['name'][0])) { 
            $news->updateNewsText($id,$head,$detail);
        }else{
            $news->updateNews($id,$head,$_FILES['img'],$detail);
            }
        }
else
{
    echo "No request is coming";
}


?>