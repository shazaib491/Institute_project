<?php
include('header.php'); 
include('classes/courses/class.courses.php');
$courses=new Courses(); 
$sql=$courses->getbyid($_GET['id']);
$row=mysqli_fetch_assoc($sql);
?>
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
                <form  action="classes/courses/courses.php" method="post"  enctype="multipart/form-data">
                <input type="hidden"  name="id" value="<?= $row['temp'];?>">

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
    <input type="text" name='title' value="<?= $row['title']; ?>" class="form-control"/>                          
  </div>
</div>

<div class="col-md-8 m-auto">
  <div class="">
    <label class="">Subtitle</label>
    <input type="text" name="subtitle" class="form-control" value="<?= $row['subtitle']; ?>" required>
  </div>
</div>
</div>
<div class="col-md-8 m-auto">
                        <div class="form-group">
                          <label class="bmd-label-floating">Topic</label>
                      <textarea name="description" id="" cols="30" rows="5" class="form-control"><?= $row['Description']; ?></textarea>

                        </div>
                      </div>
                      <div class="col-md-8 m-auto">
                        <div div class="form-group">
                        <label for="">Duration</label>
                          <input type="text" name="duration" id="" value="<?= $row['duration'];?>" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-8 m-auto">
                      <div class="form-group">
                        <label for="">Fees</label>
                          <input type="number" name="fees" id="" value="<?= $row['fees'];?>" class="form-control">
                      </div>
                      </div>
                      <div class="col-md-8 m-auto">
                      <div class="form-group">
 
                        <label for="">StartTime</label>
                          <input type="text" name="strtTime" value="<?= $row['strtTime']; ?>" id="" class="form-control">
                      </div>
                      </div>
                      <div class="col-md-8 m-auto">
                      <div class="form-group">
                        <label for="">End time</label>
                          <input type="text" name="endTime" value="<?= $row['endTime'];?>" id="" class="form-control">
                      </div>
                      </div>
<div class="col-md-8 m-auto">
                        <div class="">
                          <label class="">Category</label>
                          <select name="category" class="form-control ">
                          <option value="<?= $row['category']; ?>"><?php echo $row['category']; ?></option>
                            <option value="graduate">Graduate</option>
                            <option value="postgraduate">Postgraduate</option>
                            <option value="undergraduate">Undergraduate</option>
                          </select>
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
