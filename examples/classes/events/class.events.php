<?php
// session_start();
class Events
{
    private $con;
    public $info;
    public $supportFormats;
    public function __construct()
    {
        $this->con=new mysqli('localhost','shazaib','mausamash','dashboard');
    }
    public function Insertevents($head,$hdate,$htime,$hplace,$temp,$insertValuesSQL,$detail)
    {    
        // echo $hdate;
        // $sata=time().$img['name'];
        // $ondate=date($hdate);
        // move_uploaded_file($img['tmp_name'],'../../../assets/img/'.time().$img['name']);
        date_default_timezone_set('Asia/Kolkata');
        $onnounceDate=date('Y-m-d');
        print_r($insertValuesSQL);
        $sql="INSERT INTO events(`heading`,`hplace`,`hdate`,`htime`,`temp`,`onnounceDate`,`detail`) VALUES ('$head','$hplace','$hdate','$htime','$temp','$onnounceDate','$detail')";
        if ($this->con->query($sql)==true) {
            $last_id=$this->con->insert_id;
                        if ($last_id) {
                // print_r($last_id);
           
                       print($insertValuesSQL);exit;     
                    $insert="INSERT INTO images(`file_name`,`uid`)VALUES('$insertValuesSQL','$last_id')";
                
                $success=mysqli_query($this->con,$insert);
                // print_r($query);
                // $insert = $this->con->query("INSERT INTO images (file_name,uid) VALUES $insertValuesSQL,$last_id");
                if($success)
                {
                    echo "success";
                }
                else
                {
                    echo mysqli_error($this->con);exit;
                    
                }
                session_start();
                $_SESSION['success']="Record Uploaded Successfully";
                header('location:../../events.php');
            }
        }
        else
        {
            session_start();
            // echo "Error: " . $this->con . "<br>" . $this->con->error;
            echo mysqli_error($this->con);exit;
            $_SESSION['error']="Record Not  Uploaded Successfully";
            header('location:../../events.php');
        }
    }
    public function fetchall()
		{
			$sql="SELECT * FROM  events";
			$result=$this->con->query($sql);
			return $result;
		}
    
        public function getbyid($id)
		{
			$sql="SELECT * FROM events where id=$id";
			$res=$this->con->query($sql);
			return $res;
        }
    
        public function updateEventsWithImages($id,$head,$hdate,$htime,$hplace,$temp,$img,$detail)
        {
            $sata=time().$img['name'];
            move_uploaded_file($img['tmp_name'],'../../../assets/img/'.time().$img['name']);
            $sql="UPDATE events SET heading='$head',hdate='$hdate',htime='$htime',hplace='$hplace',img='$sata',detail='$detail' WHERE id=$id";
            $result=$this->con->query($sql);
            if($result)
            {
                session_start();
                $_SESSION['success']="data Updated Successfully";
                header('location:../../events.php');
            }
            else
            {
                session_start();
                echo "Error: " . $this->con . "<br>" . $this->con->error;
                $_SESSION['error']="data Not Successfully";
                header('location:../../events.php');
            }
        }
    public function updateEvents($id,$head,$hdate,$htime,$hplace,$detail)
    {
        $sql="UPDATE events SET heading='$head',hdate='$hdate',htime='$htime',hplace='$hplace',detail='$detail' WHERE id=$id";
        
        $result=$this->con->query($sql);
        // var_dump($sql);exit;
        if($result)
        {
            session_start();
            $_SESSION['success']="data Updated Successfully";
            header('location:../../events.php');
        }
        else
        {
            echo "Error: " . $this->con . "<br>" . $this->con->error;
            echo mysqli_error($this->con);exit;
        }
    }
//     public function updateSlideText($id,$content)
//     {
//         $sql="UPDATE slider SET content='$content' WHERE id=$id";
//         $result=$this->con->query($sql);
//         if($result)
//         {
//             session_start();
//             $_SESSION['success']="data Updated Successfully";
//             header('location:../../slider.php');
//         }
//         else
//         {
//             echo "Error: " . $this->con . "<br>" . $this->con->error;

//         }
// }
    public function deleteEvents($id)
    {

        $sql="DELETE FROM events WHERE id=$id";
        $result=$this->con->query($sql);
        if($result)
        {
            session_start();
            $_SESSION['error']="Record Deleted Successfully";
            header('location:events.php');
        }
        else
        {
            echo "error";
        }
    }
}
