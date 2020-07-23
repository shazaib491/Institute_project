<?php
include('classes/logo/class.logo.php');

include('header.php');
$logo=new LogoMaker();                  
?>

<div class="content">
<!-- Button trigger modal -->

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Manage Your Logo</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                <form method="post" action="classes/logo/logo.php" enctype="multipart/form-data">
            <?php include('session/session.php'); ?>
                <div class="row">
                    
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Logo Name</label>
                          <input type="text"  name='imgnm' class="form-control" required>
                        </div>
                   </div>

                      <div class="col-md-8">
                        <div class="">
                          <label class="">Image</label>
                          <input type="file" name="img" class="text-primary" required>
                        </div>
                      </div>
                    </div> 
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary pull-right">
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
<?php $sql=$logo->fetchall();
   while($row=mysqli_fetch_array($sql)){
?>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="javascript:;">
                  <img src="../assets/img/<?= $row['img']; ?>"  >

                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">Your Website Name</h6>
                  <h4 class="card-title"><?=$row['img_name']; ?></h4>
                  <p class="card-description">
                  
                  </p>
                  <a href="javascript:;" class="btn btn-primary btn-round">Update</a>
                </div>
              </div>
            </div>
   
          </div>
        </div>
      </div>
      <?php }?>
      
           
            
                
<?php include('footer.php'); ?>