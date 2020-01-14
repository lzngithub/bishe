<?php

define('LOCALHOST','localhost');
define('USERNAME','root');
define('PASSWORD','123456');
define('CHARSEL','utf8');
define('DB','whutnns');

function connect () {
    $link = mysqli_connect(LOCALHOST,USERNAME,PASSWORD);
    if(!$link){
        exit('数据库链接失败');
    }
    mysqli_set_charset($link, CHARSEL);
    mysqli_select_db($link,DB);
    return $link;
} 
//var_dump(LOCALHOST);
//var_dump(PASSWORD);
   
?>