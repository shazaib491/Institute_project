<?php
include('classes/events/class.events.php');
$deleteEvents=new Events();
$db=new mysqli('localhost','shazaib','mausamash','dashboard');
$id=$_GET['id'];
$dlt="DELETE FROM images WHERE uid=$id";
if(mysqli_query($db,$dlt))
$deleteEvents->deleteEvents($id);


?>