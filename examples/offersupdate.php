<?php
include('header.php'); 
include('classes/offers/class.offers.php');
$offers=new Offers(); 
$sql=$offers->getbyid($_GET['id']);
$row=mysqli_fetch_assoc($sql);
?>
<div class="content">
<!-- Button trigger modal -->

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8 m-auto">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Manage Your Offers</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                <form  action="classes/offers/offers.php" method="post"  enctype="multipart/form-data">
                <input type="hidden"  name="id" value="<?= $row['temp'];?>">

                <div class="row">

      
<div class="col-md-8 m-auto">
  <div class="form-group">
    <label class="bmd-label-floating">title</label>
    <input type="text" name='title' value="<?= $row['title']; ?>" class="form-control"/>                          
  </div>
</div>

<div class="col-md-8 m-auto">
  <div class="">
    <label class="">icon</label>
    <input type="text" name="icon" class="form-control" value="<?= $row['icon']; ?>" required>
  </div>
</div>
</div>
<div class="col-md-8 m-auto">
  <div class="">
    <label class="">Description</label>
    <input type="text" name="descrip" class="form-control" value="<?= $row['descrip']; ?>" required>
  </div>
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
