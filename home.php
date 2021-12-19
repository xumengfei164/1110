<?php
include_once('./inc/auth.php');

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>curd</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="/bbs/Public/Admin/img/favicon.ico" type="image/x-icon">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <!-- Fonts from Font Awsome -->
    <link rel="stylesheet" href="static/css/font-awesome.min.css">
    <!-- CSS Animate -->
    <link rel="stylesheet" href="static/css/animate.css">
    <!-- Custom styles for this theme -->
    <link rel="stylesheet" href="static/css/main.css">
    <!-- Vector Map  -->
    <link rel="stylesheet" href="static/css/jquery-jvectormap-1.2.2.css">
    <!-- ToDos  -->
    <link rel="stylesheet" href="static/css/todos.css">
    <!-- Morris  -->
    <link rel="stylesheet" href="static/css/morris.css">
    <!-- Fonts -->
    <!-- <link href='static/css/e19d82f9905e4c85b4262b4ec08345a3.css' rel='stylesheet' type='text/css'>
    <link href='static/css/e788310db10241dc93f22e33cc5f4939.css' rel='stylesheet' type='text/css'> -->
    <!-- Feature detection -->
    <script src="static/js/modernizr-2.6.2.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="static/js/html5shiv.js"></script>
    <script src="static/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <section id="container">
        <header id="header">
            <!--logo start-->
            <div class="brand">
                <a href="index.html" class="logo" style="font-size:18px">
                    前端是使用的模板</a>
            </div>
            <!--logo end-->
            <div class="toggle-navigation toggle-left">
                <button type="button" class="btn btn-default" id="toggle-left" data-toggle="tooltip" data-placement="right" title="Toggle Navigation">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <div class="user-nav">
                <ul>
                   
                   <li class="profile-photo">
                        <img style="width:55px;height:54px;" src=".<?php echo $_SESSION['userpic']; ?>" alt="" class="img-circle">
                    </li>
                    <li class="dropdown settings">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <?php
                            	echo $_SESSION['username'];
                            ?>
                            <i class="fa fa-angle-down"></i>
                    </a>
                        <ul class="dropdown-menu animated fadeInDown">
                          
                            <li>
                                <a href="./loginout.php"><i class="fa fa-power-off"></i> 退出登录</a>
                            </li>
                        </ul>
                    </li>
                   

                </ul>
            </div>
        </header>

        <!--sidebar left start-->
        <aside class="sidebar">
            <div id="leftside-navigation" class="nano">
                <ul class="nano-content">
                    
                    <li class="sub-menu">
                        <a href="javascript:void(0);"><i class="fa fa-table"></i><span>用户管理</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                        <ul>
                             <li><a href="./home.php">添加用户</a>
                            </li>
                            <li><a href="./show.php">查看用户</a>
                            </li>
                        </ul>
                    </li>
               
                        
                </ul>
            </div>

        </aside>
         
	   <section class="main-content-wrapper">
            <section id="main-content">
                <div class="row">
                    <div class="col-md-12">
                        <!--breadcrumbs start -->
                        <ul class="breadcrumb">
                            <li><a href="/bbs/index.php/Admin/User/../">首页</a>
                            </li>
                            <li>用户管理</li>
                            <li class="active">添加用户</li>
                        </ul>
                        <!--breadcrumbs end -->
                        <h1 class="h1">添加用户</h1>
                    </div>
                </div>

              <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">用户信息</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                    <i class="fa fa-times"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal form-border" action="save.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">用户名</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="username" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">密码</label>
                                        <div class="col-sm-6">
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">性别</label>
                                        <div class="col-sm-6">
                                            <input type="radio" name="sex" value="m" checked>男　 
                                            <input type="radio"  name="sex" value="w">女
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">手机号</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="tel" class="form-control" >
                                        </div>
                                    </div>
                                   
                                     <div class="form-group">
                                        <label class="col-sm-3 control-label">头像</label>
                                        <div class="col-sm-6">
                                            <input type="file" name="pic" class="form-control">
                                        </div>
                                    </div>
                                    <a href="" class="btn btn-primary" style="position:relative;left:35%;">返回</a>
                                     <button type="submit" class="btn btn-primary" style="position:relative;left:40%;">添加</button>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>

                  
 
    <!--Global JS-->
    <script src="static/js/jquery-1.10.2.min.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
    <script src="static/js/waypoints.min.js"></script>
    <script src="static/js/application.js"></script>
    <!--Page Level JS-->
    <script src="static/js/jquery.countto.js"></script>
    <script src="static/js/skycons.js"></script>
    <!-- FlotCharts  -->
    <script src="static/js/jquery.flot.min.js"></script>
    <script src="static/js/jquery.flot.resize.min.js"></script>
    <script src="static/js/jquery.flot.canvas.min.js"></script>
    <script src="static/js/jquery.flot.image.min.js"></script>
    <script src="static/js/jquery.flot.categories.min.js"></script>
    <script src="static/js/jquery.flot.crosshair.min.js"></script>
    <script src="static/js/jquery.flot.errorbars.min.js"></script>
    <script src="static/js/jquery.flot.fillbetween.min.js"></script>
    <script src="static/js/jquery.flot.navigate.min.js"></script>
    <script src="static/js/jquery.flot.pie.min.js"></script>
    <script src="static/js/jquery.flot.selection.min.js"></script>
    <script src="static/js/jquery.flot.stack.min.js"></script>
    <script src="static/js/jquery.flot.symbol.min.js"></script>
    <script src="static/js/jquery.flot.threshold.min.js"></script>
    <script src="static/js/jquery.colorhelpers.min.js"></script>
    <script src="static/js/jquery.flot.time.min.js"></script>
    <script src="static/js/jquery.flot.example.js"></script>
    <!-- Morris  -->
    <script src="static/js/morris.min.js"></script>
    <script src="static/js/raphael.2.1.0.min.js"></script>
    <!-- Vector Map  -->
    <script src="static/js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="static/js/jquery-jvectormap-world-mill-en.js"></script>
    <!-- ToDo List  -->
    <script src="static/js/todos.js"></script>
    <!--Load these page level functions-->
    <script>
    $(document).ready(function() {
        app.timer();
        app.map();
        app.weather();
        app.morrisPie();
    });
    </script>   

</body>

</html>