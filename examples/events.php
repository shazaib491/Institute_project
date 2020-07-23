<?php
include('header.php');
include('classes/events/class.events.php');
$events = new Events();                  ?>
<!-- <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>

<div class="content">
  <!-- Button trigger modal -->
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
            <div id="result" class="alert alert-danger text-center alert-dismissible fade show"></div>
            <form id="form_data" enctype="multipart/form-data">
              <!-- <div class="col-md-6"></div> -->
              <div class="row">

                <div class="text-center mx-auto d-block">
                  <input type="file" id="image" class="" name="files[]" multiple="multiple">
                </div>
                <div class="col-md-8 m-auto">
                  <div class="form-group">
                    <label class="bmd-label-floating">Heading</label>
                    <input type="text" id="head" name='head' class="form-control" />
                  </div>
                </div>

                <div class="col-md-8 m-auto">
                  <div class="">
                    <label class="">Held date</label>
                    <input type="date" name="hdate" id="hdate" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="col-md-8 m-auto">
                <div class="">
                  <label class="">Held Time</label>
                  <input type="time" name="htime" id="htime" class="form-control" required>
                </div>
              </div>
              <div class="col-md-8 m-auto">
                <div class="">
                  <label class="">Held Place</label>
                  <input type="text" name="hplace" id="hplace" class="form-control" required>
                </div>
              </div>
              <div class="col-md-8 m-auto">
                <div class="">
                  <label class="">Detail</label>
                  <textarea name="detail" id="detail" class="form-control" required></textarea>
                </div>
              </div>

              <input type="submit" name="submit" value="Submit" class="btn btn-primary pull-right">
              <div class="clearfix"></div>
            </form>
          </div>
        </div>

      </div>
    </div>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 m-auto">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title text-center">Events</h4>
                <p class="card-category text-center"> Here Events Information</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table text-center">
                    <thead class=" text-primary">
                      <th>
                        Image
                      </th>
                      <th>
                        Heading
                      </th>
                      <th>
                        Held Date
                      </th>
                      <th>
                        Held Time
                      </th>
                      <th>
                        Held Place
                      </th>
                      <th>
                        Detail
                      </th>
                      <th>
                        Operations
                      </th>
                    </thead>
                    <tbody>
                      <?php $events = $events->fetchall();
                      while ($row = mysqli_fetch_array($events)) {
                      ?>
                        <tr>
                          <td><a href="images.php?id=<?=$row['id']; ?>" ><i class="fa fa-picture-o" aria-hidden="true"></i>
</a> </td>
                        
                          <td>
                            <?= $row['heading']; ?>
                          </td>
                          <td>
                            <?= $row['hdate']; ?>
                          </td>
                          <td>
                            <?= $row['htime']; ?>
                          </td>
                          <td>
                            <?= $row['hplace']; ?>
                          </td>
                          <td>
                            <?= $row['detail']; ?>
                          </td>
                          <td>
                            <a href='eventsUpdate.php?id=<?= $row['id']; ?>' class=" btn-round">
                              <span class="material-icons">
                                create
                              </span>
                            </a>
                            &emsp;
                            <a href='eventsDelete.php?id=<?= $row['id']; ?>' class="text-danger btn-round" onclick="return confirm('Are you sure?')">
                              <span class="material-icons">
                                delete_sweep
                              </span>
                            </a>

                          </td>
                        </t>
                      <?php } ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <script>
      document.getElementById('result').style.display="none";
      $(document).ready(function() {
        $('#image').on('change', function() {
          var filename = $(this).val();
        });
        $('#form_data').submit(function(e) {
          e.preventDefault();
          $.ajax({
            url: "classes/events/events.php",
            method: "POST",
            processData: false,
            contentType: false,
            cache: false,
            data: new FormData(this),
            success: function(response) {
      document.getElementById('result').style.display="block";
              $('#result').html(response);
              // load_images()
              // $('.custom-file-label').html("choosefile name");
              // $('#name').html("");
            }
          })
        })
      })
    </script>
<script>
  function setEventId(event_id){
    document.querySelector("#event_id").innerHTML = event_id;
}
</script>

    <?php include('footer.php');  ?>