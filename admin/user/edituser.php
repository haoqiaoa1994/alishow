<link rel="stylesheet" href="../../assets/vendors/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="../../assets/vendors/font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="../../assets/vendors/nprogress/nprogress.css">
<link rel="stylesheet" href="../../assets/css/admin.css">
<script src="../../assets/vendors/nprogress/nprogress.js"></script>
<script type="text/javascript" src="../../assets/jquery.1.11.js"></script>
<?php 
//1. 接收user_id
$id = $_GET['id'];
//2. 实例化Mysqli类
$mysqli = new Mysqli('localhost', 'root', 'root', 'alishow');
$mysqli->set_charset('utf8');
//3. 编写SQL语句并执行
$sql = "select * from ali_user where user_id=$id";
$result = $mysqli->query($sql);
//4. 调用fetch_assoc()方法，将结果转为一维关联数组
$user_info = $result->fetch_assoc();
?>
<div class="col-md-4">
  <form id="mainForm">
    <h2>修改用户信息</h2>
    <input type="hidden" name="id" value="<?php echo $user_info['user_id'];?>"/>
    <div class="form-group">
      <label for="email">邮箱</label>
      <input id="email" class="form-control" name="email" type="email" value="<?php echo $user_info['user_email'];?>">
    </div>
    <div class="form-group">
      <label for="slug">别名</label>
      <input id="slug" class="form-control" name="slug" type="text" value="<?php echo $user_info['user_slug'];?>">
    </div>
    <div class="form-group">
      <label for="nickname">昵称</label>
      <input id="nickname" class="form-control" name="nickname" type="text" value="<?php echo $user_info['user_nickname'];?>">
    </div>
    <div class="form-group">
      <label for="password">密码</label>
      <input id="password" class="form-control" name="password" type="text" value="<?php echo $user_info['user_pwd'];?>">
    </div>
    <div class="form-group">
      <label for="password">状态</label>
      <?php if($user_info['user_state'] == 1):?>
        <input class="state" name="state" type="radio" value="1" checked>激活
        <input class="state" name="state" type="radio" value="2">未激活
      <?php else:?>
        <input class="state" name="state" type="radio" value="1">激活
        <input class="state" name="state" type="radio" value="2" checked>未激活
      <?php endif;?>
    </div>
    <div class="form-group">
      <input id="btn" type="button" value="修改">
    </div>
  </form>
  <script type="text/javascript">
    $('#btn').on('click', function(){
      //1. 使用FormData对象获取表单数据
      //获取表单对象（dom对象）  $('#mainForm')[0]
      var fm = document.getElementById('mainForm');
      //实例化FormData对象，将表单对象作为参数传入
      var fd = new FormData(fm); //至此已经获取了表单中的所有数据
      //2. 发送ajax请求，将表单数据一起发送给后台PHP程序
      $.ajax({
        'url':'modifyuser.php',
        'type': 'post',
        'data': fd,
        'contentType': false,
        'processData': false,
        'success':function(msg){
          //判断修改结果
          if(msg == 1){
            alert('修改用户信息成功');
          } else {
            alert('修改用户信息失败');
          }
          var index = parent.layer.getFrameIndex(window.name);
          parent.layer.close(index);
          parent.location.reload();
        }
      });
    })

  </script>
</div>