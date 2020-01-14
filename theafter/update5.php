<?php
include 'db.php';

$Sno = $_GET['Sno'];
$Sname = $_GET['Sname'];
$Ssex = $_GET['Ssex'];
$Sdepartment = $_GET['Sdepartment'];
$Smajor = $_GET['Smajor'];
$Sclass= $_GET['Sclass'];

var_dump($_GET);
$link = connect();

$sql = "update academic set Sclass='$Sclass' where Sno=$Sno";
$sql1 = "update dormitory set Sclass='$Sclass' where Sno=$Sno";
$sql2 = "update student set Sclass='$Sclass' where Sno=$Sno";
//$sql = "update student Sname='2',Ssex='1',Sbirth=1,Saddress='1',nation='1',IDnumber=1,Spol='1' where Sno=1";

$res = mysqli_query($link, $sql);
$res1 = mysqli_query($link, $sql1);
$res2 = mysqli_query($link, $sql2);

if($res&&$res1&&$res2){
   echo '成功';
    echo "<script> alert('修改成功');parent.location.href='http://localhost/whutNSS/thebefore/class1.html'; </script>";
}else{
   echo '失败';
    echo "<script> alert('修改失败');parent.location.href='http://localhost/whutNSS/thebefore/class1.html'; </script>";
}

mysqli_close($link);