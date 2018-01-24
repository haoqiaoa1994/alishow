<?php
//设置浏览器响应
header('Content-type:text/html;charset=utf-8');
//1. 接收表单数据
$name = $_POST['name'];
$slug = $_POST['slug'];
$icon = $_POST['icon'];
$state = $_POST['state'];
$show = $_POST['show'];

//2. 实例化Mysqli类
$mysqli = new Mysqli('localhost', 'root', 'root', 'alishow');
//3. 设置字符集--必须在执行SQL语句之前来设置字符集
$mysqli->set_charset('utf8');
//4. 编写SQL语句
$sql = "insert into ali_cate(cate_name,cate_slug,cate_icon,cate_state,cate_show) values('$name', '$slug',  '$icon', $state, $show)";
//5. 执行SQL语句 --- 执行增删改返回布尔值
$result = $mysqli->query($sql);

//6. 判断结果
if($result){
    echo "添加新分类成功";
    header('Refresh:2;url=categories.php');
} else {
    echo "添加新分类失败";
    header('Refresh:2;url=addCate.php');
}
?>