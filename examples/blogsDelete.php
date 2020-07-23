<?php
include('classes/blogs/class.blogs.php');
$deleteBlogs=new Blogs();
$id=$_GET['id'];
$deleteBlogs->deleteBlogs($id);


?>