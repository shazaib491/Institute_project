<?php
include('class.blogs.php');
$blogs=new Blogs();

if(isset($_POST['submit']))
{
    $img=$_FILES['img'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    $date=$_POST['date'];
    $topic=$_POST['topic'];
    // $slider->uploadFile($_FILES['img']);
    $blogs->InsertBlogs($img,$title,$description,$date,$topic);

}
else
    if(isset($_POST['update']))
    {
        
    $img=$_FILES['img'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    $date=$_POST['date'];
    $topic=$_POST['topic'];
        $id=$_POST['id'];
    // $img=$_FILES['img'];
         if (empty($_FILES['img']['name'][0])) { 
            $blogs->updateBlogsText($id,$title,$description,$date,$topic);
        }else{
            $blogs->updateBlogs($id,$img,$title,$description,$date,$topic);
            }
        }
else
{
    echo "No request is coming";
}


?>