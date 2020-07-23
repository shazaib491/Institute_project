<?php
include('classes/news/class.news.php');
$deleteNews=new News();
$id=$_GET['id'];
$deleteNews->deleteNews($id);


?>