<?php
include 'db.php';

$campus = $_GET['campus'];
$building = $_GET['building'];
$room = $_GET['room'];
$id1 = $_GET['id1'];
$id2 = $_GET['id2'];
$id3 = $_GET['id3'];
$id4 = $_GET['id4'];
$sex = $_GET['sex'];





var_dump($_GET);

$link = connect();
$sql = "insert into dor_nums (campus,building,room,id1,id2,id3,id4,sex) values ('$campus', '$building', $room,$id1,$id2,$id3,$id4,'$sex')";
//$sql = "insert into student(Sno,Sname,Ssex,Sbirth,Saddress,nation,IDnumber,Spol) values (12,'&Sname','&Ssex',&Sbirth,'&Saddress','&nation',&IDnumber,'&Spol')";

$res = mysqli_query($link, $sql);

if($res){
    // echo 'chenggong';
    echo "<script> alert('添加成功');parent.location.href='http://localhost/whutNSS/thebefore/dor3.html'; </script>";
}else{
    // echo 'shibai';
    echo "<script> alert('添加失败');parent.location.href='http://localhost/whutNSS/thebefore/dor3.html'; </script>";
}

mysqli_close($link);

