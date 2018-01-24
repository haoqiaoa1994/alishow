<?php 
//1.接收表单数据
$id = $_POST['id'];
$email = $_POST['email'];
$slug = $_POST['slug'];
$nickname = $_POST['nickname'];
$password = md5($_POST['password']);
$state = $_POST['state'];

//2.实例化Mysqli类
$mysqli = new Mysqli('localhost', 'root', 'root', 'alishow');
$mysqli->set_charset('utf8');

//3. 编写SQL语句并执行
$sql = "update ali_user set user_email='$email',user_slug='$slug',user_nickname='$nickname',user_pwd='$password',user_state=$state where user_id=$id";
$result = $mysqli->query($sql);

//4. 判断结果
if($result){
    echo 1;
} else {
    echo 2;
}
?>