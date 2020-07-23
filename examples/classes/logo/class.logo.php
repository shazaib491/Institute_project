<?php

error_reporting(0);
class LogoMaker
{
    private $con;
    private $supportFormats=['image/png','image/jpeg','image/jpg','image/gif'];
    public  $info;
    public function __construct()
    {
        $this->mysqli=new mysqli('localhost','shazaib','mausamash','dashboard');
    }
    public function uploadFile($file) 
		{
			if(is_array($file))
			{
				//continue
				if(in_array($file['type'],$this->supportFormats))
				{
					//continue
					$this->info=time().$file['name'];
					move_uploaded_file($file['tmp_name'],'../../../assets/img/'.time().$file['name']);
                    
				}
				else
				{
					echo ('file format not found');
				}
			}
			else{
				echo('no file was uploadede');
		
			}
		}
    public function insert($imgName,$logo)
    {
		$sql="SELECT * FROM logo";
		$result=$this->mysqli->query($sql);
		$row=mysqli_fetch_assoc($result);
		$id=$row['id'];
		$sql="UPDATE logo SET img_name='$imgName',img='$this->info' WHERE id=$id";
		print_r($sql);
        // $sql="INSERT INTO `logo`(`img_name`,`img`) VALUES('$imgName','$this->info')";
        if($this->mysqli->query($sql)==true)
            {
				session_start();
                $_SESSION['success']="Information Uploaded SuccessFully";
                header('location:../../logo.php');
            }
        else
            {
            	// echo mysqli_error($this->mysqli);
					echo "Error: " . $this->mysqli . "<br>" . $this->mysqli->error;

            }
    }
    public function fetchall()
		{
			$sql="SELECT * FROM logo";
			$result=$this->mysqli->query($sql);
			return $result;
		}
    }





?>