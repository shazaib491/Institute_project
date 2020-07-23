<?php
include('class.events.php');
$events = new Events();
// Database configuration

// Create database connection
$db = new mysqli('localhost', 'shazaib', 'mausamash', 'dashboard');

// Check connection
if (isset($_FILES['files']['name'])) {
    $head = $_POST['head'];
    $hdate = date($_POST['hdate']);
    $htime = $_POST['htime'];
    $hplace = $_POST['hplace'];
    $img = $_FILES['files'];
    $temp=time();
    $detail=$_POST['detail'];
    date_default_timezone_set('Asia/Kolkata');
    $onnounceDate=date('Y-m-d');
    $sql="INSERT INTO events(`heading`,`hplace`,`hdate`,`htime`,`temp`,`onnounceDate`,`detail`) VALUES ('$head','$hplace','$hdate','$htime','$temp','$onnounceDate','$detail')";
    if ($db->query($sql)==true) {
        $last_id=$db->insert_id;
        // print_r($last_id)
        if ($last_id) {
            foreach ($_FILES['files']['tmp_name'] as  $i=>$value) {
                $image_name=$_FILES['files']['tmp_name'][$i];
                $folder="../../../assets/img/";
                $image_path=$folder.$_FILES['files']['name'][$i];
                $image_nm=$_FILES['files']['name'][$i];
                move_uploaded_file($image_name, $image_path);
                //    print($insertValuesSQL);exit;
                $query="INSERT INTO images(`file_name`,`uid`) values(?,?)";
                $stmt=$db->prepare($query);
                $stmt->bind_param("si", $image_nm,$last_id);
                $stmt->execute();
                // print_r($stmt);
                //    $insert="INSERT INTO images(`file_name`,`uid`)VALUES('$insertValuesSQL','$last_id')";
            
                //    $success=mysqli_query($this->con, $insert);
                // print_r($query);
                // $insert = $this->con->query("INSERT INTO images (file_name,uid) VALUES $insertValuesSQL,$last_id")
            
                $_SESSION['success']="image upload Successfully";
            }
        }
    }
}
else
if(isset($_POST['update']))
{
$head=$_POST['head'];
$hdate=date($_POST['hdate']);
$htime=$_POST['htime'];
$hplace=$_POST['hplace'];
$img=$_FILES['img'];
$detail=$_POST['detail'];
$id=$_POST['id'];
if (empty($_FILES['img']['name'][0])) {
$events->updateEvents($id,$head,$hdate,$htime,$hplace,$detail);
}
else
{
$events->updateEventsWithImages($id,$head,$hdate,$htime,$hplace,$temp,$img,$detail);

}

}
echo "image uploaded";
