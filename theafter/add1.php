<?php
include 'db.php';

$SdepID = $_POST['SdepID'];
$Sdepartment = $_POST['Sdepartment'];
$Smajor = $_POST['Smajor'];


var_dump($_POST);

$link = connect();
$sql = "insert into aca_nums(SdepID,Sdepartment,Smajor,logic) values ($SdepID, '$Sdepartment', '$Smajor','未分配')";
//$sql = "insert into student(Sno,Sname,Ssex,Sbirth,Saddress,nation,IDnumber,Spol) values (12,'&Sname','&Ssex',&Sbirth,'&Saddress','&nation',&IDnumber,'&Spol')";

$res = mysqli_query($link, $sql);

if($res){
    echo "<script> alert('添加成功');parent.location.href='http://localhost/whutNSS/thebefore/manage.html'; </script>";
    echo '成功';
}else{
    echo "<script> alert('添加失败');parent.location.href='http://localhost/whutNSS/thebefore/manage.html'; </script>";
    echo '失败';
}

mysqli_close($link);
