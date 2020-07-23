<?php
include "class.terms.php";
$terms = new Terms;

if (isset($_POST['submit'])) {
     // $terms=new Terms;
     $terms->insertTerms($_POST['title'], $_POST['body'], $_POST['price'], $_POST['start-time'], $_FILES['userImage'], $_POST['etime'], $_POST['duration']);
}

if (isset($_POST["action"])) {

     if ($_POST["action"] == "Load") {
          echo $terms->fetchall('SELECT * FROM `short-terms`');
     }
}
if (isset($_POST['update'])) {

     
     $title = $_POST['title'];
     $body = $_POST['body'];
     $price = $_POST['price'];
     $start_time = $_POST['start-time'];
     $end_time = $_POST['etime'];
     $image = $_FILES['userImage']['name'];
     $duration = $_POST['duration'];
     $id = $_POST['id'];
     // $img=$_FILES['img'];
     if (empty($_FILES['userImage']['name'][0])) {
          $terms->updateTerms($id, $title, $body, $price, $start_time, $end_time, $duration);
     } else {
          $terms->updateTermsWithImage($id,$title,$body,$_FILES['userImage'], $price, $start_time, $end_time, $duration);
     }
} 
