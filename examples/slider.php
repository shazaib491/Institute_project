<?php
include('header.php'); 
include('classes/slider/class.slider.php');

$slider=new Slider();                  ?>
<!-- <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> -->


<div class="content">
<!-- Button trigger modal -->

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8 m-auto">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Manage Your Slides</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                <form method="post" action="classes/slider/slider.php" enctype="multipart/form-data">
                <!-- <div class="col-md-6"></div> -->
                <div class="row">

      
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Content</label>
                          <textarea name='content'  id="editor1" rows="10" cols="80  class="form-control"></textarea>
                          
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
              <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

              <script type="text/javascript">
                
                CKEDITOR.editorConfig = function (config) {
    config.language = 'en';
    config.uiColor = '#F7B42C';
    config.height = 300;
    config.toolbarCanCollapse = true;

};
CKEDITOR.replace('editor1');
              </script>
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
                  <h4 class="card-title text-center">Slider </h4>
                  <p class="card-category text-center"> Here Slider Information</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table text-center" >
                      <thead class=" text-primary">
                        <th>
                          Content
                        </th>
                        <th>
                          Image
                        </th>
                        <th>
                            Operations
                        </th>
                      </thead>
                      <tbody>
                      <?php $slide=$slider->fetchall();
   while($row=mysqli_fetch_array($slide)){
?>
                        <tr>
                            
                          <td>
                            <?= $row['content'];?>
                          </td>
                          <td>
                          <img src="../assets/img/<?= $row['imgname']; ?>" class='w-25' />
                          </td>
                          <td>
                            <a href='sliderupdate.php?id=<?= $row['id'];?>' class=" btn-round">
                              <span class="material-icons">
                              create
                              </span>
                           </a>
&emsp;
                          <a   href='sliderDelete.php?id=<?= $row['id'];?>'  class="text-danger btn-round" onclick="return confirm('Are you sure?')">
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