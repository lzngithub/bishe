<?php
include 'db.php';

$Snu = $_GET['Snu'];
$Sname = $_GET['Sname'];
$Sbirth = $_GET['Sbirth'];
$Saddress = $_GET['Saddress'];
$Ssex = $_GET['Ssex'];
$Spol = $_GET['Spol'];
$nation = $_GET['nation'];
$IDnumber = $_GET['IDnumber'];
$Sdepartment = $_GET['Sdepartment'];
$Smajor = $_GET['Smajor'];

//var_dump($_GET);

$link = connect();
$sql = "insert into student(Snu,Sname,Ssex,Sbirth,Saddress,nation,IDnumber,Spol,Sdepartment,Smajor) values ($Snu, '$Sname', '$Ssex', $Sbirth, '$Saddress', '$nation', $IDnumber, '$Spol','$Sdepartment','$Smajor')";
//$sql = "insert into student(Sno,Sname,Ssex,Sbirth,Saddress,nation,IDnumber,Spol) values (12,'&Sname','&Ssex',&Sbirth,'&Saddress','&nation',&IDnumber,'&Spol')";

$res = mysqli_query($link, $sql);

if($res){
    echo "<script> alert('添加成功');parent.location.href='http://localhost/whutNSS/thebefore/upload.html'; </script>";
}else{
    echo "<script> alert('添加失败');parent.location.href='http://localhost/whutNSS/thebefore/upload.html'; </script>";
}

mysqli_close($link);
