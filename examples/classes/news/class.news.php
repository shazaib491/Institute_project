<?php
// session_start();
class News
{
    private $con;
    public $info;
    public $supportFormats;
    public function __construct()
    {
        $this->con=new mysqli('localhost','shazaib','mausamash','dashboard');
    }
    public function InsertNews($head,$img,$detail)
    {
        move_uploaded_file($img['tmp_name'],'../../../assets/img/'.time().$img['name']);
        $im=time().$img['name'];
        date_default_timezone_set('Asia/Kolkata');
        $onnounceDate=date('Y-m-d');
        $temp=time();
        $sql="INSERT INTO news(heading,image,detail,currentdate,temp) VALUES ('$head','$im','$detail','$onnounceDate','$temp')";
        if($this->con->query($sql)==true)
        {
            session_start();
            $_SESSION['success']="Record Uploaded Successfully";
            header('location:../../news.php');
        }
        else
        {
            session_start();
            echo mysqli_error($this->con);exit;

            $_SESSION['error']="Record Not  Uploaded Successfully";
            header('location:../../news.php');
        }

        
    }
    public function fetchall()
		{
			$sql="SELECT * FROM  news ORDER BY id desc LIMIT 3";
			$result=$this->con->query($sql);
			return $result;
        }
        public function fetchall1()
		{
			$sql="SELECT * FROM  news ";
			$result=$this->con->query($sql);
			return $result;
		}
    
        public function getbyid($id)
		{
			$sql="SELECT * FROM news where temp=$id";
			$res=$this->con->query($sql);
			return $res;
        }
        public function recents()
		{
			$sql="SELECT * FROM  news  ORDER BY id desc LIMIT 5 ";
			$result=$this->con->query($sql);
			return $result;
        }
    public function updateNews($id,$head,$img,$detail)
    {
        $sata=time().$img['name'];
        move_uploaded_file($img['tmp_name'],'../../../assets/img/'.time().$img['name']);
        $sql="UPDATE news SET heading='$head',image='$sata',detail='$detail' WHERE temp=$id";
        $result=$this->con->query($sql);
        if($result)
        {
            session_start();
            $_SESSION['success']="data Updated Successfully";
            header('location:../../news.php');
        }
        else
        {
            session_start();
            echo "Error: " . $this->con . "<br>" . $this->con->error;
            $_SESSION['error']="data Not Successfully";
            header('location:../../news.php');
        }
    }
    public function updateNewsText($id,$head,$detail)
    {
        $sql="UPDATE news SET heading   ='$head',detail='$detail' WHERE temp=$id";
        $result=$this->con->query($sql);
        if($result)
        {
            session_start();
            $_SESSION['success']="data Updated Successfully";
            header('location:../../news.php');
        }
        else
        {
            echo mysqli_error($this->con);exit;

            echo "Error: " . $this->con . "<br>" . $this->con->error;
            session_start();
            $_SESSION['error']="data Not Updated Successfully";
            header('location:../../news.php');

        }
}
    public function deleteNews($id)
    {
        $sql="DELETE FROM `news` WHERE temp=$id";
        $result=$this->con->query($sql);
        if($result)
        {
            session_start();
            $_SESSION['error']="Record Deleted Successfully";
            header('location:news.php');
        }
        else
        {
            echo "error";
            session_start();
            $_SESSION['error']="Record not Deleted Successfully";
            header('location:news.php');
        }
    }
}
?>