<?php
include('header.php');
include('classes/courses/class.courses.php');
$offers=new Courses();                  ?>
<!-- <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> -->


<div class="content">
<!-- Button trigger modal -->

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8 m-auto">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Manage Your Courses</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                <form method="post" action="classes/courses/courses.php" enctype="multipart/form-data">
                <!-- <div class="col-md-6"></div> -->
                <div class="row">

                <div class="input-group m-auto mb-3 col-md-8">
                   <div class="input-group-prepend">
                        <span class="input-group-text border">Image</span>
                   </div>
                   <div class="custom-file border">
                    <input type="file" class="custom-file-input" name="img" id="inputGroupFile01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                   </div>
                 </div>
                </div>
                      <div class="col-md-8 m-auto">
                        <div class="form-group">
                          <label class="bmd-label-floating">title</label>
                          <input type="text" name='title' class="form-control"/>                          
                        </div>
                   </div>

                      <div class="col-md-8 m-auto">
                        <div class="">
                          <label class="">subtitle</label>
                          <input type="text" name="subtitle" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-8 m-auto">
                        <div class="form-group">
                          <label class="bmd-label-floating">Topic</label>
                          <textarea name="description" id="" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                      </div>
                      <div class="col-md-8 m-auto">
                        <div div class="form-group">
                        <label for="">Duration</label>
                          <input type="text" name="duration" id="" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-8 m-auto">
                      <div class="form-group">
                        <label for="">Fees</label>
                          <input type="number" name="fees" id="" class="form-control">
                      </div>
                      </div>
                      <div class="col-md-8 m-auto">
                      <div class="form-group">
                        <label for="">Star tTime</label>
                          <input type="time" name="strtTime" id="" class="form-control">
                      </div>
                      </div>
                      <div class="col-md-8 m-auto">
                      <div class="form-group">
                        <label for="">End time</label>
                          <input type="time" name="endTime" id="" class="form-control">
                      </div>
                      </div>
                       <div class="col-md-8 m-auto">
                          <label class="">Category</label>
                          <select name="category" class="form-control border p-2">
                            <option value="graduate">Graduate</option>
                            <option value="postgraduate">Postgraduate</option>
                            <option value="undergraduate">Undergraduate</option>
                          </select>
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
                  <h4 class="card-title text-center">Courses</h4>
                  <p class="card-category text-center"> Here Offers Information</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table text-center" >
                      <thead class=" text-primary">
                        <th>
                          image
                        </th>
                        <th>
                          Title
                        </th>
                        <th>
                          Subtitle
                        </th>
                        <th>
                          Description
                        </th>
                        <th>
                          Duration
                        </th>
                        <th>
                          Fees
                        </th>
                        <th>
                          start Time
                        </th>
                        <th>
                          End Time
                        </th>
                        <th>
                          Category
                        </th>
                        <th>
                            Operations
                        </th>
                      </thead>
                      <tbody>
                      <?php $offers=$offers->fetchall();
   while ($row=mysqli_fetch_array($offers)) {
       ?>
                        <tr>
                            <td>
                          <img src="../assets/img/<?= $row['imgname']; ?>" class='w-25' />

                            </td>
                          <td>
                            <?= $row['title']; ?>
                          </td>
                          <td>
                          <?= $row['subtitle']; ?>
                          </td>
                          <td>
                          <?= $row['Description']; ?>
                          </td>
                          <td>
                          <?= $row['duration']; ?>
                          </td>
                          <td>
                          <?= $row['fees']; ?>
                          </td>
                          <td>
                          <?= $row['strtTime']; ?>
                          </td>
                          <td>
                          <?= $row['endTime']; ?>
                          </td>
                          <td>
                          <?= $row['category']; ?>
                          </td>
                          <td>
                            <a href='courseupdate.php?id=<?= $row['temp']; ?>' class=" btn-round">
                              <span class="material-icons">
                              create
                              </span>
                           </a>
&emsp;
                          <a   href='courseDelete.php?id=<?= $row['temp']; ?>'  class="text-danger btn-round" onclick="return confirm('Are you sure?')">
                              <span class="material-icons">
                              delete_sweep
                              </span>
                          </a>
                            
                            </td>
                        </tr>
   <?php
   }?>
   
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