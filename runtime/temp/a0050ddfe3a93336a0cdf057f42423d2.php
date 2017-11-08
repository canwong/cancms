<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:57:"E:\wamp64\www\cms\public/../app/admin\view\user\edit.html";i:1509319151;s:52:"E:\wamp64\www\cms\public/../app/admin\view\base.html";i:1509310922;}*/ ?>
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
    
<!-- Switchery -->
<link href="/static/css/switchery.min.css" rel="stylesheet">
<!-- iCheck -->
<link href="/static/css/green.css" rel="stylesheet"> 
<!-- Cropper -->
<link href="/static/css/cropper.min.css" rel="stylesheet">
<!-- bootstrap-datetimepicker -->
<link href="/static/css/bootstrap-datetimepicker.css" rel="stylesheet">
<!-- bootstrap-wysiwyg -->
<link href="/static/css/prettify.min.css" rel="stylesheet">

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
                    <h2><?php echo $page_title; ?></h2>
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
                      
<div class="" role="tabpanel" data-example-id="togglable-tabs">
    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><?php echo \think\Lang::get('basic_info'); ?></a>
        </li>
        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"><?php echo \think\Lang::get('reset_psw'); ?></a>
        </li>
        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false"><?php echo \think\Lang::get('advance_info'); ?></a>
        </li>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
            <!-- start Basic Info Form -->
            <form class="ajax-form form-horizontal form-label-left" method="post" onsubmit="ajaxsubmit('#')">
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="avatar">
                        <?php echo \think\Lang::get('avatar'); ?>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <img id="avatar" class="img-thumbnail img-circle img-responsive" src="/uploads/avatar/<?php echo (isset($info->userInfo->avatar) && ($info->userInfo->avatar !== '')?$info->userInfo->avatar:'avatar.png'); ?>" style="max-width: 400px" alt="Click To Chang Avatar">
                    </div>
                </div>
                <div class="item form-group has-feedback">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="username" name="username" required="required" data-validate-length-range="6" class="form-control col-md-7 col-xs-12 has-feedback-left" readonly="readonly" value="<?php echo $info['username']; ?>">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="item form-group has-feedback">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="name" name="name" class="form-control col-md-7 col-xs-12 has-feedback-left" value="<?php echo $info['name']; ?>">
                        <span class="fa fa-credit-card form-control-feedback left" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="item form-group has-feedback">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" id="email" name="email" class="form-control col-md-7 col-xs-12 has-feedback-left" value="<?php echo $info['email']; ?>">
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="item form-group has-feedback">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="level"></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="tel" id="mobile" name="mobile" data-validate-length-range='7,20' class="form-control col-md-7 col-xs-12 has-feedback-left" value="<?php echo $info['mobile']; ?>">
                        <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ismenu"><?php echo \think\Lang::get('sex'); ?>:
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <label for="male">
                            <input class="flat" type="radio" id="male" name="sex" value="1" <?php if($info['sex'] == '1'): ?>checked<?php endif; ?>> <?php echo \think\Lang::get('male'); ?>
                        </label>
                        <label for="female">
                            <input class="flat" type="radio" id="female" name="sex" value="1" <?php if($info['sex'] == '0'): ?>checked<?php endif; ?>> <?php echo \think\Lang::get('female'); ?>
                        </label>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status"><?php echo \think\Lang::get('status'); ?><span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="checkbox" name="status" value="1" class="js-switch" <?php if($info['status'] == '1'): ?>checked<?php endif; ?>/>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <input type="hidden" name="id" value="<?php echo $info['id']; ?>">
                        <input type="hidden" name="action" value="basic">
                        <button type="reset" class="btn btn-primary"><?php echo \think\Lang::get('reset'); ?></button>
                        <button id="submit" type="submit" class="btn btn-success"><?php echo \think\Lang::get('submit'); ?></button>
                    </div>
                </div>
            </form>
            <!-- end Basic Info Form -->
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
            <!-- start Reset Password Form -->
            <form class="ajax-form-psw form-horizontal form-label-left" method="post" onsubmit="ajaxsubmit('#','.ajax-form-psw')">
                <div class="item form-group has-feedback">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" id="password" name="oldpassword" required="required" data-validate-length-range="6" class="form-control col-md-7 col-xs-12 has-feedback-left" placeholder="<?php echo \think\Lang::get('oldpassword'); ?>*">
                        <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="item form-group has-feedback">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" id="password" name="password" required="required" data-validate-length-range="6" class="form-control col-md-7 col-xs-12 has-feedback-left" placeholder="<?php echo \think\Lang::get('password'); ?>*">
                        <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="item form-group has-feedback">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password_confirm">
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" id="password_confirm" name="password_confirm" required="required" data-validate-length-range="6" class="form-control col-md-7 col-xs-12 has-feedback-left" data-validate-linked="password" placeholder="<?php echo \think\Lang::get('password_confirm'); ?>*">
                        <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <input type="hidden" name="id" value="<?php echo $info['id']; ?>">
                        <input type="hidden" name="action" value="psw">
                        <button type="reset" class="btn btn-primary"><?php echo \think\Lang::get('reset'); ?></button>
                        <button id="submit" type="submit" class="btn btn-success"><?php echo \think\Lang::get('submit'); ?></button>
                    </div>
                </div>
            </form>
            <!-- end Reset Password Form -->
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
            <!-- start Adventure Info  Form -->
            <form  class="ajax-form-adventure form-horizontal form-label-left" method="post" onsubmit="ajaxsubmit('#','.ajax-form-adventure')" enctype="multipart/form-data">
                <div class="item form-group has-feedback">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="qq">
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="qq" name="qq" class="form-control col-md-7 col-xs-12 has-feedback-left" placeholder="QQ" value="<?php echo $info['userInfo']['qq']; ?>">
                        <span class="fa fa-qq form-control-feedback left" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="item form-group has-feedback">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wechat">
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="wechat" name="wechat" class="form-control col-md-7 col-xs-12 has-feedback-left" placeholder="Wechat" value="<?php echo $info['userInfo']['wechat']; ?>">
                        <span class="fa fa-wechat form-control-feedback left" aria-hidden="true"></span>
                    </div>
                </div>
                <!-- Birthday Datepicker start -->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="myDatepicker2">
                    </label>
                    <div class='col-md-6 col-sm-6 col-xs-12 input-group date' id='myDatepicker2'>
                        <span class="input-group-addon">
                           <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        <input name="birthday" type='text' class="form-control" placeholder="click to pick birthday" value="<?php echo $info['userInfo']['birthday']; ?>" />
                    </div>
                </div>
                <!-- Birthday Datepicker end -->
                <!-- Wysiwyg Editor Start -->
                <div class="item form-group has-feedback">
                    <div class="col-md-10 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2><?php echo \think\Lang::get('user_sign'); ?></h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <div id="alerts"></div>
                          <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor-one">
                            <div class="btn-group">
                              <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
                              <ul class="dropdown-menu">
                              </ul>
                            </div>

                            <div class="btn-group">
                              <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                              <ul class="dropdown-menu">
                                <li>
                                  <a data-edit="fontSize 5">
                                    <p style="font-size:17px">Huge</p>
                                  </a>
                                </li>
                                <li>
                                  <a data-edit="fontSize 3">
                                    <p style="font-size:14px">Normal</p>
                                  </a>
                                </li>
                                <li>
                                  <a data-edit="fontSize 1">
                                    <p style="font-size:11px">Small</p>
                                  </a>
                                </li>
                              </ul>
                            </div>

                            <div class="btn-group">
                              <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                              <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                              <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                              <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                            </div>

                            <div class="btn-group">
                              <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                              <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                              <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                              <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                            </div>

                            <div class="btn-group">
                              <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                              <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                              <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                              <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                            </div>

                            <div class="btn-group">
                              <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
                              <div class="dropdown-menu input-append">
                                <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
                                <button class="btn" type="button">Add</button>
                              </div>
                              <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
                            </div>

                            <div class="btn-group">
                              <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                              <input type="file" id="picinput" class="picinput" data-role="magic-overlay" data-target="#pictureBtn" accept="image/*" />
                            </div>

                            <div class="btn-group">
                              <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                              <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                            </div>
                          </div>

                          <div id="editor-one" class="editor-wrapper"><?php echo $info['userInfo']['info']; ?></div>

                          <textarea name="info" id="descr" style="display:none;"></textarea>
                          <br />
                        </div>
                      </div>
                    </div>
                </div>
                <!-- Wysiwyg Editor End -->
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <input type="hidden" name="id" value="<?php echo $info['id']; ?>">
                        <input type="hidden" name="action" value="moreinfo">
                        <button type="reset" class="btn btn-primary"><?php echo \think\Lang::get('reset'); ?></button>
                        <button id="submit" type="submit" class="btn btn-success" onclick="$('#descr').val($('#editor-one').cleanHtml(true))"><?php echo \think\Lang::get('submit'); ?></button>
                    </div>
                </div>
            </form>
            <!-- end Adventure Info  Form -->
        </div>
    </div>
