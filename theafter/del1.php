<?php
include 'db.php';

$SdepID = $_REQUEST['SdepID'];


$link = connect();

$sql = "delete from aca_nums where SdepID=$SdepID";
$boolean = mysqli_query($link, $sql);
if($boolean){
    echo "<script> alert('删除成功');parent.location.href='http://localhost/whutNSS/thebefore/manage.html'; </script>";
    echo '成功1';
}else{
    echo "<script> alert('删除失败');parent.location.href='http://localhost/whutNSS/thebefore/manage.html'; </script>";

    echo '失败1';
}
mysqli_close($link);


//$sql1 = "delete from student where Snu=$Snu";
//var_dump($ret);

