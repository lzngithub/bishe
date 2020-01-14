<?php

// var_dump($_POST);
$Sname = $_POST['Sname'];
$Snu = $_POST['Snu'];
$per= $_COOKIE['per'];

include('db.php');
$link = connect();
$sql = "select Snu,Sname,Ssex,Sbirth,Saddress,nation,IDnumber,Spol,Sdepartment,Smajor,Sreg from student where Snu=$Snu and Sname='$Sname' and per=$per";
$obj = mysqli_query($link, $sql);
// $row=mysqli_fetch_assoc($obj);
// var_dump($row);


while($row=mysqli_fetch_assoc($obj)){
    $rows[]=$row;
}

echo json_encode($rows,JSON_UNESCAPED_UNICODE);
mysqli_close($link);

