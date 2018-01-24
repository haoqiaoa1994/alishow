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
//1. 接收cate_id
$cate_id = $_GET['id'];
//2. 实例化Mysqli类
$mysqli = new Mysqli('localhost', 'root', 'root', 'alishow');
//3. 编写SQL语句
$sql = "select * from ali_cate where cate_id=$cate_id";
//4. 执行SQL语句
$result = $mysqli->query($sql);
//print_r($result);
//5. 调用fetch_arow方法获取数据 --- 一维索引数组
$cate_info = $result->fetch_row();
//print_r($cate_info);
?>
      <div class="row">
        <div class="col-md-4">
          <form action="modifyCate.php" method="post">
            <h2>添加新分类目录</h2>
            <input type="hidden" name="id" value="<?php echo $cate_info[0];?>" />
            <div class="form-group">
              <label for="name">名称</label>
              <input id="name" class="form-control" name="name" type="text" value="<?php echo $cate_info[1];?>">
            </div>
            <div class="form-group">
              <label for="slug">别名</label>
              <input id="slug" class="form-control" name="slug" type="text" value="<?php echo $cate_info[2];?>">
            </div>
            <div class="form-group">
              <label for="slug">图标</label>
              <input id="slug" class="form-control" name="icon" type="text" value="<?php echo $cate_info[3];?>">
            </div>
            <div class="form-group">
              <label for="slug">状态</label>
              <?php if($cate_info[4] == 1):?>
                <input name="state" type="radio" value="1" checked>启用
                <input name="state" type="radio" value="2">禁用
              <?php else:?>
                <input name="state" type="radio" value="1">启用
                <input name="state" type="radio" value="2" checked>禁用
              <?php endif;?>
            </div>
            <div class="form-group">
              <label for="slug">是否显示</label>
              <?php if($cate_info[5] == 1): ?>
                <input name="show" type="radio" value="1" checked>显示
                <input name="show" type="radio" value="2">不显示
              <?php else: ?>
                <input name="show" type="radio" value="1" >显示
                <input name="show" type="radio" value="2" checked>不显示
              <?php endif;?>
            </div>
            <div class="form-group">
              <button class="btn btn-primary" type="submit">修改</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="aside">
    <div class="profile">
      <img class="avatar" src="../../uploads/avatar.jpg">
      <h3 class="name">布头儿</h3>
    </div>
    <ul class="nav">
      <li>
        <a href="index.html"><i class="fa fa-dashboard"></i>仪表盘</a>
      </li>
      <li class="active">
        <a href="#menu-posts" data-toggle="collapse">
          <i class="fa fa-thumb-tack"></i>文章<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-posts" class="collapse in">
          <li><a href="posts.html">所有文章</a></li>
          <li><a href="post-add.html">写文章</a></li>
          <li class="active"><a href="categories.html">分类目录</a></li>
        </ul>
      </li>
      <li>
        <a href="comments.html"><i class="fa fa-comments"></i>评论</a>
      </li>
      <li>
        <a href="users.html"><i class="fa fa-users"></i>用户</a>
      </li>
      <li>
        <a href="#menu-settings" class="collapsed" data-toggle="collapse">
          <i class="fa fa-cogs"></i>设置<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-settings" class="collapse">
          <li><a href="nav-menus.html">导航菜单</a></li>
          <li><a href="slides.html">图片轮播</a></li>
          <li><a href="settings.html">网站设置</a></li>
        </ul>
      </li>
    </ul>
  </div>

  <script src="../../assets/vendors/jquery/jquery.js"></script>
  <script src="../../assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
</body>
</html>
