<?php
include('db.php');

var_dump($_POST);
//echo $_POST[Snu];

$Snu = $_POST['Snu'];
$Sname = $_POST['Sname'];
$Sbirth = $_POST['Sbirth'];
$Saddress = $_POST['Saddress'];
$Ssex = $_POST['Ssex'];
$Spol = $_POST['Spol'];
$nation = $_POST['nation'];
$IDnumber = $_POST['IDnumber'];
$Sdepartment = $_POST['Sdepartment'];
$Smajor = $_POST['Smajor'];
$per= $_COOKIE['per'];


$link = connect();
$sql ="update student set Sname='$Sname',Ssex='$Ssex',Sbirth=$Sbirth,Saddress='$Saddress',nation='$nation',IDnumber=$IDnumber,Spol='$Spol',Sdepartment='$Sdepartment',Smajor='$Smajor',Sreg='已报到' where Snu=$Snu";
//$sql = "update student set pay='未缴费',Sreg='已报到' where Snu=$Snu";
$boolean = mysqli_query($link, $sql);

if($boolean&& mysqli_affected_rows($link)){
    if($per==1){
        echo "<script> alert('报到成功');parent.location.href='http://localhost/whutNSS/thebefore/newStudentCheck.html'; </script>";
    }else{
        echo "<script> alert('报到成功');parent.location.href='http://localhost/whutNSS/thebefore/newStudentCheck1.html'; </script>";
    }
    
}else{
    if($per==1){
        echo "<script> alert('报到失败');parent.location.href='http://localhost/whutNSS/thebefore/newStudentCheck.html'; </script>";
    }else{
        echo "<script> alert('报到失败');parent.location.href='http://localhost/whutNSS/thebefore/newStudentCheck1.html'; </script>";
    }
}
mysqli_close($link);

