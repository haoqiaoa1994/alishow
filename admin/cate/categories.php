<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Categories &laquo; Admin</title>
  <link rel="stylesheet" href="../../assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../../assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../../assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="../../assets/css/admin.css">
  <script src="../../assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
  <script>NProgress.start()</script>

  <div class="main">
    <nav class="navbar">
      <button class="btn btn-default navbar-btn fa fa-bars"></button>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profile.html"><i class="fa fa-user"></i>个人中心</a></li>
        <li><a href="login.html"><i class="fa fa-sign-out"></i>退出</a></li>
      </ul>
    </nav>
    <div class="container-fluid">
      <div class="page-title">
        <h1>分类目录</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
<?php 
//1. 实例化Mysqli对象
$mysqli = new Mysqli('localhost', 'root', 'root', 'alishow');
//2. 编写SQL语句
$sql = "select * from ali_cate";
//3. 设置字符集
$mysqli->set_charset('utf8');
//4. 执行SQL语句,返回对象
$result = $mysqli->query($sql);
//5. 调用fetch_all属性获取查询结果---二维关联数组
$cate_list = $result->fetch_all(MYSQL_ASSOC);
//print_r($cate_list);die;
?>
      <div class="row">
        <div class="col-md-8">
          <div class="page-action">
            <!-- show when multiple checked -->
            <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
          </div>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center" width="40"><input type="checkbox"></th>
                <th>名称</th>
                <th>Slug</th>
                <th>图标</th>
                <th>状态</th>
                <th>是否显示</th>
                <th class="text-center" width="100">操作</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($cate_list as $value):?>
              <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td><?php echo $value['cate_name'];?></td>
                <td><?php echo $value['cate_slug'];?></td>
                <td><?php echo $value['cate_icon'];?></td>
                <td><?php echo ($value['cate_state']==1)?'启用':'禁用';?></td>
                <td><?php echo ($value['cate_show']==1)?'显示':'不显示';?></td>
                <td class="text-center">
                  <a href="editCate.php?id=<?php echo $value['cate_id'];?>" class="btn btn-info btn-xs">编辑</a>
                  <a href="delCate.php?id=<?php echo $value['cate_id'];?>" class="btn btn-danger btn-xs" onclick="return confirm('您确定要删除吗?')">删除</a>
                </td>
              </tr>
              <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="aside">
    <?php include_once '../include/aside.php';?>
  </div>

  <script src="../../assets/vendors/jquery/jquery.js"></script>
  <script src="../../assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
</body>
</html>
