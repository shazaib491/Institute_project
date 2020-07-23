<?php
// session_start();
class Toppers
{
    private $con;
    public $info;
    public $supportFormats;
    public function __construct()
    {
        $this->con=new mysqli('localhost','shazaib','mausamash','dashboard');
    }
    public function InsertLists($year,$image,$name,$rank,$percent,$subject,$temp,$division)
    {
        $sata=time().$image['name'];
         
         move_uploaded_file($image['tmp_name'],'../../../assets/img/'.$sata);
     // move_uploaded_file($img['name']['tmp_name'],$target_dir.$sata);
     date_default_timezone_set('Asia/Kolkata');
        $createAt=date('Y-m-d');
        $updateAt=date('Y-m-d');
        $sql="INSERT INTO `toppersLists`( `year`, `image`, `name`, `rank`, `percent`, `subject`, `temp`, `createAt`, `updateAt`,`division`) VALUES ('$year','$sata','$name','$rank','$percent','$subject','$temp','$createAt','$updateAt','$division')";
        // echo "<br>";
        // print_r($sql);exit;

        if($this->con->query($sql)==true)
        {
            session_start();
            $_SESSION['success']="Record Uploaded Successfully";
            header('location:../../toppers.php');
        }
        else
        {
            echo mysqli_error($this->con);exit;
            session_start();
            $_SESSION['error']="Record Not  Uploaded Successfully";
            header('location:../../toppers.php');
        }
    

        
    }
    public function fetchall()
		{
			$sql="SELECT * FROM  toppersLists ORDER BY id desc";
			$result=$this->con->query($sql);
			return $result;
        }
        // main//
        public function fetchBca()
		{
			$sql="SELECT * FROM  toppersLists where subject='bca' ORDER BY id desc";
			$result=$this->con->query($sql);
			return $result;
        }
        public function fetchMsc()
		{
			$sql="SELECT * FROM  toppersLists where subject='msc' ORDER BY id desc  ";
			$result=$this->con->query($sql);
			return $result;
        }
        // public function fetchUnderGraduate3()
		// {
		// 	$sql="SELECT * FROM  courses where category='undergraduate' ORDER BY id desc  ";
		// 	$result=$this->con->query($sql);
		// 	return $result;
        // }
        // main//
        // public function fetchGraduate()
		// {
		// 	$sql="SELECT * FROM  courses where category='graduate' ORDER BY id desc LIMIT 3 ";
		// 	$result=$this->con->query($sql);
		// 	return $result;
		// }
        // public function fetchPostGraduate()
		// {
		// 	$sql="SELECT * FROM  courses where category='postgraduate' ORDER BY id desc LIMIT 3 ";
		// 	$result=$this->con->query($sql);
		// 	return $result;
        // }
        // public function fetchUnderGraduate()
		// {
		// 	$sql="SELECT * FROM  courses where category='undergraduate' ORDER BY id desc LIMIT 3 ";
		// 	$result=$this->con->query($sql);
		// 	return $result;
        // }
        // public function fetchlatest()
		// {
		// 	$sql="SELECT * FROM  courses  ORDER BY id desc LIMIT 2 ";
		// 	$result=$this->con->query($sql);
		// 	return $result;
		// }
        public function getbyid($id)
		{
			$sql="SELECT * FROM toppersLists where temp=$id";
			$res=$this->con->query($sql);
			return $res;
        }
        
 

    public function updateToppers($id,$year,$image,$name,$rank,$percent,$subject,$division)
    {
        $sata=time().$image['name'];
        move_uploaded_file($image['tmp_name'],'../../../assets/img/'.$sata);

            $sql="UPDATE toppersLists SET year='$year',image='$sata',name='$name',rank='$rank',percent='$percent',subject='$subject',division='$division=' WHERE temp=$id";
            // print_r($sql);exit;
        $result=$this->con->query($sql);
        if($result)
        {
            session_start();
            $_SESSION['success']="data Updated Successfully";
            header('location:../../toppers.php');
        }
        else
        {
            session_start();
            echo "Error: " . $this->con . "<br>" . $this->con->error;
            $_SESSION['error']="data Not Successfully";
            header('location:../../toppers.php');
        }
    }
    public function updateToppersText($id,$year,$name,$rank,$percent,$subject,$division)
    {
        $updateAt=date('Y-m-d');
        $sql="UPDATE toppersLists SET year='$year',name='$name',rank='$rank',percent='$percent',subject='$subject',updateAt='$updateAt',division='$division' WHERE temp=$id";
        
        $result=$this->con->query($sql);
        if($result)
        {
            session_start();
            $_SESSION['success']="data Updated Successfully";
            header('location:../../toppers.php');
        }
        else
        {
            // echo "Error: " . $this->con . "<br>" . $this->con->error;
            echo mysqli_error($this->con);exit;
            $_SESSION['error']="data Not Updated Successfully";
            header('location:../../toppers.php');
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
    public function deleteToppers($id)
    {

        $sql="DELETE FROM toppersLists WHERE temp=$id";
        print_r($sql);
        $result=$this->con->query($sql);
        if($result)
        {
            session_start();
            $_SESSION['error']="Record Deleted Successfully";
            header('location:toppers.php');
        }
        else
        {
            echo "error";
        }
    }
}
?>