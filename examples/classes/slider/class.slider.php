<?php
// session_start();
class Slider
{
    private $con;
    public $info;
    public $supportFormats;
    public function __construct()
    {
        $this->con=new mysqli('localhost','shazaib','mausamash','dashboard');
    }
    public function InsertSlide($content,$img)
    {
        $im=time().$img['name'];
        move_uploaded_file($img['tmp_name'],'../../../assets/img/'.$im);
        $sql="INSERT INTO slider(content,imgname) VALUES ('$content','$im')";
        if($this->con->query($sql)==true)
        {
            session_start();
            $_SESSION['success']="Record Uploaded Successfully";
            header('location:../../slider.php');
        }
        else
        {
            session_start();
            $_SESSION['error']="Record Not  Uploaded Successfully";
            header('location:../../slider.php');
        }

        
    }
    public function fetchall()
		{
			$sql="SELECT * FROM  slider";
			$result=$this->con->query($sql);
			return $result;
		}
    
        public function getbyid($id)
		{
			$sql="SELECT * FROM slider where id=$id";
			$res=$this->con->query($sql);
			return $res;
        }
    public function updateSlide($id,$content,$img)
    {
        $sata=time().$img['name'];
        move_uploaded_file($img['tmp_name'],'../../../assets/img/'.time().$img['name']);
        $sql="UPDATE slider SET content='$content',imgname='$sata' WHERE id=$id";
        $result=$this->con->query($sql);
        if($result)
        {
            session_start();
            $_SESSION['success']="data Updated Successfully";
            header('location:../../slider.php');
        }
        else
        {
            echo "Error: " . $this->con . "<br>" . $this->con->error;

        }
    }

    public function updateSlideText($id,$content)
    {
        $sql="UPDATE slider SET content='$content' WHERE id=$id";
        print_r($sql);
        $result=mysqli_query($this->con,$sql);
        if($result)
        {
            session_start();
            $_SESSION['success']="data Updated Successfully";
            header('location:../../slider.php');
        }
        else
        {
            echo "Error: " . $this->con . "<br>" . $this->con->error;

        }
}
    public function deleteSlide($id)
    {
        $sql="DELETE FROM `slider` WHERE id=$id";
        $result=$this->con->query($sql);
        if($result)
        {
            session_start();
            $_SESSION['error']="Record Deleted Successfully";
            header('location:slider.php');
        }
        else
        {
            echo "error";
        }
    }
}
?>