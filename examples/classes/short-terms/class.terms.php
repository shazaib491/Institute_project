<?php
class Terms
{
    public $con;

    public function __construct()
    {
        $this->con = new mysqli('localhost', 'shazaib', 'mausamash', 'dashboard');
    }
    public function insertTerms($title, $body, $price, $start_time, $image, $end_time, $duration)
    {
        move_uploaded_file($image['tmp_name'], '../../../assets/img/' . time() . $image['name']);
        $im = time() . $image['name'];
        date_default_timezone_set('Asia/Kolkata');
        $startat = Date("Y/m/d", time());

        $updateat = Date("Y/m/d", time());
        $sql = "INSERT INTO `short-terms`( `title`, `body`, `price`, `start_time`, `image`, `end_time`, `start_at`, `update_at`, `duration`) VALUES ('$title','$body','$price','$start_time','$im','$end_time','$startat','$updateat','$duration')";
        if ($this->con->query($sql) == true) {
            session_start();
            // $_SESSION['success'] = "Record Uploaded Successfully";
?>
            <div class="alert-success">Record Uploaded Successfully</div><?php
                                                                            // header('location:../../short-terms.php');
                                                                        } else {
                                                                            session_start();
                                                                            echo mysqli_error($this->con);
                                                                            exit;

                                                                            $_SESSION['error'] = "Record Not  Uploaded Successfully";
                                                                            header('location:../../short-terms.php');
                                                                        }
                                                                    }
                                                                    public function execute_query($query)
                                                                    {
                                                                        return mysqli_query($this->con, $query);
                                                                    }
                                                                    public function getAll()
                                                                    {
                                                                        $query = "SELECT * FROM `short-terms`";
                                                                        $res =mysqli_query($this->con,$query);
                                                                        return $res;
                                                                    }
                                                                    public function fetchall($query)
                                                                    {
                                                                        // echo "<script> printf('Error: %s\n', mysqli_error($this->con));</script>";
                                                                        // $sql = "SELECT * FROM  short-terms";
                                                                        $res = mysqli_query($this->con, $query) or die("Error: " . mysqli_error($this->con));

                                                                        // $result = $this->execute_query($query);
                                                                        $output = '';
                                                                        $output .= '  
           <table class="table table-bordered table-striped">  
                <tr>  
                     <th width="10%">Image</th>  
                     <th width="35%">title</th>  
                     <th width="35%">body </th>  
                     <th width="10%">price</th>  
                     <th width="10%">start time</th>  
                     <th width="10%">End time</th>  
                     <th width="10%">Duration</th>  
                     <th width="10%">Update</th>  
                     <th width="10%">Delete</th>  
                </tr>  
           ';
                                                                        while ($row = mysqli_fetch_array($res)) {

                                                                            $output .= '  
                <tr>       
                     <td><img src="../assets/img/' . $row['image'] . '" class="img-thumbnail" width="50" height="35" /></td>  
                     <td>' . $row['title'] . '</td>  
                     <td>' . $row['body'] . '</td>  
                     <td>' . $row['price'] . '</td>  
                     <td>' . $row['start_time'] . '</td>  
                     <td>' . $row['end_time'] . '</td>  
                     <td>' . $row['duration'] . '</td>  
                     <td><a href="TermsUpdate.php?id=' . $row['id'] . '" id="' . $row['id'] . '" class="btn btn-success btn-xs update">Update</a></td>  
                     <td><a href="TermsDelete.php?id=' . $row['id'] . '" id="' . $row['id'] . '" class="btn btn-danger btn-xs delete">Delete</a></td>  
                </tr>  
                ';
                                                                        }
                                                                        $output .= '</table>';
                                                                        return $output;
                                                                        echo "hello world";
                                                                    }



                                                                    public function getbyid($id)
                                                                    {

                                                                        $sql = "SELECT * FROM `short-terms` WHERE id=$id";
                                                                        $res = $this->con->query($sql);
                                                                        return $res;
                                                                    }
                                                                    public function updateTermsWithImage($id, $title, $body, $image, $price, $start_time, $end_time, $duration)
                                                                    {
                                                                        $updateat = Date("Y/m/d", time());
                                                                        $sata = time() . $image['name'];
                                                                        move_uploaded_file($image['tmp_name'], '../../../assets/img/' . time() . $image['name']);
                                                                        $sql = "UPDATE `short-terms` SET title='$title',body='$body',image='$sata',price='$price',start_time='$start_time',end_time='$end_time',update_at='$updateat',duration='$duration' WHERE id=$id";
                                                                        print_r($sql);
                                                                        $result = $this->con->query($sql);
                                                                        if ($result) {
                                                                            session_start();
                                                                            $_SESSION['success'] = "data Updated Successfully";
                                                                            header('location:../../short-terms.php');
                                                                        } else {
                                                                            session_start();
                                                                            echo "Error: " . $this->con . "<br>" . $this->con->error;
                                                                            echo mysqli_error($this->con);
                                                                            $_SESSION['error'] = "data Not Successfully";
                                                                            header('location:../../short-terms.php');
                                                                        }
                                                                    }
                                                                    public function updateTerms($id, $title, $body, $price, $start_time, $end_time, $duration)
                                                                    {
                                                                        $updateat = Date("Y/m/d", time());
                                                                        $sql = "UPDATE `short-terms` SET title='$title',body='$body',price='$price',start_time='$start_time',end_time='$end_time',update_at='$updateat',duration='$duration' WHERE id=$id";
                                                                        $result = $this->con->query($sql);
                                                                        if ($result) {
                                                                            session_start();
                                                                            $_SESSION['success'] = "data Updated Successfully";
                                                                            header('location:../../short-terms.php');
                                                                        } else {
                                                                            echo mysqli_error($this->con);
                                                                            exit;

                                                                            echo "Error: " . $this->con . "<br>" . $this->con->error;
                                                                            session_start();
                                                                            $_SESSION['error'] = "data Not Updated Successfully";
                                                                            header('location:../../short-terms.php');
                                                                        }
                                                                    }
                                                                    public function deleteTerms($id)
                                                                    {
                                                                        $sql = "DELETE FROM `short-terms` WHERE id=$id";
                                                                        $result = $this->con->query($sql);
                                                                        if ($result) {
                                                                            session_start();
                                                                            $_SESSION['error'] = "Record Deleted Successfully";
                                                                            header('location:short-terms.php');
                                                                        } else {
                                                                            // echo "error";
                                                                            session_start();
                                                                            $_SESSION['error'] = "Record not Deleted Successfully";
                                                                            header('location:../../short-terms.php');
                                                                        }
                                                                    }
                                                                }
