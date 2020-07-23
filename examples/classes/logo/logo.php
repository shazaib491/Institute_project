<?php include('class.logo.php');
$logo=new LogoMaker();
if(isset($_POST['submit']))
{
    $imgname=$_POST['imgnm'];
    $img=$_FILES['img'];
        $logo->uploadFile($img);
        $logo->insert($imgname,$img);
}
else
{
    echo "error";
}
?>