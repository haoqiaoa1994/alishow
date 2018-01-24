<?php 
header('Content-Type:text/html;charset=utf-8');
//1. 接收id
$cate_id = $_GET['id'];
//2. 实例化Mysqli类
$mysqli = new Mysqli('localhost', 'root', 'root', 'alishow');
//3. 编写SQL语句
$sql = "delete from ali_cate where cate_id=$cate_id";
//4. 执行SQL语句
$result = $mysqli->query($sql);
//5. 判断删除结果，显示信息并跳转
if($result){
    echo "删除分类成功";  
} else {
    echo "删除分类失败";
}
header('Refresh:2;url=categories.php');
?>