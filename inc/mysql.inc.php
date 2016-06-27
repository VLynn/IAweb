<?php
/**
 * Created by PhpStorm.
 * User: lynn
 * Date: 16/6/25
 * Time: 下午8:22
 */

//数据库连接
function connect($host=DB_HOST, $user=DB_USER, $password=DB_PASSWORD, $database=DB_DATABASE, $port=DB_PORT) {
    $link = mysqli_connect($host, $user, $password, $database, $port);
    //mysqli_connect_errno()返回最后一次调用mysqli_connect()产生的错误代码, 如果没有错误返回0
    if(mysqli_connect_errno($link)) {
        exit(mysqli_connect_error($link));
    }
    mysqli_set_charset($link, 'utf8');
    return $link;
}

//执行一条数据库查询,返回查询结果集或者布尔值
function query($link, $query) {
    $result = mysqli_query($link, $query);
    if(mysqli_errno($link)) {
        exit(mysqli_error($link));
    }
    return $result;
}

//执行一条SQL语句，只会返回布尔值
function query_bool($link,$query){
    $bool=mysqli_real_query($link,$query);
    if(mysqli_errno($link)){
        exit(mysqli_error($link));
    }
    return $bool;
}

//一次性执行多条SQL语句
/*
 一次性执行多条SQL语句
$link：连接
$arr_sqls：数组形式的多条sql语句
$error：传入一个变量，里面会存储语句执行的错误信息
使用案例：
$arr_sqls=array(
	'select * from sfk_father_module',
	'select * from sfk_father_module',
	'select * from sfk_father_module',
	'select * from sfk_father_module'
);
var_dump(execute_multi($link, $arr_sqls,$error));
echo $error;
*/
function execute_multi($link,$arr_sqls,&$error){
    $sqls=implode(';',$arr_sqls).';';
    if(mysqli_multi_query($link,$sqls)){
        $data=array();
        $i=0;//计数
        do {
            if($result=mysqli_store_result($link)){
                $data[$i]=mysqli_fetch_all($result);
                mysqli_free_result($result);
            }else{
                $data[$i]=null;
            }
            $i++;
            if(!mysqli_more_results($link)) break;
        }while (mysqli_next_result($link));
        if($i==count($arr_sqls)){
            return $data;
        }else{
            $error="sql语句执行失败：<br />&nbsp;数组下标为{$i}的语句:{$arr_sqls[$i]}执行错误<br />&nbsp;错误原因：".mysqli_error($link);
            return false;
        }
    }else{
        $error='执行失败！请检查首条语句是否正确！<br />可能的错误原因：'.mysqli_error($link);
        return false;
    }
}

//获取记录数
function num($link,$sql_count){
    $result=execute($link,$sql_count);
    $count=mysqli_fetch_row($result);
    return $count[0];
}

//数据入库之前进行转义，确保，数据能够顺利的入库

//关闭与数据库的连接
function close($link){
    mysqli_close($link);
}
?>

