
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>SIPEKA | BBWS PEMALI JUANA</title>
    <link rel="icon" href="/si_peka/assets/img/profile/pu_logo.png" type="image/x-icon">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="http://sda.pu.go.id/balai/bbwspemalijuana/assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
    <link href="http://sda.pu.go.id/balai/bbwspemalijuana/assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link href="http://sda.pu.go.id/balai/bbwspemalijuana/assets/plugins/animate/animate.min.css" rel="stylesheet" />
    <link href="http://sda.pu.go.id/balai/bbwspemalijuana/assets/css/default/style.min.css" rel="stylesheet" />
    <link href="http://sda.pu.go.id/balai/bbwspemalijuana/assets/css/default/style-responsive.min.css" rel="stylesheet" />
    <link href="http://sda.pu.go.id/balai/bbwspemalijuana/assets/css/default/theme/default.css" rel="stylesheet" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="http://sda.pu.go.id/balai/bbwspemalijuana/assets/plugins/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->
</head>

<body class="pace-top">
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade show"><span class="spinner"></span></div>
    <!-- end #page-loader -->

    <div class="login-cover">
        <div class="login-cover-image" style="background-image: url(http://sda.pu.go.id/balai/bbwspemalijuana/assets/img/login-bg/Login-bg-rwpening.jpeg)" data-id="login-cover-image"></div>
        <div class="login-cover-bg"></div>
    </div>
    <!-- begin #page-container -->
    <div id="page-container" class="fade">
        <!-- begin login -->
        <div class="login login-v2" data-pageload-addclass="animated fadeIn">
            <!-- begin brand -->
            <div class="login-header">
                <div class="brand">
                    <span><img src="/si_peka/assets/img/profile/pu_logo.png" width="50px" height="50px"></span> <b>Login SI-PEKA</b>
                    <small>BBWS Pemali - Juana Website</small>
                </div>
                <div class="icon">
                    <i class="fa fa-lock"></i>
                </div>
            </div>
            <!-- end brand -->
            <!-- begin login-content -->
            <div class="login-content">
            <form action="<?= site_url('auth/process_user') ?>" method="post">
                <div class="form-group has-feedback">
                    <input type="text" name="nomor_p" class="form-control" placeholder="Nomor Polisi" required autofocus>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" name="npp" class="form-control" placeholder="NIP/NPP">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                    <div class="checkbox checkbox-css m-b-20">
                        <input type="checkbox" id="remember_checkbox" />
                        <label for="remember_checkbox">
                            Remember Me
                        </label>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" name="loginuser" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                                                        </form>
            </div>
            <!-- end login-content -->
        </div>
        <!-- end login -->

        <ul class="login-bg-list clearfix">
            <li class="active"><a href="javascript:;" data-click="change-bg" data-img="http://sda.pu.go.id/balai/bbwspemalijuana/assets/img/login-bg/Login-bg-rwpening.jpeg" style="background-image: url(http://sda.pu.go.id/balai/bbwspemalijuana/assets/img/login-bg/Login-bg-rwpening.jpeg)"></a></li>
            <li><a href="javascript:;" data-click="change-bg" data-img="http://sda.pu.go.id/balai/bbwspemalijuana/assets/img/login-bg/login-bg-gunungrowo.jpeg" style="background-image: url(http://sda.pu.go.id/balai/bbwspemalijuana/assets/img/login-bg/login-bg-gunungrowo.jpeg)"></a></li>
            <li><a href="javascript:;" data-click="change-bg" data-img="http://sda.pu.go.id/balai/bbwspemalijuana/assets/img/login-bg/login-bg-15.jpg" style="background-image: url(http://sda.pu.go.id/balai/bbwspemalijuana/assets/img/login-bg/login-bg-15.jpg)"></a></li>
            <li><a href="javascript:;" data-click="change-bg" data-img="http://sda.pu.go.id/balai/bbwspemalijuana/assets/img/login-bg/login-bg-17.jpg" style="background-image: url(http://sda.pu.go.id/balai/bbwspemalijuana/assets/img/login-bg/login-bg-17.jpg)"></a></li>
            <li><a href="javascript:;" data-click="change-bg" data-img="http://sda.pu.go.id/balai/bbwspemalijuana/assets/img/login-bg/login-bg-13.jpg" style="background-image: url(http://sda.pu.go.id/balai/bbwspemalijuana/assets/img/login-bg/login-bg-13.jpg)"></a></li>
            <li><a href="javascript:;" data-click="change-bg" data-img="http://sda.pu.go.id/balai/bbwspemalijuana/assets/img/login-bg/login-bg-12.jpg" style="background-image: url(http://sda.pu.go.id/balai/bbwspemalijuana/assets/img/login-bg/login-bg-12.jpg)"></a></li>
        </ul>

        <!-- begin theme-panel -->
        <div class="theme-panel">
            <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
            <div class="theme-panel-content">
                <h5 class="m-t-0">Color Theme</h5>
                <ul class="theme-list clearfix">
                    <li class="active"><a href="javascript:;" class="bg-green" data-theme="default" data-theme-file="http://sda.pu.go.id/balai/bbwspemalijuana/assets/css/default/theme/default.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-red" data-theme="red" data-theme-file="http://sda.pu.go.id/balai/bbwspemalijuana/assets/css/default/theme/red.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-blue" data-theme="blue" data-theme-file="http://sda.pu.go.id/balai/bbwspemalijuana/assets/css/default/theme/blue.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-purple" data-theme="purple" data-theme-file="http://sda.pu.go.id/balai/bbwspemalijuana/assets/css/default/theme/purple.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-orange" data-theme="orange" data-theme-file="http://sda.pu.go.id/balai/bbwspemalijuana/assets/css/default/theme/orange.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-black" data-theme="black" data-theme-file="http://sda.pu.go.id/balai/bbwspemalijuana/assets/css/default/theme/black.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a></li>
                </ul>
                <div class="divider"></div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Header Styling</div>
                    <div class="col-md-7">
                        <select name="header-styling" class="form-control form-control-sm">
                            <option value="1">default</option>
                            <option value="2">inverse</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label">Header</div>
                    <div class="col-md-7">
                        <select name="header-fixed" class="form-control form-control-sm">
                            <option value="1">fixed</option>
                            <option value="2">default</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Sidebar Styling</div>
                    <div class="col-md-7">
                        <select name="sidebar-styling" class="form-control form-control-sm">
                            <option value="1">default</option>
                            <option value="2">grid</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label">Sidebar</div>
                    <div class="col-md-7">
                        <select name="sidebar-fixed" class="form-control form-control-sm">
                            <option value="1">fixed</option>
                            <option value="2">default</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Sidebar Gradient</div>
                    <div class="col-md-7">
                        <select name="content-gradient" class="form-control form-control-sm">
                            <option value="1">disabled</option>
                            <option value="2">enabled</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Content Styling</div>
                    <div class="col-md-7">
                        <select name="content-styling" class="form-control form-control-sm">
                            <option value="1">default</option>
                            <option value="2">black</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-12">
                        <a href="javascript:;" class="btn btn-inverse btn-block btn-sm" data-click="reset-local-storage">Reset Local Storage</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end theme-panel -->
    </div>
    <!-- end page container -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="http://sda.pu.go.id/balai/bbwspemalijuana/assets/plugins/jquery/jquery-3.2.1.min.js"></script>
    <script src="http://sda.pu.go.id/balai/bbwspemalijuana/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="http://sda.pu.go.id/balai/bbwspemalijuana/assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>

    <script src="http://sda.pu.go.id/balai/bbwspemalijuana/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="http://sda.pu.go.id/balai/bbwspemalijuana/assets/plugins/js-cookie/js.cookie.js"></script>
    <script src="http://sda.pu.go.id/balai/bbwspemalijuana/assets/js/theme/default.min.js"></script>
    <script src="http://sda.pu.go.id/balai/bbwspemalijuana/assets/js/apps.min.js"></script>
    <!-- ================== END BASE JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="http://sda.pu.go.id/balai/bbwspemalijuana/assets/js/demo/login-v2.demo.min.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    <script>
        $(document).ready(function() {
            App.init();
            LoginV2.init();
        });
    </script>
</body>

</html>