<?php
include 'db.php';

$campus = $_REQUEST['campus'];
  $building = $_REQUEST['building'];
  $room = $_REQUEST['room'];

var_dump($campus);
var_dump($building);
var_dump($_REQUEST);
//var_dump($_POST);
$link = connect();

$sql2 = "select * from dormitory where campus='$campus' and building='$building' and room=$room";
$boolean2 = mysqli_query($link, $sql2);
if($boolean2){
    $sql = "delete from dor_nums where campus='$campus' and building='$building' and room=$room";
    $sql1 = "delete from dormitory where campus='$campus' and building='$building' and room=$room";
    $boolean = mysqli_query($link, $sql);
    var_dump($boolean);
    var_dump($boolean1);
    $boolean1 = mysqli_query($link, $sql1);
    if($boolean&&$boolean1){
        echo "<script> alert('删除成功');parent.location.href='http://localhost/whutNSS/thebefore/dor3.html'; </script>";
        // echo '成功1';
    }else{
        echo "<script> alert('删除失败');parent.location.href='http://localhost/whutNSS/thebefore/dor3.html'; </script>";

        // echo '失败1';
    }
}else{
    $sql = "delete from dor_nums where campus='$campus' and building='$building' and room=$room";
    $boolean = mysqli_query($link, $sql);
    var_dump($boolean);
    if($boolean){
         echo "<script> alert('删除成功');parent.location.href='http://localhost/whutNSS/thebefore/dor3.html'; </script>";
        // echo '成功1';
    }else{
         echo "<script> alert('删除失败');parent.location.href='http://localhost/whutNSS/thebefore/dor3.html'; </script>";

        // echo '失败1';
    }
}


mysqli_close($link);


//$sql1 = "delete from student where Snu=$Snu";
//var_dump($ret);