</div>

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

    
<!-- Upload Modal Start -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">upload img</h4>
            </div>
            <!--Hidden Image File Form Start-->
            <form class="ajax-form-avatar" onsubmit="ajaxsubmit('<?php echo url('upload/avatar'); ?>','.ajax-form-avatar')" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="cropper">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="img-container">
                                    <img class="img-responsive" id="image" src="" alt="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="docs-preview clearfix">
                                    <div class="img-responsive img-circle img-preview preview-lg"></div>
                                    <div class="img-responsive img-circle img-preview preview-md"></div>
                                </div>
                                <div class="docs-data">
                                    <div class="input-group input-group-sm">
                                        <label class="input-group-addon" for="dataX">X</label>
                                        <input type="text" name="dataX" class="form-control" id="dataX" placeholder="x">
                                        <span class="input-group-addon">px</span>
                                    </div>
                                    <div class="input-group input-group-sm">
                                        <label class="input-group-addon" for="dataY">Y</label>
                                        <input type="text" name="dataY" class="form-control" id="dataY" placeholder="y">
                                        <span class="input-group-addon">px</span>
                                    </div>
                                    <div class="input-group input-group-sm">
                                        <label class="input-group-addon" for="dataWidth">Width</label>
                                        <input type="text" name="dataWidth" class="form-control" id="dataWidth" placeholder="width">
                                        <span class="input-group-addon">px</span>
                                    </div>
                                    <div class="input-group input-group-sm">
                                        <label class="input-group-addon" for="dataHeight">Height</label>
                                        <input type="text" name="dataHeight" class="form-control" id="dataHeight" placeholder="height">
                                        <span class="input-group-addon">px</span>
                                    </div>
                                    <div class="input-group input-group-sm">
                                        <label class="input-group-addon" for="dataRotate">Rotate</label>
                                        <input type="text" name="dataRotate" class="form-control" id="dataRotate" placeholder="rotate">
                                        <span class="input-group-addon">deg</span>
                                    </div>
                                    <div class="input-group input-group-sm">
                                        <label class="input-group-addon" for="dataScaleX">ScaleX</label>
                                        <input type="text" name="dataScaleX" class="form-control" id="dataScaleX" placeholder="scaleX">
                                    </div>
                                    <div class="input-group input-group-sm">
                                        <label class="input-group-addon" for="dataScaleY">ScaleY</label>
                                        <input type="text" name="dataScaleY" class="form-control" id="dataScaleY" placeholder="scaleY">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group docs-buttons">
                        <button type="button" class="btn btn-primary" data-method="zoom" data-option="0.1" title="Zoom In">
                            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;zoom&quot;, 0.1)">
                  <span class="fa fa-search-plus"></span>
                            </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1" title="Zoom Out">
                            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;zoom&quot;, -0.1)">
                  <span class="fa fa-search-minus"></span>
                            </span>
                        </button>
                    </div>
                    <div class="btn-group docs-buttons">
                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45" title="Rotate Left">
                            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;rotate&quot;, -45)">
                  <span class="fa fa-rotate-left"></span>
                            </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="45" title="Rotate Right">
                            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;rotate&quot;, 45)">
                  <span class="fa fa-rotate-right"></span>
                            </span>
                        </button>
                    </div>
                    <div class="btn-group docs-buttons">
                        <button type="button" class="btn btn-primary" data-method="scaleX" data-option="-1" title="Flip Horizontal">
                            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;scaleX&quot;, -1)">
                  <span class="fa fa-arrows-h"></span>
                            </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="scaleY" data-option="-1" title="Flip Vertical">
                            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;scaleY&quot;, -1)">
                  <span class="fa fa-arrows-v"></span>
                            </span>
                        </button>
                    </div>
                    <input id="inputImage" type="file" name="avatar_img" accept="image/*" class="hidden" alt="Picture">
                    <input type="hidden" name="id" value="<?php echo $info['id']; ?>">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>    
                </div>
            </form>
            <!--Hidden Image File Form End-->
        </div>
    </div>
