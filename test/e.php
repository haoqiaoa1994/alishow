<?php 
//PHP数组分为 索引数组和关联数组两种
//索引数组: 下标是数字的数组
//关联数组: 下标是字符串的数组

$arr = array('aaa', 'bbb', 'ccc'); //索引数组
$arr = array(0=>'aaa', 1=>'bbb', 2=>'ccc');

$info = array('id'=>1001, 'name'=>'zs', 'age'=>20);

//二维数组: 一维数组的单元中保存了另一个数组
$arr = array(
    0=>array('id'=>1001, 'name'=>'zs', 'age'=>20),
    1=>array('id'=>1002, 'name'=>'ls', 'age'=>21),
    2=>array('id'=>1003, 'name'=>'ww', 'age'=>22)
);
$arr[2]['name']
?>