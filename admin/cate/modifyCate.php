<?php 
header('Content-Type:text/html;charset=utf-8');
//1. 接收表单提交数据
$id = $_POST['id'];
$name = $_POST['name'];
$slug = $_POST['slug'];
$icon = $_POST['icon'];
$state = $_POST['state'];
$show = $_POST['show'];

//2. 实例化Mysqli类
$mysqli = new Mysqli('localhost', 'root', 'root', 'alishow');

//3. 设置字符集
$mysqli->set_charset('utf8');

//4. 编写SQL语句
$sql = "update ali_cate set cate_name='$name',cate_slug='$slug',cate_icon='$icon',cate_state=$state,cate_show=$show where cate_id=$id";

//5. 执行SQL
$result = $mysqli->query($sql);

//6. 判断结果，显示信息并跳转
if($result){
    echo "修改分类信息成功";
    header('Refresh:2;url=categories.php');
} else {
    echo "修改分类信息失败";
    header('Refresh:2;url=editCate.php?id='.$id);
}
?>