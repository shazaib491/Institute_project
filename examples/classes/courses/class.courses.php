<?php
// session_start();
class Courses
{
    private $con;
    public $info;
    public $supportFormats;
    public function __construct()
    {
        $this->con=new mysqli('localhost','shazaib','mausamash','dashboard');
    }
    public function InsertCourses($title,$subtitle,$description,$temp,$category,$img,$duration,$fees,$strtTime,$endTime)
    {
        $sata=time().$img['name'];
        //  print_r($fees);
         move_uploaded_file($img['tmp_name'],'../../../assets/img/'.$sata);
     // move_uploaded_file($img['name']['tmp_name'],$target_dir.$sata);

        $sql="INSERT INTO courses(title,subtitle,Description,temp,category,imgname,duration,fees,strtTime,endTime) VALUES ('$title','$subtitle','$description','$temp','$category','$sata','$duration','$fees','$strtTime','$endTime')";
        // print_r($sql);exit;
        if($this->con->query($sql)==true)
        {
            session_start();
            $_SESSION['success']="Record Uploaded Successfully";
            header('location:../../courses.php');
        }
        else
        {
            echo mysqli_error($this->con);exit;
            session_start();
            $_SESSION['error']="Record Not  Uploaded Successfully";
            header('location:../../courses.php');
        }
    

        
    }
    public function fetchall()
		{
			$sql="SELECT * FROM  courses ORDER BY id desc";
			$result=$this->con->query($sql);
			return $result;
        }
        // main//
        public function fetchGraduate1()
		{
			$sql="SELECT * FROM  courses where category='graduate' ORDER BY id desc";
			$result=$this->con->query($sql);
			return $result;
        }
        public function fetchPostGraduate2()
		{
			$sql="SELECT * FROM  courses where category='postgraduate' ORDER BY id desc  ";
			$result=$this->con->query($sql);
			return $result;
        }
        public function fetchUnderGraduate3()
		{
			$sql="SELECT * FROM  courses where category='undergraduate' ORDER BY id desc  ";
			$result=$this->con->query($sql);
			return $result;
        }
        // main//
        public function fetchGraduate()
		{
			$sql="SELECT * FROM  courses where category='graduate' ORDER BY id desc LIMIT 3 ";
			$result=$this->con->query($sql);
			return $result;
		}
        public function fetchPostGraduate()
		{
			$sql="SELECT * FROM  courses where category='postgraduate' ORDER BY id desc LIMIT 3 ";
			$result=$this->con->query($sql);
			return $result;
        }
        public function fetchUnderGraduate()
		{
			$sql="SELECT * FROM  courses where category='undergraduate' ORDER BY id desc LIMIT 3 ";
			$result=$this->con->query($sql);
			return $result;
        }
        public function fetchlatest()
		{
			$sql="SELECT * FROM  courses  ORDER BY id desc LIMIT 2 ";
			$result=$this->con->query($sql);
			return $result;
		}
        public function getbyid($id)
		{
			$sql="SELECT * FROM courses where temp=$id";
			$res=$this->con->query($sql);
			return $res;
        }
        
 

    public function updateCoursesWithImages($id,$title,$subtitle,$description,$category,$img,$duration,$fees,$strtTime,$endTime)
    {
        $sata=time().$img['name'];
        move_uploaded_file($img['tmp_name'],'../../../assets/img/'.time().$img['name']);

            $sql="UPDATE courses SET title='$title',subtitle='$subtitle',description='$description',category='$category',imgname='$sata',duration='$duration',fees='$fees',strtTime='$strtTime',endTime='$endTime' WHERE temp=$id";
            // print_r($sql);exit;
            $result=$this->con->query($sql);
            if($result)
            {
             session_start();
                $_SESSION['success']="data Updated Successfully";
                 header('location:../../courses.php');
             }
        else
        {
            session_start();
            echo "Error: " . $this->con . "<br>" . $this->con->error;
            $_SESSION['error']="data Not Successfully";
            header('location:../../courses.php');
        }
    }
    public function updateCourses($id,$title,$subtitle,$description,$category,$duration,$fees,$strtTime,$endTime)
    {
        $sql="UPDATE courses SET title='$title',subtitle='$subtitle',description='$description',category='$category',duration='$duration',fees='$fees',strtTime='$strtTime',endTime='$endTime' WHERE temp=$id";
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
