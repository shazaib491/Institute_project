<?php
include('classes/offers/class.offers.php');
$deleteOffers=new Offers();
$id=$_GET['id'];
$deleteOffers->deleteOffers($id);


?>