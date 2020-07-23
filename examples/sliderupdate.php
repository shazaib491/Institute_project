<?php
include('header.php');
include('classes/slider/class.slider.php');
$sliderData=new Slider();
$sql=$sliderData->getbyid($_GET['id']);
$row=mysqli_fetch_assoc($sql);
?>
<div class="content">
<!-- Button trigger modal -->

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8 m-auto">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Manage Your Logo</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                <form  action="classes/slider/slider.php" method="post"  enctype="multipart/form-data">
                <input type="hidden"  name="custId" value="<?= $row['id'];?>">

                <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Content</label>
                          <textarea name='content'  class="form-control"><?= $row['content'];?></textarea>
                          
                        </div>
                   </div>

                      <div class="col-md-8">
                          <label class="">Image</label>
                          <input type="file" name="img"  class="text-primary" >
                      </div>
                    </div> 
                    <input type="submit" name="update" value="update" class="btn btn-primary pull-right">
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
              <!-- <button type="button" class="btn btn-primary btn-round" data-toggle="modal" data-target="#exampleModal">
  Update
</button> -->

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="card-header card-header-primary">
                  <h4 class="card-title">Manage Your Logo</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
      <div class="row">
            <div class="col-md-10 m-auto">
                  <form action="">
                  <label for="">Image Name</label>
                  <input type="text" name="" id="" class="form-control" >
                  <label for="">Image </label>
                  <input type="file" name="" id="" class="form-control" >
                  
                  
            </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div> -->
            </div>
                </div>
<?php
include('footer.php');
?>
