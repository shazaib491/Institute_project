<?php include'header.php';
include('classes/request/class.contacts.php');
$contacts=new Contacts(); 
?>
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 m-auto">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title text-center">Contacts </h4>
                  <p class="card-category text-center"> Here Conatcs Information</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table text-center" >
                      <thead class=" text-primary">
                        <th>
                          Message
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
                         Course
                        </th>
                        <th>
                         Date
                        </th>
                      </thead>
                      <tbody>
                      <?php $contacts=$contacts->fetchall();
   while($row=mysqli_fetch_array($contacts)){
?>
                        <tr>
                            
                        
                          <td>
                            <?= $row['message'];?>
                          </td>
                          
                          <td>
                            <?= $row['name'];?>
                          </td>
                          <td>
                            <?= $row['email'];?>
                          </td>
                          <td>
                            <?= $row['mobile'];?>
                          </td>
                          <td>
                            <?= $row['course'];?>
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