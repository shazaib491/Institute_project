
<?php
// session_start();
if(isset($_SESSION['success'])){?>
    <div class="alert alert-info text-center alert-dismissible fade show" id="success-alert" role="alert">
    <?php echo $_SESSION['success']; ?>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<?php
          }
unset($_SESSION['success']);


if(isset($_SESSION['error'])){?>
    <div class="alert alert-danger text-center alert-dismissible fade show" id="success-alert" role="alert">
    <?php echo $_SESSION['error']; ?>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<?php
          }
unset($_SESSION['error']);
?>
