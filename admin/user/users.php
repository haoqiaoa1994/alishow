<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Users &laquo; Admin</title>
  <link rel="stylesheet" href="../../assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../../assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../../assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="../../assets/css/admin.css">
  <script src="../../assets/vendors/nprogress/nprogress.js"></script>
  <script type="text/javascript" src="../../assets/jquery.1.11.js"></script>
  <script type="text/javascript" src="../../assets/layer/layer.js"></script>
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
        <h1>用户</h1>
        <input type="button" value="添加新用户" onclick="adduser()" />
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <div class="row">
<?php
//1. 实例化Mysqli类
$mysqli = new Mysqli('localhost', 'root', 'root', 'alishow');

//2. 设置字符集
$mysqli->set_charset('utf8');

//3. 编写SQL语句
$sql = "select * from ali_user";

//4. 执行SQL语句
$result = $mysqli->query($sql);

//5. 调用fetch_all方法将数据转为二维数组
$user_list = $result->fetch_all(MYSQLI_ASSOC);
?>
        <div class="col-md-8">
          <div class="page-action">
            <!-- show when multiple checked -->
            <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
          </div>
          <table class="table table-striped table-bordered table-hover">
            <thead>
               <tr>
                <th class="text-center" width="40"><input type="checkbox"></th>
                <th class="text-center" width="80">头像</th>
                <th>邮箱</th>
                <th>别名</th>
                <th>昵称</th>
                <th>状态</th>
                <th class="text-center" width="200">操作</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($user_list  as $value):?>
              <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td class="text-center"><img class="avatar" src="../../assets/img/default.png"></td>
                <td><?php echo $value['user_email'];?></td>
                <td><?php echo $value['user_slug'];?></td>
                <td><?php echo $value['user_nickname'];?></td>
                <td><?php echo $value['user_state'];?></td>
                <td class="text-center">
                  <a href="javascript:;" data="<?php echo $value['user_id'];?>" class="btn edit btn-default btn-xs">编辑</a>
                  <a href="javascript:;" data="<?php echo $value['user_id'];?>" class="btn del btn-danger btn-xs">删除</a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="aside">
    <?php include_once '../include/aside.php';?>
  </div>

  <script src="../../assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
  <script type="text/javascript">
    function adduser(){
      layer.ready(function(){
        //打开弹出层
        layer.open({
          type:2, //弹出层的类型
          title: '添加新用户', //弹出层的标题
          area: ['800px', '500px'], //弹出层的宽高
          maxmin:true,
          content: 'adduser.php' //弹出层中显示的内容
          //time: 1000
        });
      })
    }

    $('.del').click(function(){
      if(confirm('您确定删除该用户吗?')){
        //获取user_id
        var user_id = $(this).attr('data');
        //转存$(this)
        var _this = $(this);
        //发送ajax请求
        //deluser.php?id=3
        //参数4: 返回数据的类型 text(默认)  json  xml
        $.post('deluser.php', {'id':user_id}, function(msg){
          //判断删除结果
          if(msg == 1){
            alert('删除成功');
            _this.parent().parent().remove();
          } else {
            alert('删除失败');
          }
        }, 'text');
      }
      
    })

    $('.edit').click(function(){
      //获取user_id
      var user_id = $(this).attr('data');
      //弹出编辑表单
      layer.ready(function(){
        layer.open({
          'title':'修改用户信息',
          'type': 2,
          'maxmin': true,
          'area': ['800px', '500px'],
          //弹出层需要将user_id传过去，方便edituser.php查询用户信息
          'content': 'edituser.php?id='+user_id,
        });
      })
    })
  </script>
</body>
</html>
