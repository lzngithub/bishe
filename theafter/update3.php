<?php
include 'db.php';

$user = $_GET['user'];
$password = $_GET['password'];
$per = $_GET['per'];
$id = $_GET['id'];

var_dump($_GET);

$link = connect();



$sql = "update user set user='$user',password='$password',per=$per where id=$id";
//$sql = "update student Sname='2',Ssex='1',Sbirth=1,Saddress='1',nation='1',IDnumber=1,Spol='1' where Sno=1";

$res = mysqli_query($link, $sql);

if($res){
   echo '成功';
    echo "<script> alert('修改成功');parent.location.href='http://localhost/whutNSS/thebefore/manage.html'; </script>";
}else{
   echo '失败';
    echo "<script> alert('修改失败');parent.location.href='http://localhost/whutNSS/thebefore/manage.html'; </script>";
}

mysqli_close($link);







