<?php
include('classes/slider/class.slider.php');
$deleteSlide=new Slider();
$id=$_GET['id'];
$deleteSlide->deleteSlide($id);


?>