<?php
include "./header.php";
$id=$_GET['id'];
// echo $id;
$db=new mysqli('localhost','shazaib','mausamash','dashboard');
$sql = "SELECT events.id, images.file_name
                                    FROM events
                                    
                                    RIGHT JOIN images ON events.id = images.uid
                                    WHERE 
                                    events.id='$id'";
$query=mysqli_query($db,$sql);
foreach ($query as $que) {
    // echo $que['file_name']; ?>
<div class="container d-inline ">
            <img src="../assets/img/<?= $que['file_name'];?>" class="img-responsive card-img-top border img-thumbnail w-25" style="height:200px" alt="">
        
</div>
<?php
}?>
<br>
<br>
<a href="events.php" class="btn btn-primary">Go Back</a>


<?php
include "./footer.php";

?>