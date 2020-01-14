<?php
include ('db.php');
//取到前台传过来的数据
$user = $_GET['user'];
$password = $_GET['password'];
$per = $_GET['per'];

$link = connect ();
if($per==0){
    $sql = "select * from studentuser where Sno='$user' and password='$password'";
    $res = mysqli_query($link, $sql);
    if($result = mysqli_fetch_row($res)){
        setcookie('user',$user,time()+60*60,'/');
        setcookie('password',$password,time()+60*60,'/');
        // setcookie('user','',time()-1,'/');
        // setcookie('password','',time()-1,'/');
        // echo '成功';
        // var_dump($_COOKIE);
        echo "<script> alert('登录成功');parent.location.href='http://localhost/whutNSS/thebefore/studentMain.html'; </script>";
    }else{
        echo "<script> alert('登录失败');parent.location.href='http://localhost/whutNSS/thebefore/index.html'; </script>";
    }
}else{
    $sql = "select * from user where user='$user' and password='$password'";
    $res = mysqli_query($link, $sql);
//    $result = mysqli_fetch_assoc($res);
//    var_dump($result['per']);
    if($result = mysqli_fetch_assoc($res)){
        if($result['per']==1){
            setcookie('user',$user,time()+60*60,'/');
            setcookie('password',$password,time()+60*60,'/');
            setcookie('per','1',time()+60*60,'/');
            echo "<script> alert('登录成功');parent.location.href='http://localhost/whutNSS/thebefore/admin1Main.html'; </script>";
        }else if($result['per']==2){
            setcookie('user',$user,time()+60*60,'/');
            setcookie('password',$password,time()+60*60,'/');
            setcookie('per','2',time()+60*60,'/');
            echo "<script> alert('登录成功');parent.location.href='http://localhost/whutNSS/thebefore/admin2Main.html'; </script>";
        }else if($result['per']==3){
            setcookie('user',$user,time()+60*60,'/');
            setcookie('password',$password,time()+60*60,'/');
            setcookie('per','3',time()+60*60,'/');
            echo "<script> alert('登录成功');parent.location.href='http://localhost/whutNSS/thebefore/admin3Main.html'; </script>";
        }else if($result['per']==4){
            setcookie('user',$user,time()+60*60,'/');
            setcookie('password',$password,time()+60*60,'/');
            setcookie('per','4',time()+60*60,'/');
            echo "<script> alert('登录成功');parent.location.href='http://localhost/whutNSS/thebefore/admin4Main.html'; </script>";
        }else if($result['per']==5){
            setcookie('user',$user,time()+60*60,'/');
            setcookie('password',$password,time()+60*60,'/');
            setcookie('per','5',time()+60*60,'/');
            echo "<script> alert('登录成功');parent.location.href='http://localhost/whutNSS/thebefore/admin2Main.html'; </script>";
        }else{
            echo "<script> alert('登录失败');parent.location.href='http://localhost/whutNSS/thebefore/index.html'; </script>";
        }
    }else{
        echo "<script> alert('登录失败');parent.location.href='http://localhost/whutNSS/thebefore/index.html'; </script>";
    }
    
}
//解析得到索引数组$result,顺序对应为id,usrname,password,per
//展示
// while($result = mysqli_fetch_row($res)){
//     var_dump($result);
// }
// 
 


//while ($result = mysqli_fetch_row($res)) {
//    if($per == 0){
//        if($user == $result[1] && $password == $result[2]){
//            header("location:http://localhost/whutNSS/thebefore/studentMain.html");
//            exit();
//        }
//        else{
//            header("location:http://localhost/whutNSS/thebefore/index.html");
//        }
//    }else {
//        if($user == $result[1] && $password == $result[2]){
//            header("location:http://localhost/whutNSS/thebefore/admin1Main.html");
//            exit();
//        }
//        else{
//            // echo "4";
//            header("location:http://localhost/whutNSS/thebefore/index.html");
//        }
//    
//    }
//}
