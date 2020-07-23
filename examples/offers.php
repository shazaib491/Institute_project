<?php
include('header.php'); 
include('classes/offers/class.offers.php');
$offers=new Offers();                  ?>
<!-- <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> -->


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
                <form method="post" action="classes/offers/offers.php">
                <!-- <div class="col-md-6"></div> -->
                <div class="row">

      
                      <div class="col-md-8 m-auto">
                        <div class="form-group">
                          <label class="bmd-label-floating">title</label>
                          <input type="text" name='title' class="form-control"/>                          
                        </div>
                   </div>

                      <div class="col-md-8 m-auto">
                        <div class="">
                          <label class="">icon</label>
                          <input type="text" name="icon" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-8 m-auto">
                        <div class="">
                          <label class="">Description</label>
                          <input type="text" name="descrip" class="form-control" required>
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
                </div>
            <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 m-auto">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title text-center">Offers </h4>
                  <p class="card-category text-center"> Here Offers Information</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table text-center" >
                      <thead class=" text-primary">
                        <th>
                          Title
                        </th>
                        <th>
                          Icon
                        </th>
                        <th>
                          Description
                        </th>
                        <th>
                            Operations
                        </th>
                      </thead>
                      <tbody>
                      <?php $offers=$offers->fetchall();
   while($row=mysqli_fetch_array($offers)){
?>
                        <tr>
                            
                          <td>
                            <?= $row['title'];?>
                          </td>
                          <td>
                          <?= $row['icon'];?>
                          </td>
                          <td>
                          <?= $row['descrip'];?>
                          </td>
                          <td>
                            <a href='offersupdate.php?id=<?= $row['temp'];?>' class=" btn-round">
                              <span class="material-icons">
                              create
                              </span>
                           </a>
&emsp;
                          <a   href='offersDelete.php?id=<?= $row['temp'];?>'  class="text-danger btn-round" onclick="return confirm('Are you sure?')">
                              <span class="material-icons">
                              clear
                              </span>
                          </a>
                            
                            </td>
                        </tr>
   <?php }?>
   
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          
          </div>
        </div>
      </div>

<?php include('footer.php');  ?>