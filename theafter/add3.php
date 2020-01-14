<?php
include 'db.php';

$user = $_POST['user'];
$password = $_POST['password'];
$per = $_POST['per'];



var_dump($_POST);

$link = connect();
$sql = "insert into user(user,password,per) values ('$user', '$password', $per)";
//$sql = "insert into student(Sno,Sname,Ssex,Sbirth,Saddress,nation,IDnumber,Spol) values (12,'&Sname','&Ssex',&Sbirth,'&Saddress','&nation',&IDnumber,'&Spol')";

$res = mysqli_query($link, $sql);

if($res){
    echo "<script> alert('添加成功');parent.location.href='http://localhost/whutNSS/thebefore/manage.html'; </script>";
}else{
    echo "<script> alert('添加失败');parent.location.href='http://localhost/whutNSS/thebefore/manage.html'; </script>";
}

mysqli_close($link);

