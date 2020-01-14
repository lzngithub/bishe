<?php
include 'db.php';

$Snu = $_REQUEST['Snu'];
var_dump($Snu);

$link = connect();
$sql = "update student set pay='已缴费' where Snu=$Snu";

$boolean = mysqli_query($link, $sql);

if($boolean&& mysqli_affected_rows($link)){
    if($_COOKIE['per']==1){
        echo "<script> alert('缴费成功');parent.location.href='http://localhost/whutNSS/thebefore/account.html'; </script>";
    }else if($_COOKIE['per']==2){
        echo "<script> alert('缴费成功');parent.location.href='http://localhost/whutNSS/thebefore/account1.html'; </script>";
    }else{
        echo "<script> alert('缴费成功');parent.location.href='http://localhost/whutNSS/thebefore/account.html?yeshu=0'; history.back(-1);</script>";
    }
}else if($_COOKIE['per']==1){
        echo "<script> alert('缴费失败');parent.location.href='http://localhost/whutNSS/thebefore/account.html'; </script>";
    }else if($_COOKIE['per']==2){
        echo "<script> alert('缴费失败');parent.location.href='http://localhost/whutNSS/thebefore/account1.html'; </script>";
    }else{
        echo "<script> alert('缴费失败');parent.location.href='http://localhost/whutNSS/thebefore/account.html?yeshu=0'; </script>";
    }
mysqli_close($link);