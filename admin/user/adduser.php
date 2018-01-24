<link rel="stylesheet" href="../../assets/vendors/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="../../assets/vendors/font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="../../assets/vendors/nprogress/nprogress.css">
<link rel="stylesheet" href="../../assets/css/admin.css">
<script src="../../assets/vendors/nprogress/nprogress.js"></script>
<script type="text/javascript" src="../../assets/jquery.1.11.js"></script>

<div class="col-md-4">
  <form id="mainForm">
    <h2>添加新用户</h2>
    <div class="form-group">
      <label for="email">邮箱</label>
      <input id="email" class="form-control" name="email" type="email" placeholder="邮箱">
    </div>
    <div class="form-group">
      <label for="slug">别名</label>
      <input id="slug" class="form-control" name="slug" type="text" placeholder="slug">
    </div>
    <div class="form-group">
      <label for="nickname">昵称</label>
      <input id="nickname" class="form-control" name="nickname" type="text" placeholder="昵称">
    </div>
    <div class="form-group">
      <label for="password">密码</label>
      <input id="password" class="form-control" name="password" type="text" placeholder="密码">
    </div>
    <div class="form-group">
      <label for="password">状态</label>
      <input class="state" name="state" type="radio" value="1">激活
      <input class="state" name="state" type="radio" value="2">未激活
    </div>
    <div class="form-group">
      <input id="btn" type="button" value="添加">
    </div>
  </form>
  <script type="text/javascript">
    $('#btn').on('click', function(){
      //1. 收集表单数据$('#mainForm')[0];
      var fm = document.getElementById('mainForm');
      var fd = new FormData(fm); 
      //2. 发送给后台PHP程序
      $.ajax({
        'url' : 'adduser_deal.php',
        'type': 'post', //使用FormData对象时，必须使用post方式
        'data': fd,
        'dataType': 'text',
        //如果使用FormData对象，额外增加下面两个配置项
        'contentType': false,
        'processData': false,
        'success': function(msg){
          alert(msg);
        }
      });
    })

  </script>
</div>