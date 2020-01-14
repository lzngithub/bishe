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
$sql1 = "select Sno from student where Snu=$Snu";
$res = mysqli_query($link, $sql1);
$ret = mysqli_fetch_assoc($res);


if($ret['Sno']==''||$ret['Sno']==null){
    $sql = "update student set Sname='$Sname',Ssex='$Ssex',Sbirth=$Sbirth,Saddress='$Saddress',nation='$nation',IDnumber=$IDnumber,Spol='$Spol',Sdepartment= '$Sdepartment',Smajor='$Smajor' where Snu=$Snu";
    //$sql = "update student Sname='2',Ssex='1',Sbirth=1,Saddress='1',nation='1',IDnumber=1,Spol='1' where Sno=1";

    $res = mysqli_query($link, $sql);

    if($res){
        if($_COOKIE['per']==1){
            echo "<script> alert('修改成功');parent.location.href='http://localhost/whutNSS/thebefore/upload.html'; </script>";
            echo '成功1';
        }else{
            echo "<script> alert('修改成功');parent.location.href='http://localhost/whutNSS/thebefore/upload1.html'; </script>";
            echo '成功1';
        }
        
    }else{
        if($_COOKIE['per']==1){
            echo "<script> alert('修改失败');parent.location.href='http://localhost/whutNSS/thebefore/upload.html'; </script>";
            // echo '成功1';
        }else{
            echo "<script> alert('修改失败');parent.location.href='http://localhost/whutNSS/thebefore/upload1.html'; </script>";
            // echo '成功1';
        }
    } 

    mysqli_close($link);
}else{
    $sql9 = "select * from dormitory where Sno=$ret[Sno]";
    $res9 = mysqli_query($link, $sql9);
    if($res9){
        
        $sq2 = "update student set Sname='$Sname',Ssex='$Ssex',Sbirth=$Sbirth,Saddress='$Saddress',nation='$nation',IDnumber=$IDnumber,Spol='$Spol',Sdepartment= '$Sdepartment',Smajor='$Smajor' where Snu=$Snu";
        $sq3 = "update academic set Sname='$Sname',Ssex='$Ssex',Saddress='$Saddress',Sdepartment= '$Sdepartment',Smajor='$Smajor' where Sno=$ret[Sno]";
        $sq4 = "update dormitory set Sname='$Sname',Ssex='$Ssex',Saddress='$Saddress',Sdepartment= '$Sdepartment',Smajor='$Smajor' where Sno=$ret[Sno]";


        $boolean2 = mysqli_query($link, $sql2);
        $boolean3 = mysqli_query($link, $sql3);
        $boolean4 = mysqli_query($link, $sql4);
        
        
        if($boolean2&&$boolean3&&$boolean4){
            if($_COOKIE['per']==1){
                echo "<script> alert('修改成功');parent.location.href='http://localhost/whutNSS/thebefore/upload.html'; </script>";
                echo '成功1';
            }else{
                echo "<script> alert('修改成功');parent.location.href='http://localhost/whutNSS/thebefore/upload1.html'; </script>";
                echo '成功1';
            }
            
        }else{
            if($_COOKIE['per']==1){
                echo "<script> alert('修改失败');parent.location.href='http://localhost/whutNSS/thebefore/upload.html'; </script>";
                // echo '成功1';
            }else{
                echo "<script> alert('修改失败');parent.location.href='http://localhost/whutNSS/thebefore/upload1.html'; </script>";
                // echo '成功1';
            }
        } 
        mysqli_close($link);
    }else{
        $sq2 = "update student set Sname='$Sname',Ssex='$Ssex',Sbirth=$Sbirth,Saddress='$Saddress',nation='$nation',IDnumber=$IDnumber,Spol='$Spol',Sdepartment= '$Sdepartment',Smajor='$Smajor' where Snu=$Snu";
        $sq3 = "update academic set Sname='$Sname',Ssex='$Ssex',Saddress='$Saddress',Sdepartment= '$Sdepartment',Smajor='$Smajor' where Sno=$ret[Sno]";


        $boolean2 = mysqli_query($link, $sql2);
        $boolean3 = mysqli_query($link, $sql3);
        
        
        if($boolean2&&$boolean3){
            if($_COOKIE['per']==1){
                echo "<script> alert('修改成功');parent.location.href='http://localhost/whutNSS/thebefore/upload.html'; </script>";
                echo '成功1';
            }else{
                echo "<script> alert('修改成功');parent.location.href='http://localhost/whutNSS/thebefore/upload1.html'; </script>";
                echo '成功1';
            }
            
        }else{
            if($_COOKIE['per']==1){
                echo "<script> alert('修改失败');parent.location.href='http://localhost/whutNSS/thebefore/upload.html'; </script>";
                // echo '成功1';
            }else{
                echo "<script> alert('修改失败');parent.location.href='http://localhost/whutNSS/thebefore/upload1.html'; </script>";
                // echo '成功1';
            }
        } 
        mysqli_close($link);
    }  
}






