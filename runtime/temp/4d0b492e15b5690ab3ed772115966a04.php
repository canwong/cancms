<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:59:"E:\wamp64\www\cms\public/../app/admin\view\login\index.html";i:1504917608;}*/ ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CanCMS Admin Login</title>

    <!-- Bootstrap -->
    <link href="/static/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/static/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/static/css/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="/static/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/static/css/custom.min.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="/static/css/pnotify.css" rel="stylesheet">
    <link href="/static/css/pnotify.buttons.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form class="ajax-form" method="post">
              <h1><?php echo \think\Lang::get('login_form'); ?></h1>
              <div class="form-group has-feedback">
                <input type="text" name="username" class="form-control has-feedback-right" placeholder="<?php echo \think\Lang::get('username'); ?>" required="" />
                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control has-feedback-right" placeholder="<?php echo \think\Lang::get('password'); ?>" required="" />
                <span class="fa fa-lock form-control-feedback right" aria-hidden="true"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="text" name="code" class="form-control has-feedback-right" placeholder="<?php echo \think\Lang::get('captcha'); ?>">
                <span class="fa fa-qrcode form-control-feedback right" aria-hidden="true"></span>
              </div>
              <div>
                <img src="<?php echo captcha_src(); ?>" id="code" alt="captcha" onclick="this.src='<?php echo captcha_src(); ?>?rnd=' + Math.random();" />
              </div>
              <div class="clearfix"></div>

              <div class="separator">
                <div>
                  <button type="button" class="btn btn-default submit"><?php echo \think\Lang::get('login'); ?></button>
                </div>

                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Welcome!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
    <!-- jQuery -->
    <script src="/static/js/jquery.min.js"></script>
    <!-- PNotify -->
    <script type="text/javascript" src="/static/js/pnotify.js"></script>
    <script type="text/javascript" src="/static/js/pnotify.buttons.js"></script>
    <script type="text/javascript">
      $('.submit').on('click',function(){
        $.ajax({
          url:"<?php echo url('login/login'); ?>",
          type:'post',
          data:$('.ajax-form').serialize(),
          success:function(response){
            new PNotify({
              text:response.msg,
              type:response.code==1?'success':'',
              styling:'fontawesome'
            });
            /*倒数三秒跳转*/
            if (response.code==1) {
              setTimeout(function(){window.location.href="<?php echo url('index/index'); ?>"},3000);
            }
          },
          error:function(data){
            new PNotify({
              text:'Opps~something went wrong',
              type:'error',
              styling:'fontawesome'
            })
          }
        })
      })
    </script>
  </body>
</html>
