<?php
include('header.php'); 
include('classes/toppers/class.toppers.php');
$top=new Toppers;
$sql=$top->getbyid($_GET['id']);
$row=mysqli_fetch_assoc($sql);
?>


<!-- <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> -->


<div class="content">
<!-- Button trigger modal -->

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8 m-auto">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Manage Your Lists</h4>
                  <p class="card-category">Student Results</p>
                </div>
                <div class="card-body">
                <form method="post" action="classes/toppers/toppers.php" enctype="multipart/form-data">
                <!-- <div class="col-md-6"></div> -->
                <input type="hidden"  name="id" value="<?= $row['temp'];?>">
                <br>

                <div class="row">
                <div class="input-group m-auto mb-3 col-md-8">
                   <div class="input-group-prepend">
                        <span class="input-group-text border">Image</span>
                   </div>
                   <div class="custom-file border"> 
                    <input type="file" class="custom-file-input" name="image" id="inputGroupFile01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                   </div>
                 </div>
                </div>
                      <div class="col-md-8 m-auto">
                        <div class="form-group">
                          <label class="bmd-label-floating">name</label>
                          <input type="text" name='name' class="form-control mt-5" value="<?= $row['name'];?>"/>                          
                        </div>
                   </div>

                      <div class="col-md-8 m-auto">
                        <div class="form-group">
                          <label class="">year</label>
                          <input type="text" name="year" class="form-control" value="<?= $row['year'];?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-8 m-auto">
                    <div class="form-group">
                        <label for="">Rank</label>
                        <input type="text" name="rank" id="" class="form-control" value="<?= $row['rank'];?>">
                    </div>
                    </div>
                    <div class="col-md-8 m-auto">
                    <div class="form-group">
                        <label for="">Division</label>
                        <input type="text" name="division" id="" class="form-control" value="<?= $row['division'];?>">
                    </div>
                    </div>
                    <div class="col-md-8 m-auto">
                    <div class="form-group">
                        <label for="">Percent</label>
                        <input type="text" name="percent" id="" class="form-control" value="<?= $row['percent'];?>">
                    </div>
                    </div>
                    <div class="col-md-8 m-auto">
                    <div class="form-group">
                        <label for="">Subject</label>
                        <input type="text" name="subject" value="<?= $row['subject'];?>" id="" class="form-control">
                    </div>
                    </div>
                    <input type="submit" name="update" value="update" class="btn btn-primary pull-right">
                    <br>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>

<?php include('footer.php');  ?>