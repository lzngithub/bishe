<?php

$campus = $_GET['campus'];
$building = $_GET['building'];
$room = $_GET['room'];
$id1 = $_GET['id1'];
$id2 = $_GET['id2'];
$id3 = $_GET['id3'];
$id4 = $_GET['id4'];
$sex = $_GET['sex'];

include 'db.php';
$link = connect();
$sql = "update dor_nums set id1=$id1,id2=$id2,id3=$id3,id4=$id4 where campus='$campus' and building='$building' and room=$room";
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
