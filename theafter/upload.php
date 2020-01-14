<?php
    header("Content-Type:text/html;charset=utf8"); 
    header("Access-Control-Allow-Origin: *"); //解决跨域
    header('Access-Control-Allow-Methods:GET');// 响应类型  
    header('Access-Control-Allow-Headers:*'); // 响应头设置 
//    $conn=mysql_connect("localhost","root","root"); 
//    mysql_select_db("ImportXlsx", $conn); //选择数据库
//    mysql_query("SET NAMES utf8");//解决中文乱码问题
		
//    set_time_limit(0);
//    error_reporting(0);
    include 'db.php';
    require_once dirname(__FILE__) . '/PHPExcel/PHPExcel.php';
    require_once dirname(__FILE__) . '/PHPExcel/PHPExcel/IOFactory.php';
    
    $link= connect();
//    var_dump($_FILES);
//    echo $_FILES["myfile"]["name"];echo "<br/>";//文件原名
    
    $excelpath = $_FILES["myfile"]["tmp_name"];
//    $excelpath='D:\wamp\www\whutNSS\thebefore\source\excel\whut.xlsx';
    $inputFileType = PHPExcel_IOFactory::identify($excelpath);
    $objReader = PHPExcel_IOFactory::createReader('excel2007'); //use Excel5 for 2003 format 
    $objPHPExcel = $objReader->load($excelpath); 
    $sheet = $objPHPExcel->getSheet(0); 
    $highestRow = $sheet->getHighestRow();           //取得总行数 
    $highestColumn = $sheet->getHighestColumn(); //取得总列数

    for($j=2;$j<=$highestRow;$j++)                        //从第二行开始读取数据
    { 	
        $str="";
        for($k='A';$k<=$highestColumn;$k++)            //从A列读取数据
        {  
            $str .=$objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue().'|*|';//读取单元格 
        } 
        $strs = explode("|*|",$str);
//        var_dump($strs);
//        echo $strs[2] . "<br />";
        $sql = "insert into student (Snu,Sname,Ssex,Sbirth,Saddress,nation,IDnumber,Spol,Sdepartment,Smajor,SdepID,per) values ($strs[0],'$strs[1]','$strs[2]',$strs[3],'$strs[4]','$strs[5]',$strs[6],'$strs[7]','$strs[8]','$strs[9]',$strs[10],$strs[11])";
//        $sql = "insert into student (Sno,Sname,Ssex,Sbirth,Saddress,nation,IDnumber,Spol) values ('9','不好','3','3','3','3','3','3')";
        $res = mysqli_query($link,$sql);
        if($res){
//            echo '成功';
            echo "<script> alert('上传成功');parent.location.href='http://localhost/whutNSS/thebefore/upload.html?yeshu=0'; </script>";
        }else{
//            echo '失败';
            echo "<script> alert('上传失败');parent.location.href='http://localhost/whutNSS/thebefore/upload.html?yeshu=0'; </script>";
        }
//        $result = @mysql_query($strsql);
    }
    mysqli_close($link);



