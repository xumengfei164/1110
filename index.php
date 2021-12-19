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
    <title>用户管理</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="/bbs/Public/Admin/img/favicon.ico" type="image/x-icon">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="static/css/bootstrap.min_1.css">
    <!-- Fonts from Font Awsome -->
   
    <!-- Custom styles for this theme -->
    <link rel="stylesheet" href="static/css/main_1.css">
    <!-- Fonts -->
    <!-- <link href='static/css/7829f7e703b142aeafa1f12c9ec8bb49.css' rel='stylesheet' type='text/css'>
    <link href='static/css/1557ab3559ae4154a12a699bb905567c.css' rel='stylesheet' type='text/css'> -->
    <!-- Feature detection -->
    <script src="static/js/modernizr-2.6.2.min_1.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="static/js/html5shiv_1.js"></script>
    <script src="static/js/respond.min_1.js"></script>
    <![endif]-->
</head>

<body>
    <section id="login-container">

        <div class="row">
            <div class="col-md-3" id="login-wrapper">
                <div class="panel panel-primary animated flipInY">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                          用户管理
                        </h3>
                    </div>
                    <div class="panel-body">
                        <p>登录</p>
                        <form class="form-horizontal" action="./logincheck.php" method="POST">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="username" id="email" placeholder="账号">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="密码">
                                    <i class="fa fa-lock"></i>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary btn-block" value="登录后台">
                                   
                                   
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--Global JS-->
    

</body>

</html>