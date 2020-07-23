<?php include "header.php";
?>
<style>
    .alert-success {
        background-color: #55b559;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container  ">
    <h2 class="text-center">
        Enter Short Terms courses
    </h2>

    <form id="uploadForm" action="classes/short-terms/terms.php" enctype="multipart/form-data" method="post">
        <!-- <div id="targetLayer"  ></div> -->
        <div class="alert alert-success" id="targetLayer">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                      <b> Success - </b> This is a regular notification made with ".alert-success"</span>
                  </div>
                  
        <input type="hidden" name="submit" >
        <div class="row bg-light p-5">
            <div class="form-group col-md-6">
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title">
            </div>
            <div class="form-group col-md-6">
                <input type="text" name="body" id="body" class="form-control" placeholder="Enter body">
            </div>
            <div class="form-group col-md-6">
                <input type="text" name="price" id="price" class="form-control" placeholder="Enter price">
            </div>
            <div class="form-group col-md-6">
                <input type="time" name="start-time" id="start-time" class="form-control" placeholder="Enter Morning  batch">
            </div>
            <div class="form-group col-md-6">
                <input type="time" name="etime" id="etime" class="form-control" placeholder="Enter Evening batch">
            </div>
            <div class="form-group col-md-6">
                <input type="number" name="duration" id="duration" class="form-control" placeholder="Enter duration">
            </div>
            <div class="col-md-8">
                <label class="">Image</label>
                <input name="userImage" type="file" class="inputFile" />
            </div>
        </div>
        <div class="col-md-6  m-auto ">
            <input type="submit" value="Submit" class="btnSubmit   btn  btn-success btn-block " /> </div>

</div>
</form>
</div>
<div id="user_table" class="table-responsive">
</div>

<script>

    document.getElementById("targetLayer").style.visibility = "hidden";
</script>
<script type="text/javascript">
    // $(document).ready(function(){
           load_data();
           function load_data()  
           {  
                var action = "Load";  
                $.ajax({  
                     url:"classes/short-terms/terms.php",  
                     method:"POST",  
                     data:{action:action},  
                     success:function(data)  
                     {  
                         
                          $('#user_table').html(data);  
                     }  
                });  
           }  
    //   });  

// update


    $(document).ready(function(e) {
        $("#uploadForm").on('submit', (function(e) {
            e.preventDefault();
            $.ajax({
                url: "classes/short-terms/terms.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                enctype:"multipart/form-data",
                success: function(data) {
                    // console.log(data);
                    // $("#targetLayer").html(data);
                    document.getElementById("targetLayer").style.visibility = "visible";
                    document.getElementById('targetLayer').innerHTML = data;
                },
                error: function() {

                    alert('galat he kuch');
                }
            });
        }));
    });

</script>
<?php include "footer.php"; ?>