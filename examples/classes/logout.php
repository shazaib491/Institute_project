<?php
include('class.authenticate.php');
session_start();
$logout=new Authenticate();
$logout->logout();
?>