<?php
include 'db.php';

$SdepID = $_GET['SdepID'];
$Sdepartment = $_GET['Sdepartment'];
$Smajor = $_GET['Smajor'];

var_dump($_GET);

$link = connect();



$sql = "update aca_nums set Sdepartment='$Sdepartment',Smajor='$Smajor'where SdepID=$SdepID";
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







