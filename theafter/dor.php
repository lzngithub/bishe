<?php

header("Content-type:text/html;charset=utf-8");
include 'db.php';

//    var_dump($_POST);
$campus = $_POST['campus'];
$building = $_POST['building'];
$department = $_POST['department'];


$link = connect();
$sql = "select * from academic where Sdepartment='$department' and Ssex='男'and Saddress!='湖北武汉'";
$sql1 = "select * from academic where Sdepartment='$department' and Ssex='女' and Saddress!='湖北武汉'";

$sql2 = "select * from academic where Sdepartment='$department' and Saddress='湖北武汉' and Ssex='男'";
$sql3 = "select * from academic where Sdepartment='$department' and Saddress='湖北武汉' and Ssex='女'";

$sql4 = "select * from dor_nums where sex='男' and (id1 is null or id1='') and (id2 is null or id2='') and (id3 is null or id3 ='') and (id4 is null or id4='') and campus='$campus' and building='$building'";
$sql5 = "select * from dor_nums where sex='女' and (id1 is null or id1='') and (id2 is null or id2='') and (id3 is null or id3 ='') and (id4 is null or id4='') and campus='$campus' and building='$building'";

$res = mysqli_query($link, $sql);
$res1 = mysqli_query($link, $sql1);
$res2 = mysqli_query($link, $sql2);
$res3 = mysqli_query($link, $sql3);
$res4 = mysqli_query($link, $sql4);
$res5 = mysqli_query($link, $sql5);

$sql7 = "select sex from dor_nums where campus='$campus' and building='$building'";
$res7 = mysqli_query($link, $sql7);
$ret = mysqli_fetch_assoc($res7);

$sql6 = "select * from dormitory where Sdepartment='$department' and Ssex='$ret[sex]'";
$res6 = mysqli_query($link, $sql6);
$nums = mysqli_num_rows($res6);
//echo $nums;

