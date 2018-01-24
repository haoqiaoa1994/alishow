<?php 
//1. 接收user_id
$id = $_POST['id'];

//2. 实例化Mysqli类
$mysqli = new Mysqli('localhost', 'root', 'root', 'alishow');
$mysqli->set_charset('utf8');

//3. 编写SQL语句并执行
$sql = "delete from ali_user where user_id=$id";
$result = $mysqli->query($sql);

//4. 判断执行结果
if($result){
    echo 1;
} else {
    echo 2;
}
?>