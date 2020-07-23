<?php
class Authenticate
{
    public $con;

     function __construct(){
        $this->con=new mysqli('localhost','shazaib','mausamash','dashboard');
    }

    public function Register($username,$email,$password,$cpassword)
    {
        
        $sql="INSERT INTO `admin`(uname,email,password,cpassword) VALUES ('$username','$email','$password','$cpassword')";
        $this->con->query($sql);
    }
    public function login($email,$password)
    {
        $sql="SELECT * FROM admin where email='$email' &&  password='$password'";
        $result=$this->con->query($sql);
        $count = mysqli_num_rows($result);
        if($count==1)
        {
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $_SESSION['username']='<pre class="text-light">Welcome &emsp;'.$row['uname'].'</pre>';
            $_SESSION['userId']=$row['id'];
            header('location:../index.php');
        }
        else
        {
            $_SESSION['error']='Please Fill Right Information';
            header('location:../login.php');
        }
    }
    public function logout()
    {
    session_destroy();
    unset($_SESSION['userId']);
    header("Location:login.php");
    return true;    
    }

}

?>