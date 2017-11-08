<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:64:"E:\wamp64\www\cms\public/../app/admin\view\auth_group\index.html";i:1504895605;s:52:"E:\wamp64\www\cms\public/../app/admin\view\base.html";i:1509606784;}*/ ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CanCMS Admin | </title>

    <!-- Bootstrap -->
    <link href="/static/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/static/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/static/css/nprogress.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="/static/css/pnotify.css" rel="stylesheet">
    <link href="/static/css/pnotify.buttons.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/static/css/custom.min.css" rel="stylesheet">
    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-pagelines"></i> <span>CanCMS!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="/uploads/avatar/<?php echo cookie('avatar'); ?>" alt="avatar" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo cookie('name'); ?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Back End</h3>
                <ul class="nav side-menu">
                  <?php if(is_array($trees) || $trees instanceof \think\Collection || $trees instanceof \think\Paginator): $i = 0; $__LIST__ = $trees;if( count($__LIST__)==0 ) : echo "no recode" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['ismenu'] == '1'): if($vo['count'] == '1'): ?>
                  <li><a><i class="<?php echo $vo['icon']; ?>"></i><?php echo $vo['title']; ?> <span class="fa fa-chevron-down">
                  </span></a>
                    <ul class="nav child_menu">
                    <?php if(is_array($trees) || $trees instanceof \think\Collection || $trees instanceof \think\Paginator): $i = 0; $__LIST__ = $trees;if( count($__LIST__)==0 ) : echo "no recode" ;else: foreach($__LIST__ as $key=>$sm): $mod = ($i % 2 );++$i;if($vo['ismenu'] == '1'): if($sm['pid'] == $vo['id']): ?>
                    <li><a href="<?php echo url($sm['name']); ?>"><?php echo $sm['title']; ?></a></li>
                    <?php endif; endif; endforeach; endif; else: echo "no recode" ;endif; ?>
                    </ul>
                  </li>
                  <?php endif; endif; endforeach; endif; else: echo "no recode" ;endif; ?>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Front End</h3>
                <ul class="nav side-menu">
                  <li><a href="#"><i class="fa fa-cog"></i> 站点配置 </a></li>
                  <li><a><i class="fa fa-list-alt"></i> 导航管理 </a></li>
                  <li><a><i class="fa fa-cubes"></i> Bannner管理 </a></li>                  
                  <li><a href="#"><i class="fa fa-link"></i> 友情链接 </a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="/uploads/avatar/<?php echo cookie('avatar'); ?>" alt=""><?php echo cookie('name'); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo url('user/edit',['id'=>cookie('uid')]); ?>"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="<?php echo url('login/logout',['id'=>cookie('uid')]); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="/uploads/avatar/<?php echo cookie('avatar'); ?>" alt="Profile Image" /></span>
                        <span>
                          <span><?php echo cookie('name'); ?></span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php echo $page_title; ?></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>
<a class="btn btn-primary" href="<?php echo url('create'); ?>"><i class="fa fa-plus"></i> <?php echo \think\Lang::get('create'); ?></a>
</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      
<table class="table table-striped jambo_table">
  <thead>
    <tr>
      <th>ID</th>
      <th><?php echo \think\Lang::get('group_title'); ?></th>
      <th><?php echo \think\Lang::get('status'); ?></th>
      <th><?php echo \think\Lang::get('control'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <tr>
      <td><?php echo $vo['id']; ?></td>
      <td><?php echo $vo['title']; ?></td>
      <td><?php echo !empty($vo['status'])?'<i class="fa fa-check-circle-o green"></i>':'<i class="fa fa-times-circle-o red"></i>'; ?></td>
      <td>
        <a href="<?php echo url('member',['id'=>$vo['id']]); ?>" class="btn btn-warning btn-xs edit"><i class="fa fa-edit"></i> <?php echo \think\Lang::get('group_member'); ?></a>
        <a href="<?php echo url('edit',['id'=>$vo['id']]); ?>" class="btn btn-primary btn-xs edit"><i class="fa fa-edit"></i> <?php echo \think\Lang::get('edit'); ?></a>
        <a href="javascript:void(0)" title='<?php echo $vo['id']; ?>' data-dismiss="alert" class="btn btn-danger btn-xs delete"><i class="fa fa-close"></i> <?php echo \think\Lang::get('delete'); ?></a> 
      </td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
  </tbody>
</table>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    

    <!-- jQuery -->
    <script src="/static/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/static/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/static/js/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/static/js/nprogress.js"></script>
    <!-- PNotify -->
    <script src="/static/js/pnotify.js"></script>
    <script src="/static/js/pnotify.buttons.js"></script>
    <script src="/static/js/pnotify.confirm.js"></script>
    <!-- AjaxSubmit by CanWong -->
    <script src="/static/js/ajaxsubmit.js"></script>
    
<script type="text/javascript">
  $(document).ready(function(){ ajaxdelete("<?php echo url('delete'); ?>")});
</script>

    <!-- Custom Theme Scripts -->
    <script src="/static/js/custom.js"></script>
  </body>
</html>
