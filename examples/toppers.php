<?php
include('header.php'); 
include('classes/toppers/class.toppers.php');
$top=new Toppers();                  ?>
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
                          <input type="text" name='name' class="form-control"/>                          
                        </div>
                   </div>

                      <div class="col-md-8 m-auto">
                        <div class="form-group">
                          <label class="">year</label>
                          <input type="text" name="year" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-8 m-auto">
                    <div class="form-group">
                        <label for="">Rank</label>
                        <input type="text" name="rank" id="" class="form-control">
                    </div>
                    </div>
                    <div class="col-md-8 m-auto">
                    <div class="form-group">
                        <label for="">Division</label>
                        <input type="text" name="division" id="" class="form-control">
                    </div>
                    </div>
                    <div class="col-md-8 m-auto">
                    <div class="form-group">
                        <label for="">Percent</label>
                        <input type="text" name="percent" id="" class="form-control">
                    </div>
                    </div>
                    <div class="col-md-8 m-auto">
                    <div class="form-group">
                        <label for="">Subject</label>
                        <input type="text" name="subject" id="" class="form-control">
                    </div>
                    </div>
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary pull-right">
                    <br>
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
                  <h4 class="card-title text-center">Toppers</h4>
                  <p class="card-category text-center"> Here Toppers Information</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table text-center" >
                      <thead class=" text-primary">
                        <th>
                          image
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          Year
                        </th>
                        <th>
                          Division
                        </th>
                        <th>
                          Rank
                        </th>
                        <th>
                          Percent
                        </th>
                        <th>
                         Subject
                        </th>
                        <th>
                            Operations
                        </th>
                      </thead>
                      <tbody>
                      <?php $top=$top->fetchall();
   while($row=mysqli_fetch_array($top)){
?>
                        <tr>
                            <td>
                          <img src="../assets/img/<?= $row['image']; ?>" class='w-25 rounded-circle' />

                            </td>
                          <td>
                            <?= $row['name'];?>
                          </td>
                          <td>
                          <?= $row['year'];?>
                          </td>
                          <td>
                          <?= $row['division'];?>
                          </td>
                          <td>
                          <?= $row['rank'];?>
                          </td>
                          <td>
                          <?= $row['percent'];?>
                          </td>
                          <td>
                          <?= $row['subject'];?>
                          </td>
                          <td>
                            <a href='toppersupdate.php?id=<?= $row['temp'];?>' class=" btn-round">
                              <span class="material-icons">
                              create
                              </span>
                           </a>
&emsp;
                          <a   href='toppersDelete.php?id=<?= $row['temp'];?>'  class="text-danger btn-round" onclick="return confirm('Are you sure?')">
                              <span class="material-icons">
                              delete_sweep
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