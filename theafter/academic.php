<?php

header("Content-type:text/html;charset=utf-8");
include 'db.php';

//    var_dump($_POST);
$Smajor = $_POST['Smajor'];

$link = connect();
$sql = "select * from student where Smajor='$Smajor'";
$obj = mysqli_query($link, $sql);


while($row=mysqli_fetch_assoc($obj)){
    $rows[]=$row;
}

echo json_encode($rows,JSON_UNESCAPED_UNICODE);

mysqli_close($link);
?>
