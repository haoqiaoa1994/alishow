<?php
header('Content-type:text/html;charset=utf8'); 
$mysqli = new Mysqli('localhost', 'root', 'root', 'alishow');
$mysqli->set_charset('utf8');
$sql = "select * from ali_cate";
$list = $mysqli->query($sql);
//print_r($result);
// $list = $result->fetch_all(MYSQLI_ASSOC);
//print_r($list);
?>
<table border="1" width="600">
    <?php foreach ($list as $value): ?>
        <tr>
            <td><?php echo $value['cate_id'];?></td>
            <td><?php echo $value['cate_name'];?></td>
            <td><?php echo $value['cate_slug'];?></td>
            <td><?php echo $value['cate_icon'];?></td>
            <td><?php echo $value['cate_state'];?></td>
            <td><?php echo $value['cate_show'];?></td>
        </tr>
    <?php endforeach; ?>
</table>