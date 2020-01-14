<?php
include 'db.php';

$Snu = $_REQUEST['Snu'];
//var_dump($Snu);

$link = connect();

$sql1 = "select Sno from student where Snu=$Snu";
$res = mysqli_query($link, $sql1);
$ret = mysqli_fetch_assoc($res);


if($ret['Sno']==''||$ret['Sno']==null){
    $sql = "delete from student where Snu=$Snu";
    $boolean = mysqli_query($link, $sql);
    if($boolean){
        if($_COOKIE['per']==1){
            echo "<script> alert('删除成功');parent.location.href='http://localhost/whutNSS/thebefore/upload.html?yeshu=0'; </script>";
            echo '成功1';
        }else{
            echo "<script> alert('删除成功');parent.location.href='http://localhost/whutNSS/thebefore/upload1.html'; </script>";
            echo '成功1';
        }
        
    }else{
        if($_COOKIE['per']==1){
            echo "<script> alert('删除失败');parent.location.href='http://localhost/whutNSS/thebefore/upload.html?yeshu=0'; </script>";
            // echo '成功1';
        }else{
            echo "<script> alert('删除失败');parent.location.href='http://localhost/whutNSS/thebefore/upload1.html'; </script>";
            // echo '成功1';
        }
    } 
    mysqli_close($link);
}else{
    $sql9 = "select * from dormitory where Sno=$ret[Sno]";
    $res9 = mysqli_query($link, $sql9);
    if($res9){
        $ret9 = mysqli_fetch_assoc($res9);
        $sql8 = "select * from dor_nums where campus='$ret9[campus]' and building='$ret9[building]' and room=$ret9[room]";
        $res8 = mysqli_query($link, $sql8);
        $ret8 = mysqli_fetch_assoc($res8);
        var_dump($ret8);
        if($ret8['id1']==$ret['Sno']){
            $sql7 = "update dor_nums set id1=null where campus='$ret9[campus]' and building='$ret9[building]' and room=$ret9[room]";
            $boolean7 = mysqli_query($link, $sql7);
        }else if($ret8['id2']==$ret['Sno']){
            $sql7 = "update dor_nums set id2=null where campus='$ret9[campus]' and building='$ret9[building]' and room=$ret9[room]";
            $boolean7 = mysqli_query($link, $sql7);
        }else if($ret8['id3']==$ret['Sno']){
            $sql7 = "update dor_nums set id3=null where campus='$ret9[campus]' and building='$ret9[building]' and room=$ret9[room]";
            $boolean7 = mysqli_query($link, $sql7);
        }else if($ret8['id4']==$ret['Sno']){
            $sql7 = "update dor_nums set id4=null where campus='$ret9[campus]' and building='$ret9[building]' and room=$ret9[room]";
            $boolean7 = mysqli_query($link, $sql7);
        }
  
        $sql = "delete from student where Snu=$Snu";
        $sql2 = "delete from academic where Sno=$ret[Sno]";    
        $sql3 = "delete from dormitory where Sno=$ret[Sno]";    
        $sql4 = "delete from studentuser where Sno=$ret[Sno]";

        $boolean = mysqli_query($link, $sql);
        $boolean2 = mysqli_query($link, $sql2);
        $boolean3 = mysqli_query($link, $sql3);
        $boolean4 = mysqli_query($link, $sql4);
        
        
        if($boolean&&$boolean2&&$boolean3&&$boolean4&&$boolean7){
            if($_COOKIE['per']==1){
                echo "<script> alert('删除成功');parent.location.href='http://localhost/whutNSS/thebefore/upload.html?yeshu=0'; </script>";
                echo '成功1';
            }else{
                echo "<script> alert('删除成功');parent.location.href='http://localhost/whutNSS/thebefore/upload1.html'; </script>";
                echo '成功1';
            }
            
        }else{
            if($_COOKIE['per']==1){
                echo "<script> alert('删除失败');parent.location.href='http://localhost/whutNSS/thebefore/upload.html?yeshu=0'; </script>";
                // echo '成功1';
            }else{
                echo "<script> alert('删除失败');parent.location.href='http://localhost/whutNSS/thebefore/upload1.html'; </script>";
                // echo '成功1';
            }
        } 
        mysqli_close($link);
    }else{
        $sql = "delete from student where Snu=$Snu";
        $sql2 = "delete from academic where Sno=$ret[Sno]";
        $sql4 = "delete from studentuser where Sno=$ret[Sno]";

        $boolean = mysqli_query($link, $sql);
        $boolean2 = mysqli_query($link, $sql2);
        $boolean3 = mysqli_query($link, $sql3);
        $boolean4 = mysqli_query($link, $sql4);
        
        
        if($boolean&&$boolean2&&$boolean4){
            if($_COOKIE['per']==1){
                echo "<script> alert('删除成功');parent.location.href='http://localhost/whutNSS/thebefore/upload.html?yeshu=0'; </script>";
                echo '成功1';
            }else{
                echo "<script> alert('删除成功');parent.location.href='http://localhost/whutNSS/thebefore/upload1.html'; </script>";
                echo '成功1';
            }
            
        }else{
            if($_COOKIE['per']==1){
                echo "<script> alert('删除失败');parent.location.href='http://localhost/whutNSS/thebefore/upload.htm?yeshu=0'; </script>";
                // echo '成功1';
            }else{
                echo "<script> alert('删除失败');parent.location.href='http://localhost/whutNSS/thebefore/upload1.html'; </script>";
                // echo '成功1';
            }
        } 
        mysqli_close($link);
    }  
}

//$sql1 = "delete from student where Snu=$Snu";
//var_dump($ret);

