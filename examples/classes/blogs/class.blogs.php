<?php
// session_start();
class Blogs
{
    private $con;
    public $info;
    public $supportFormats;
    public function __construct()
    {
        $this->con=new mysqli('localhost','shazaib','mausamash','dashboard');
    }
    public function InsertBlogs($img,$title,$description,$date,$topic)
    {
        move_uploaded_file($img['tmp_name'],'../../../assets/img/'.time().$img['name']);
        $im=time().$img['name'];
        date_default_timezone_set('Asia/Kolkata');
        $insertAt=date('Y-m-d');
        $temp=time();
        $sql="INSERT INTO blogs(`img`, `title`, `description`, `date`, `topic`, `temp`,`insertedAt`) VALUES ('$im','$title','$description','$date','$topic','$temp','$insertAt')";
        if($this->con->query($sql)==true)
        {
            session_start();
            $_SESSION['success']="Record Uploaded Successfully";
            header('location:../../blogs.php');
        }
        else
        {
            session_start();
            echo mysqli_error($this->con);exit;

            $_SESSION['error']="Record Not  Uploaded Successfully";
            header('location:../../blogs.php');
        }

        
    }
    public function fetchall()
		{
			$sql="SELECT * FROM  blogs";
			$result=$this->con->query($sql);
			return $result;
		}
        public function fetchFull()
		{
			$sql="SELECT * FROM  enquiry";
			$result=$this->con->query($sql);
			return $result;
        }
        public function recents()
		{
			$sql="SELECT * FROM  blogs  ORDER BY id desc LIMIT 5 ";
			$result=$this->con->query($sql);
			return $result;
		}
        public function getbyid($id)
		{
			$sql="SELECT * FROM blogs where temp=$id";
			$res=$this->con->query($sql);
			return $res;
        }
    public function updateBlogs($id,$img,$title,$description,$date,$topic)
    {
        $sata=time().$img['name'];
        move_uploaded_file($img['tmp_name'],'../../../assets/img/'.time().$img['name']);
        $sql="UPDATE blogs SET img='$sata',title='$title',description='$description',date='$date',topic='$topic' WHERE temp=$id";
        $result=$this->con->query($sql);
        if($result)
        {
            session_start();
            $_SESSION['success']="data Updated Successfully";
            header('location:../../blogs.php');
        }
        else
        {
            session_start();
            echo "Error: " . $this->con . "<br>" . $this->con->error;
            $_SESSION['error']="data Not Successfully";
            header('location:../../blogs.php');
        }
    }
    public function updateBlogsText($id,$title,$description,$date,$topic)
    {
        $sql="UPDATE blogs SET title='$title',description='$description',date='$date',topic='$topic' WHERE temp=$id";
        $result=$this->con->query($sql);
        if($result)
        {
            session_start();
            $_SESSION['success']="data Updated Successfully";
            header('location:../../blogs.php');
        }
        else
        {
            echo mysqli_error($this->con);exit;

            echo "Error: " . $this->con . "<br>" . $this->con->error;
            session_start();
            $_SESSION['error']="data Not Updated Successfully";
            header('location:../../blogs.php');

        }
}
    public function deleteBlogs($id)
    {
        $sql="DELETE FROM `enquiry` WHERE id=$id";
        $result=$this->con->query($sql);
        if($result)
        {
            session_start();
            $_SESSION['error']="Record Deleted Successfully";
            header('location:blogs.php');
        }
        else
        {
            // echo "error";
            session_start();
            $_SESSION['error']="Record not Deleted Successfully";
            header('location:blogs.php');
        }
    }
}
?>