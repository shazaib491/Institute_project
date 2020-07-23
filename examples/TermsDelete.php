<?php 
include'classes/short-terms/class.terms.php';
$terms=new Terms;
$obj=$terms->deleteTerms($_GET['id']);
?>