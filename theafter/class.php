<?php

header("Content-type:text/html;charset=utf-8");
include 'db.php';

//    var_dump($_POST);
$Smajor = $_POST['Smajor'];
$num = $_POST['num'];


$link = connect();

$sql4 = "select * from academic where Smajor='$Smajor'";
$res4 = mysqli_query($link, $sql4);
$nums4 = mysqli_num_rows($res4);
//var_dump($nums4);

if($nums4==0){
    $sql = "select * from student where Smajor='$Smajor' and Ssex='男'";
    $sql1 = "select * from student where Smajor='$Smajor' and Ssex='女'";
    $res = mysqli_query($link, $sql);
    $res1 = mysqli_query($link, $sql1);
    
    

    $nums = mysqli_num_rows($res);

    $nums1 = mysqli_num_rows($res1);
    
//    var_dump($nums);
//    var_dump($nums1);

    if(($nums+$nums1)<=$num){
        $k=1;
        for($i=0;$i<$nums;$i++){
            $obj = mysqli_fetch_assoc($res);
        //       echo $obj['Sdepartment'];
            $Sno = '0121510880'.$obj['SdepID'].$k;
            $sql = "insert into academic(Sdepartment,Smajor,Sclass,Sno,Sname,Ssex,Saddress) values ('$obj[Sdepartment]', '$obj[Smajor]', '$obj[Smajor]"."1班',$Sno, '$obj[Sname]', '$obj[Ssex]','$obj[Saddress]')";
            $ret = mysqli_query($link, $sql);
            $sql = "insert into studentuser(Sno,password) values ($Sno,'111')";
            $ret = mysqli_query($link, $sql);
            $sql = "update student set Sclass='$obj[Smajor]"."1班',Sno=$Sno where Snu=$obj[Snu]";
            $ret = mysqli_query($link, $sql);
            $sql = "update aca_nums set logic='已分配' where Smajor='$Smajor'";
            $ret = mysqli_query($link, $sql);
            $k++;
        //       var_dump($ret);  
        }
        for($i=0;$i<$nums1;$i++){
            $obj = mysqli_fetch_assoc($res1);
        //       echo $obj['Sdepartment'];
            $Sno = '0121510880'.$obj['SdepID'].$k;
            $sql = "insert into academic(Sdepartment,Smajor,Sclass,Sno,Sname,Ssex,Saddress) values ('$obj[Sdepartment]', '$obj[Smajor]', '$obj[Smajor]"."1班',$Sno, '$obj[Sname]', '$obj[Ssex]','$obj[Saddress]')";
            $ret = mysqli_query($link, $sql);
            $sql = "insert into studentuser(Sno,password) values ($Sno,'111')";
            $ret = mysqli_query($link, $sql);
            $sql = "update student set Sclass='$obj[Smajor]"."1班',Sno=$Sno where Snu=$obj[Snu]";
            $ret = mysqli_query($link, $sql);
            $sql = "update aca_nums set logic='已分配' where Smajor='$Smajor'";
            $ret = mysqli_query($link, $sql);
            $k++;
        //       var_dump($ret);  
        }
    }else{
        $classnum = intval(floor(($nums+$nums1)/$num));

        $n = $nums%$classnum;
        $m = $nums1%$classnum;
        $k=1;

        //男生分班
        for($i=0;$i<$classnum;$i++){
            for($j=0;$j<intval(floor($nums/$classnum));$j++){
                $obj = mysqli_fetch_assoc($res);
            //       echo $obj['Sdepartment'];
                $Sno = '0121510880'.$obj['SdepID'].$k;
                $l=$i+1;
                $sql = "insert into academic(Sdepartment,Smajor,Sclass,Sno,Sname,Ssex,Saddress) values ('$obj[Sdepartment]', '$obj[Smajor]', '$obj[Smajor]$l"."班',$Sno, '$obj[Sname]', '$obj[Ssex]','$obj[Saddress]')";
                $ret = mysqli_query($link, $sql);
                $sql = "insert into studentuser(Sno,password) values ($Sno,'111')";
                $ret = mysqli_query($link, $sql);
                $sql = "update student set Sclass='$obj[Smajor]"."1班',Sno=$Sno where Snu=$obj[Snu]";
                $ret = mysqli_query($link, $sql);
                $sql = "update aca_nums set logic='已分配' where Smajor='$Smajor'";
                $ret = mysqli_query($link, $sql);
                $k++;
            //       var_dump($ret);
            }   
        }

        for($i=0;$i<$n;$i++){
            $obj = mysqli_fetch_assoc($res);
        //       echo $obj['Sdepartment'];
            $Sno = '0121510880'.$obj['SdepID'].$k;
            $l=$i+1;
            $sql = "insert into academic(Sdepartment,Smajor,Sclass,Sno,Sname,Ssex,Saddress) values ('$obj[Sdepartment]', '$obj[Smajor]', '$obj[Smajor]$l"."班',$Sno, '$obj[Sname]', '$obj[Ssex]','$obj[Saddress]')";
            $ret = mysqli_query($link, $sql);
            $sql = "insert into studentuser(Sno,password) values ($Sno,'111')";
            $ret = mysqli_query($link, $sql);
            $sql = "update student set Sclass='$obj[Smajor]"."1班',Sno=$Sno where Snu=$obj[Snu]";
            $ret = mysqli_query($link, $sql);
            $sql = "update aca_nums set logic='已分配' where Smajor='$Smajor'";
            $ret = mysqli_query($link, $sql);
            $k++;
        //    var_dump($ret);
        }


        //女生分班
        for($i=0;$i<$classnum;$i++){
            for($j=0;$j<intval(floor($nums1/$classnum));$j++){
                $obj = mysqli_fetch_assoc($res1);
            //       echo $obj['Sdepartment'];
                $Sno = '0121510880'.$obj['SdepID'].$k;
                $l=$i+1;
                $sql = "insert into academic(Sdepartment,Smajor,Sclass,Sno,Sname,Ssex,Saddress) values ('$obj[Sdepartment]', '$obj[Smajor]', '$obj[Smajor]$l"."班',$Sno, '$obj[Sname]', '$obj[Ssex]','$obj[Saddress]')";
                $ret = mysqli_query($link, $sql);
                $sql = "insert into studentuser(Sno,password) values ($Sno,'111')";
                $ret = mysqli_query($link, $sql);
                $sql = "update student set Sclass='$obj[Smajor]"."1班',Sno=$Sno where Snu=$obj[Snu]";
                $ret = mysqli_query($link, $sql);
                $sql = "update aca_nums set logic='已分配' where Smajor='$Smajor'";
                $ret = mysqli_query($link, $sql);
                $k++;
            //       var_dump($ret);
            }
        
        }

        for($i=0;$i<$m;$i++){
            $obj = mysqli_fetch_assoc($res1);
        //       echo $obj['Sdepartment'];
            $Sno = '0121510880'.$obj['SdepID'].$k;
            $k = $m-$i;
            $sql = "insert into academic(Sdepartment,Smajor,Sclass,Sno,Sname,Ssex,Saddress) values ('$obj[Sdepartment]', '$obj[Smajor]', '$obj[Smajor]$k"."班',$Sno, '$obj[Sname]', '$obj[Ssex]','$obj[Saddress]')";
            $ret = mysqli_query($link, $sql);
            $sql = "insert into studentuser(Sno,password) values ($Sno,'111')";
            $ret = mysqli_query($link, $sql);
            $sql = "update student set Sclass='$obj[Smajor]"."1班',Sno=$Sno where Snu=$obj[Snu]";
            $ret = mysqli_query($link, $sql);
            $sql = "update aca_nums set logic='已分配' where Smajor='$Smajor'";
            $ret = mysqli_query($link, $sql);
            $k++;
        //    var_dump($ret);
        }

        
    }
    $sql = "select * from academic where Smajor='$Smajor'";
    $obj = mysqli_query($link, $sql);


    while($row=mysqli_fetch_assoc($obj)){
        $rows[]=$row;
    }

    echo json_encode($rows,JSON_UNESCAPED_UNICODE);
    mysqli_close($link);
    
}else{
//    echo "<script> alert('添加成功');</script>";
//    $sql = "select * from academic where Smajor='$Smajor'";
//    $obj = mysqli_query($link, $sql);
//
//
//    while($row=mysqli_fetch_assoc($obj)){
//        $rows[]=$row;
//    }
    echo json_encode("1",JSON_UNESCAPED_UNICODE);
//    echo json_encode($rows,JSON_UNESCAPED_UNICODE);
    mysqli_close($link);
}



