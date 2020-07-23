<?php
// session_start();
class Contacts
{
    private $con;
    public $info;
    public $supportFormats;
    public function __construct()
    {
        $this->con=new mysqli('localhost','shazaib','mausamash','dashboard');
    }
    public function InsertContacts($msg,$name,$email,$mobile,$course)
    {
        date_default_timezone_set('Asia/Kolkata');
        $insertAt=date('Y-m-d');
        $sql="INSERT INTO contacts(`message`, `name`, `email`, `mobile`, `course`, `date`) VALUES ('$msg','$name','$email','$mobile','$course','$insertAt')";
        
        if($this->con->query($sql)==true)
        {
            session_start();
            $_SESSION['success']="Record Uploaded Successfully";
            header('location:../../../wiser/contact.php');
        }
        else
        {
            session_start();
            echo mysqli_error($this->con);exit;
            $_SESSION['error']="Record Not  Uploaded Successfully";
            header('location:../../../wiser/contact.php');
        }

        
    }
    public function fetchall()
		{
			$sql="SELECT * FROM  contacts";
			$result=$this->con->query($sql);
			return $result;
		}
    
        public function getbyid($id)
		{
			$sql="SELECT * FROM courses where temp=$id";
			$res=$this->con->query($sql);
			return $res;
        }
    public function updateCourses($id,$title,$subtitle,$description,$category)
    {
        $sql="UPDATE courses SET title='$title',subtitle='$subtitle',description='$description',category='$category' WHERE temp=$id";
        $result=$this->con->query($sql);
        if($result)
        {
            session_start();
            $_SESSION['success']="data Updated Successfully";
            header('location:../../courses.php');
        }
        else
        {
            echo "Error: " . $this->con . "<br>" . $this->con->error;

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
    public function deleteCourses($id)
    {

        $sql="DELETE FROM courses WHERE temp=$id";
        print_r($sql);
        $result=$this->con->query($sql);
        if($result)
        {
            session_start();
            $_SESSION['error']="Record Deleted Successfully";
            header('location:courses.php');
        }
        else
        {
            echo "error";
        }
    }
}
?>