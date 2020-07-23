<?php include"header.php";
include"classes/short-terms/class.terms.php";
$terms=new Terms;
$id=$_GET['id'];
$select=$terms->getbyid($id);
$row=mysqli_fetch_array($select);


?>
<div class="container  ">
    <h2 class="text-center">
        Update Short Terms courses
    </h2>

    <form id="uploadForm" action="classes/short-terms/terms.php" enctype="multipart/form-data" method="post">
        <!-- <div id="targetLayer"  ></div> -->
        
                  
        <input type="hidden" name="id" value="<?= $id; ?>">
        <div class="row bg-light p-5">
            <div class="form-group col-md-6">
                <input type="text" name="title" id="title" value="<?= $row['title']; ?>" class="form-control" placeholder="Enter Title">
            </div>
            <div class="form-group col-md-6">
                <input type="text" name="body" id="body" class="form-control" value="<?= $row['body']; ?>" placeholder="Enter body">
            </div>
            <div class="form-group col-md-6">
                <input type="text" name="price" id="price" class="form-control" value="<?= $row['price']; ?>" placeholder="Enter price">
            </div>
            <div class="form-group col-md-6">
                <input type="time" name="start-time" id="start-time" class="form-control" value="<?= $row['start_time']; ?>" placeholder="Enter Morning  batch">
            </div>
            <div class="form-group col-md-6">
                <input type="time" name="etime" id="etime" class="form-control" value="<?= $row['end_time']; ?>" placeholder="Enter Evening batch">
            </div>
            <div class="form-group col-md-6">
                <input type="number" name="duration" id="duration" class="form-control" value="<?= $row['duration'] ?>" placeholder="Enter duration">
            </div>
            <div class="col-md-8">
                <label class="">Image</label>
                <input name="userImage" type="file" class="inputFile" />
            </div>
        </div>
        <div class="col-md-6  m-auto ">
            <input type="submit" value="Submit" name="update" class="btnSubmit   btn  btn-success btn-block " /> </div>

</div>
</form>
</div>
<?php include"footer.php"; ?>