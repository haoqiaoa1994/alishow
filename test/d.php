<?php 
header('Content-type:text/html;charset=utf8'); 
$mysqli = new Mysqli('localhost', 'root', 'root', 'alishow');
$mysqli->set_charset('utf8');

//查询单条数据的SQL语句
$sql = "select * from ali_cate where cate_id=1";
$result = $mysqli->query($sql);

//从$result对象中获取数据的方法有两种
// fetch_assoc 以关联数组形式返回数据  一维数组
// fetch_row  以索引数组形式返回数据  一维数组
//$info = $result->fetch_assoc();
$info = $result->fetch_row();
print_r($info);
?>