if($nums==0){   
    if($ret['sex']=='男'){
        $obj = mysqli_fetch_assoc($res2);
        if($obj==null){
            $obj = mysqli_fetch_assoc($res);
        }
//        echo '1';
        $i=4;
//        var_dump($obj);
        while($obj){
            $n=$i%4;
//            echo '1';
        //    echo $n;
        //    echo '没进入';
            if($n==0){
        //        echo '1';
                $obj4 = mysqli_fetch_assoc($res4);
                $sql = "update dor_nums set id1=$obj[Sno] where campus='$obj4[campus]' and building='$obj4[building]' and room=$obj4[room]";
                $ret = mysqli_query($link, $sql);
//                echo '1';
//                echo $ret;
                $sql1 = "insert into dormitory(campus,building,room,Sdepartment,Smajor,Sclass,Sno,Sname,Ssex,Saddress) values ('$obj4[campus]','$obj4[building]',$obj4[room],'$obj[Sdepartment]', '$obj[Smajor]', '$obj[Sclass]',$obj[Sno], '$obj[Sname]', '$obj[Ssex]','$obj[Saddress]')";
                $ret1 = mysqli_query($link, $sql1);
//                echo $ret1;
                $obj = mysqli_fetch_assoc($res);
                if(!$obj){
                    $obj = mysqli_fetch_assoc($res2);
                }
            }else if($n==1){
        //        echo '2';
                $sql = "update dor_nums set id2=$obj[Sno] where campus='$obj4[campus]' and building='$obj4[building]' and room=$obj4[room]";
                $ret = mysqli_query($link, $sql);
                $sql1 = "insert into dormitory(campus,building,room,Sdepartment,Smajor,Sclass,Sno,Sname,Ssex,Saddress) values ('$obj4[campus]','$obj4[building]',$obj4[room],'$obj[Sdepartment]', '$obj[Smajor]', '$obj[Sclass]',$obj[Sno], '$obj[Sname]', '$obj[Ssex]','$obj[Saddress]')";
                $ret1 = mysqli_query($link, $sql1);
                $obj = mysqli_fetch_assoc($res);
                if(!$obj){
                    $obj = mysqli_fetch_assoc($res2);
                }
            }else if($n==2){
        //        echo '3';
                $sql = "update dor_nums set id3=$obj[Sno] where campus='$obj4[campus]' and building='$obj4[building]' and room=$obj4[room]";
                $ret = mysqli_query($link, $sql);
                $sql1 = "insert into dormitory(campus,building,room,Sdepartment,Smajor,Sclass,Sno,Sname,Ssex,Saddress) values ('$obj4[campus]','$obj4[building]',$obj4[room],'$obj[Sdepartment]', '$obj[Smajor]', '$obj[Sclass]',$obj[Sno], '$obj[Sname]', '$obj[Ssex]','$obj[Saddress]')";
                $ret1 = mysqli_query($link, $sql1);
                $obj = mysqli_fetch_assoc($res);
                if(!$obj){
                    $obj = mysqli_fetch_assoc($res2);
                }
            }else if($n==3){
        //        echo '4';
                $sql = "update dor_nums set id4=$obj[Sno] where campus='$obj4[campus]' and building='$obj4[building]' and room=$obj4[room]";
                $ret = mysqli_query($link, $sql);
                $sql1 = "insert into dormitory(campus,building,room,Sdepartment,Smajor,Sclass,Sno,Sname,Ssex,Saddress) values ('$obj4[campus]','$obj4[building]',$obj4[room],'$obj[Sdepartment]', '$obj[Smajor]', '$obj[Sclass]',$obj[Sno], '$obj[Sname]', '$obj[Ssex]','$obj[Saddress]')";
                $ret1 = mysqli_query($link, $sql1);
                $obj = mysqli_fetch_assoc($res2);
                if(!$obj){
                    $obj = mysqli_fetch_assoc($res);
                }
            }
            $i++;  
        //    var_dump($obj);
        }

        $sql = "select * from dormitory where Sdepartment='$department' and campus='$campus' and building='$building'";
        $obj = mysqli_query($link, $sql);

        while($row=mysqli_fetch_assoc($obj)){
            $rows[]=$row;
        }

        echo json_encode($rows,JSON_UNESCAPED_UNICODE);
        mysqli_close($link);
    }else{
//        echo'nu';
        $obj = mysqli_fetch_assoc($res3);
//        echo '1';
//        var_dump($obj);
        if($obj==null){
//            echo '1';
            $obj = mysqli_fetch_assoc($res1);
        }
        $i=4;
        while($obj){
            $n=$i%4;
        //    echo $n;
        //    echo '没进入';
            if($n==0){
        //        echo '1';
                $obj4 = mysqli_fetch_assoc($res5);
                $sql = "update dor_nums set id1=$obj[Sno] where campus='$obj4[campus]' and building='$obj4[building]' and room=$obj4[room]";
                $ret = mysqli_query($link, $sql);
                $sql1 = "insert into dormitory(campus,building,room,Sdepartment,Smajor,Sclass,Sno,Sname,Ssex,Saddress) values ('$obj4[campus]','$obj4[building]',$obj4[room],'$obj[Sdepartment]', '$obj[Smajor]', '$obj[Sclass]',$obj[Sno], '$obj[Sname]', '$obj[Ssex]','$obj[Saddress]')";
                $ret1 = mysqli_query($link, $sql1);
                $obj = mysqli_fetch_assoc($res1);
                if(!$obj){
                    $obj = mysqli_fetch_assoc($res3);
                }
            }else if($n==1){
        //        echo '2';
                $sql = "update dor_nums set id2=$obj[Sno] where campus='$obj4[campus]' and building='$obj4[building]' and room=$obj4[room]";
                $ret = mysqli_query($link, $sql);
                $sql1 = "insert into dormitory(campus,building,room,Sdepartment,Smajor,Sclass,Sno,Sname,Ssex,Saddress) values ('$obj4[campus]','$obj4[building]',$obj4[room],'$obj[Sdepartment]', '$obj[Smajor]', '$obj[Sclass]',$obj[Sno], '$obj[Sname]', '$obj[Ssex]','$obj[Saddress]')";
                $ret1 = mysqli_query($link, $sql1);
                $obj = mysqli_fetch_assoc($res1);
                if(!$obj){
                    $obj = mysqli_fetch_assoc($res3);
                }
            }else if($n==2){
        //        echo '3';
                $sql = "update dor_nums set id3=$obj[Sno] where campus='$obj4[campus]' and building='$obj4[building]' and room=$obj4[room]";
                $ret = mysqli_query($link, $sql);
                $sql1 = "insert into dormitory(campus,building,room,Sdepartment,Smajor,Sclass,Sno,Sname,Ssex,Saddress) values ('$obj4[campus]','$obj4[building]',$obj4[room],'$obj[Sdepartment]', '$obj[Smajor]', '$obj[Sclass]',$obj[Sno], '$obj[Sname]', '$obj[Ssex]','$obj[Saddress]')";
                $ret1 = mysqli_query($link, $sql1);
                $obj = mysqli_fetch_assoc($res1);
                if(!$obj){
                    $obj = mysqli_fetch_assoc($res3);
                }
            }else if($n==3){
        //        echo '4';
                $sql = "update dor_nums set id4=$obj[Sno] where campus='$obj4[campus]' and building='$obj4[building]' and room=$obj4[room]";
                $ret = mysqli_query($link, $sql);
                $sql1 = "insert into dormitory(campus,building,room,Sdepartment,Smajor,Sclass,Sno,Sname,Ssex,Saddress) values ('$obj4[campus]','$obj4[building]',$obj4[room],'$obj[Sdepartment]', '$obj[Smajor]', '$obj[Sclass]',$obj[Sno], '$obj[Sname]', '$obj[Ssex]','$obj[Saddress]')";
                $ret1 = mysqli_query($link, $sql1);
                $obj = mysqli_fetch_assoc($res3);
                if(!$obj){
                    $obj = mysqli_fetch_assoc($res1);
                }
            }
            $i++;  
        //    var_dump($obj);
        }

        $sql = "select * from dormitory where Sdepartment='$department' and campus='$campus' and building='$building'";
        $obj = mysqli_query($link, $sql);

        while($row=mysqli_fetch_assoc($obj)){
            $rows[]=$row;
        }

        echo json_encode($rows,JSON_UNESCAPED_UNICODE);
        mysqli_close($link);
    }
    
    
    
}else{
    $sql = "select * from dormitory where Sdepartment='$department' and campus='$campus' and building='$building'";
    $obj = mysqli_query($link, $sql);

    while($row=mysqli_fetch_assoc($obj)){
        $rows[]=$row;
    }

    echo json_encode($rows,JSON_UNESCAPED_UNICODE);
    mysqli_close($link);

}







