<?php

$per= $_COOKIE['per'];

include 'db.php';
$link = connect();
$sql = "select * from student where per=$per";
$obj = mysqli_query($link, $sql);
$row=mysqli_fetch_assoc($obj);
$Sdepartment = $row['Sdepartment'];
$sql1 = "select * from dormitory where Sdepartment='$Sdepartment'";
$obj1 = mysqli_query($link, $sql1);

// $num = mysqli_num_rows($obj);
// for($i = 0; $i < $num; $i++){
//     $rows.i = mysqli_fetch_assoc($obj);
// }
while($row=mysqli_fetch_assoc($obj1)){
    $rows[]=$row;
}

echo json_encode($rows,JSON_UNESCAPED_UNICODE);


//while($rows = mysqli_fetch_assoc($obj)){
//    echo '<tr>';
//        echo '<td>'.$rows['Sno'].'</td>';
//        echo '<td>'.$rows['Sname'].'</td>';
//        echo '<td>'.$rows['Ssex'].'</td>';
//        echo '<td>'.$rows['Sbirth'].'</td>';
//        echo '<td>'.$rows['Saddress'].'</td>';
//        echo '<td>'.$rows['nation'].'</td>';
//        echo '<td>'.$rows['IDnumber'].'</td>';
//        echo '<td>'.$rows['Spol'].'</td>';
//    echo '</tr>';
//}

mysqli_close($link);
?>

