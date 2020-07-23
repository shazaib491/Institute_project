<?php
include('header.php');
include('classes/blogs/class.blogs.php');
$blogs = new Blogs();                  ?>
<!-- <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> -->


<div class="content">
  <!-- Button trigger modal -->

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 m-auto">
        <div class="card">
          <!-- <div class="card-header card-header-primary">
                  <h4 class="card-title">Manage Your Blogs</h4>
                  <p class="card-category">Complete your profile</p>
                </div> -->
          <!-- <div class="card-body"> -->
          <!-- <form method="post" action="classes/blogs/blogs.php"  enctype="multipart/form-data"> -->
          <!-- <div class="col-md-6"></div> -->
          <!-- <div class="row">

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
                          <label class="bmd-label-floating">Title</label>
                          <input type="text" name='title' class="form-control">
                          
                        </div>
                      </div>
                      <div class="col-md-8 m-auto">
                        <div class="form-group">
                          <label class="bmd-label-floating">Date</label>
                          <input type="date" name='date' class="form-control">
                          
                        </div>
                      </div>
                      <div class="col-md-8 m-auto">
                        <div class="form-group">
                          <label class="bmd-label-floating">Topic</label>
                      <textarea name="topic" id="" cols="30" rows="5" class="form-control"></textarea>

                        </div>
                      </div>
                      
                      <div class="col-md-8 m-auto">
                        <div class="">
                            <br>
                          <label class="">Description</label>
                      <textarea name="description" id="" cols="30" rows="5" class="form-control"></textarea>
                      </div>
                      </div>
                    </div> 
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary pull-right">
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div> -->
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
      <!-- <div class="content"> -->
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 m-auto">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title text-center">Enquiry </h4>
                  <p class="card-category text-center"> Here Enquiry Information</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table text-center">
                      <thead class=" text-primary">
                        <th>
                          Image
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          Mobile
                        </th>
                        <th>
                          DOB
                        </th>
                        <th>
                          Age
                        </th>
                        <th>
                          State
                        </th>
                        <th>
                          Gender
                        </th>
                        <th>
                          Subject
                        </th>
                        <th>
                          City
                        </th>
                        <th>
                          Pincode
                        </th>
                        <th>
                          Address
                        </th>
                        <th>
                          Operations
                        </th>
                      </thead>
                      <tbody>
                        <?php $blogs = $blogs->fetchFull();
                        while ($row = mysqli_fetch_array($blogs)) {
                        ?>
                          <tr>

                            <td>
                              <img src="../assets/img/<?= $row['image']; ?>" class='w-100' />
                            </td>
                            <td>
                              <?= $row['name']; ?>
                            </td>

                            <td>
                              <?= $row['email']; ?>
                            </td>
                            <td>
                              <?= $row['mobile']; ?>
                            </td>
                            <td>
                              <?= $row['dob']; ?>
                            </td>
                            <td>
                              <?= $row['age']; ?>
                            </td>
                            <td>
                              <?= $row['state']; ?>
                            </td>
                            <td>
                              <?= $row['gender']; ?>
                            </td>
                            <td>
                              <?= $row['subject']; ?>
                            </td>
                            <td>
                              <?= $row['city']; ?>
                            </td>
                            <td>
                              <?= $row['pinocde']; ?>
                            </td>
                            <td>
                              <?= $row['address']; ?>
                            </td>
                            <td>
                              
                              <a href='blogsDelete.php?id=<?= $row['id']; ?>' class="text-danger btn-round" onclick="return confirm('Are you sure?')">
                                <span class="material-icons">
                                  clear
                                </span>
                              </a>

                            </td>
                          </tr>
                        <?php } ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      <!-- </div> -->

      <?php include('footer.php');  ?>