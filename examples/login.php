<?php
session_start();
error_reporting(0);
if($_SESSION['userId'])
{
  header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Material Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>
<body>
<div class="content" style="margin-top:100px;">
        <div class="container-fluid">
          <div class="row" >
            <div class="col-md-8 m-auto">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title text-center">Login Your Account</h4>
                  <p class="card-category text-center">Enter Email And Password</p>
                </div>
                <div class="card-body">
                  <form method="post" action="classes/login.php">
                  <?php if(isset($_SESSION['alert'])){?>
                <div class="alert alert-info text-center alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['alert']; ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
     <?php          }
     unset($_SESSION['alert']);
?>
                  <?php if(isset($_SESSION['error'])){?>
                <div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['error']; ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
     <?php          }
     unset($_SESSION['error']);
?>
                    <div class="row">
                      <div class="col-md-8 m-auto">
                        <div class="form-group ">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="email" name="email" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-8 m-auto">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" name="password" class="form-control">
                        </div>
                      </div>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary mx-auto d-block" value="submit">
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>






<?php include"footer.php"; ?>