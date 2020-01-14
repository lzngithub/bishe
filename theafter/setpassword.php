<?php
include 'db.php';

$password1 = $_GET['password1'];
$password2 = $_GET['password2'];
var_dump($_GET);

$link = connect();
$sql = "update studentuser set password='$password2'where password='$password1'";
//$sql = "update student Sname='2',Ssex='1',Sbirth=1,Saddress='1',nation='1',IDnumber=1,Spol='1' where Sno=1";

$res = mysqli_query($link, $sql);

if($res){
   echo '成功';
    echo "<script> alert('修改成功,需重新登录');parent.location.href='http://localhost/whutNSS/thebefore/index.html'; </script>";
}else{
   echo '失败';
    echo "<script> alert('修改失败');parent.location.href='http://localhost/whutNSS/thebefore/studentMain.html'; </script>";
}

mysqli_close($link);


