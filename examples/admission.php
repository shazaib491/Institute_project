<?php include'header.php';
include('classes/request/class.admission.php');
$admission=new Admission(); 
?>
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 m-auto">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title text-center">Admission </h4>
                  <p class="card-category text-center"> Here Admission Information</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table text-center" >
                      <thead class=" text-primary">
                        <th>
                          Fname
                        </th>
                        <th>
                          Lname
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          Mobile
                        </th>
                        <th>
                         Application
                        </th>
                        <th>
                         Date
                        </th>
                      </thead>
                      <tbody>
                      <?php $admission=$admission->fetchall();
   while($row=mysqli_fetch_array($admission)){
?>
                        <tr>
                            
                        
                          <td>
                            <?= $row['fname'];?>
                          </td>
                          
                          <td>
                            <?= $row['lname'];?>
                          </td>
                          <td>
                            <?= $row['email'];?>
                          </td>
                          <td>
                            <?= $row['mobile'];?>
                          </td>
                          <td>
                            <?= $row['application'];?>
                          </td>
                          <td>
                            <?= $row['date'];?>
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
<?php include'footer.php'; ?>