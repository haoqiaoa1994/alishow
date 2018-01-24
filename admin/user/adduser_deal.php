<?php 
//1. 接收表单数据
$email = $_POST['email'];
$slug = $_POST['slug'];
$nickname = $_POST['nickname'];
$pwd = md5($_POST['password']);
$state = $_POST['state'];

//2. 实例化Mysqli类
$mysqli = new Mysqli('localhost', 'root', 'root', 'alishow');
$mysqli->set_charset('utf8');

//3. 编写SQL语句并执行
$sql = "insert into ali_uer values(null, '$email', '$slug', '$nickname', '$pwd', '', $state)";
echo $sql;die;
$result = $mysqli->query($sql);

//4. 判断$result,为前台返回结果信息
if($result){
    echo 1;
} else {
    echo 2;
}
?>