</div>
<!-- Upload Modal End -->


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
    
    <!-- Custom Theme Scripts -->
    <script src="/static/js/custom.js"></script>
    
<!-- Switchery -->
<script src="/static/js/switchery.min.js"></script>
<!-- validator -->
<script src="/static/js/validator.js"></script>
<!-- iCheck -->
<script src="/static/js/icheck.min.js"></script>
<!-- Cropper -->
<script src="/static/js/cropper.min.js"></script>
<!-- bootstrap-datetimepicker -->
<script src="/static/js/moment.min.js"></script>
<script src="/static/js/bootstrap-datetimepicker.min.js"></script>
<!-- wysiwyg editor -->
<script src="/static/js/bootstrap-wysiwyg.min.js"></script>
<script src="/static/js/jquery.hotkeys.js"></script>
<script src="/static/js/prettify.js"></script>
<!-- Click to upload image -->
<script type="text/javascript">
    $('#avatar').on('click',function(){
        $('#inputImage').click();
    });
    $('#pictureBtn').on('click',function() {
        $('.picinput').click();
    });
    $('#myDatepicker2').datetimepicker({
        format: 'YYYY.MM.DD',
    });
    /*插入图片*/
    $('.picinput').on('change',function(){
        var formdata = new FormData();
        formdata.append('infopic',$('#picinput')[0].files[0]);
        $.ajax({
            url:"<?php echo url('upload/infopic'); ?>",
            type:'post',
            data:formdata,
            processData : false,
            contentType : false,
            success:function(data){
                console.log(data.response);
                $('#editor-one').append("<img src='/uploads/info/"+data+"'>");
            },
            error:function(XMLHttpRequest, textStatus, errorThrown){
                console.log(JSON.parse(XMLHttpRequest.responseText).msg);
            }
        })
    })
</script>

  </body>
</html>
