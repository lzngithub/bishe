
<?php

$Sno= $_COOKIE['user'];

include 'db.php';
$link = connect();
$sql = "select Sdepartment,Smajor,Sclass,Sno from academic where Sno=$Sno";
$sql2 = "select campus,building,room from dor_nums where id1=$Sno or id2=$Sno or id3=$Sno or id4=$Sno";

$obj = mysqli_query($link, $sql);
$obj2 = mysqli_query($link, $sql2);
// $num = mysqli_num_rows($obj);
// for($i = 0; $i < $num; $i++){
//     $rows.i = mysqli_fetch_assoc($obj);
// }
while($row=mysqli_fetch_assoc($obj)){
    $rows[]=$row;
}
//
$row=mysqli_fetch_assoc($obj2);
$rows[]=$row;
//var_dump($row);


$sql3 = "select Sname from dormitory where room=$row[room] and campus='$row[campus]' and building='$row[building]'";
$obj3 = mysqli_query($link, $sql3);


while($row=mysqli_fetch_assoc($obj3)){
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

