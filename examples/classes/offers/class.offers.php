<?php
// session_start();
class Offers
{
    private $con;
    public $info;
    public $supportFormats;
    public function __construct()
    {
        $this->con=new mysqli('localhost','shazaib','mausamash','dashboard');
    }
    public function InsertOffers($title,$icon,$descrip,$temp)
    {
        $sql="INSERT INTO offers(title,icon,descrip,temp) VALUES ('$title','$icon','$descrip','$temp')";
        if($this->con->query($sql)==true)
        {
            session_start();
            $_SESSION['success']="Record Uploaded Successfully";
            header('location:../../offers.php');
        }
        else
        {
            session_start();
            $_SESSION['error']="Record Not  Uploaded Successfully";
            header('location:../../offers.php');
        }

        
    }
    public function fetchall()
		{
			$sql="SELECT * FROM  offers";
			$result=$this->con->query($sql);
			return $result;
		}
        public function fetchLimit()
		{
			$sql="SELECT * FROM  offers   LIMIT 3 ";
			$result=$this->con->query($sql);
			return $result;
		}
        public function getbyid($id)
		{
			$sql="SELECT * FROM offers where temp=$id";
			$res=$this->con->query($sql);
			return $res;
        }
    public function updateSlide($id,$title,$icon,$descrip)
    {
        $sql="UPDATE offers SET title='$title',icon='$icon',descrip='$descrip' WHERE temp=$id";
        $result=$this->con->query($sql);
        if($result)
        {
            session_start();
            $_SESSION['success']="data Updated Successfully";
            header('location:../../offers.php');
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
    public function deleteOffers($id)
    {

        $sql="DELETE FROM offers WHERE temp=$id";
        print_r($sql);
        $result=$this->con->query($sql);
        if($result)
        {
            session_start();
            $_SESSION['error']="Record Deleted Successfully";
            header('location:offers.php');
        }
        else
        {
            echo "error";
        }
    }
}
?>