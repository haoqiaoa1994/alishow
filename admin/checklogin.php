<meta charset="utf-8">
<?php 
//1. 接收表单数据
$email = $_POST['email'];
$pwd = $_POST['pwd'];
if(empty($email)){
   echo "邮箱不能为空";
   header('Refresh:2;url=login.html');
   die;
}
if(empty($pwd)){
   echo "邮箱不能为空";
   header('Refresh:2;url=login.html');
   die;
}

//2. 实例化Mysqli类
$mysqli = new Mysqli('localhost', 'root', 'root', 'alishow');
$mysqli->set_charset('utf8');

//3. 编写SQL语句
//① 根据用户名查询数据
$sql = "select * from ali_user where user_email='$email'";
//② 执行SQL语句
$result = $mysqli->query($sql);
//③ 转换为一维数组  
//fetch_row
//fetch_assoc
//fetch_all(MYSQLI_ASSOC)
$user_info = $result->fetch_assoc();

//④ 判断$user_info中是否有email
if(empty($info)){
    echo "您的用户名不正确，请重新登录";
    header('Refresh:2;url=login.html');
    exit;
} else {
    //当email验证成功后，马上验证密码
    if($user_info['user_pwd'] == md5($pwd)){
        //登录成功后，马上注册session
        session_start();
        $_SESSION['id'] = $user_info['user_id'];
        $_SESSION['email'] = $user_info['user_email'];
        $_SESSION['nickname'] = $user_info['user_nickname'];

        //当密码验证成功时，则为正常登录
        echo "登录成功";
        header('Refresh:2;url=index.php');
        exit;
    } else {
        echo "您的密码不正确,请重新登录";
        header('Refresh:2;url=login.html');
        exit;
    }
}



?>