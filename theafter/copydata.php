<?php
date_default_timezone_set('PRC');//设置时区
 
/*设置head头信息*/
ob_end_clean();//清除缓冲区,避免乱码
Header("Content-Type:application/vnd.ms-excel;charset=UTF-8");
Header("Accept-Ranges:bytes");
Header("Content-Disposition:attachment;filename="."新生信息表".date('YmdHis').".xls");
Header("Pragma:no-cache");
Header("Expires:0");
 
$str = $str2 = null;
/*设置表格信息*/
$str.= "序号"."\t";
$str.= "考生号"."\t";
$str.= "学号"."\t";
$str.= "姓名"."\t";
$str.= "性别"."\t";
$str.= "出生日期"."\t";
$str.= "籍贯"."\t";
$str.= "民族"."\t";
$str.= "身份证号"."\t";
$str.= "政治面貌"."\t";
$str.= "学院"."\t";
$str.= "专业"."\t";
$str.= "班级"."\t";
$str.= "报到情况"."\t";
$str.= "缴费情况"."\t\r\n";
$info = iconv("UTF-8","GBK",$str);
echo $info;
 
/*查询内容导出数据库数据*/
include 'db.php';
$link = connect();
//$con = new mysqli("localhost", "root", "password", "detabase");
//if (!$con) {
//    die(mysqli_error()) ;
//}
////$sql = " select * from bmxx";
////$res = mysqli_query($con, $sql);
// 
//mysqli_query($con,"SET NAMES utf8");//解决数据库中有汉字时显示在前台出现乱码问题
$sql ="select * from student";
$result = mysqli_query($link,$sql);
 
while($row = mysqli_fetch_assoc($result)){
    $list[] = $row;
}
mysqli_free_result($result);
mysqli_close($link);
$co = 1;
foreach($list as $v){
    $str2.= trim($co++)."\t";
    $str2.= trim(iconv("UTF-8","GBK","\t".$v['Snu']."\t"))."\t";
    $str2.= trim(iconv("UTF-8","GBK",$v['Sno']))."\t";
    $str2.= trim(iconv("UTF-8","GBK",$v['Sname']))."\t";
    $str2.= trim(iconv("UTF-8","GBK",$v['Ssex']))."\t";
    $str2.= trim(iconv("UTF-8","GBK",$v['Sbirth']))."\t";
    $str2.= trim(iconv("UTF-8","GBK",$v['Saddress']))."\t";
    $str2.= trim(iconv("UTF-8","GBK",$v['nation']))."\t";
    $str2.= trim(iconv("UTF-8","GBK",$v['IDnumber']))."\t";
    $str2.= trim(iconv("UTF-8","GBK",$v['Spol']))."\t";
    $str2.= trim(iconv("UTF-8","GBK",$v['Sdepartment']))."\t";
    $str2.= trim(iconv("UTF-8","GBK",$v['Smajor']))."\t";
    $str2.= trim(iconv("UTF-8","GBK",$v['Sclass']))."\t";
    $str2.= trim(iconv("UTF-8","GBK",$v['Sreg']))."\t";
    $str2.= trim(iconv("UTF-8","GBK",$v['pay']))."\t\r\n";
}
echo $str2;
