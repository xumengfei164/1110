<?php
include_once('./inc/auth.php');
include_once('./inc/db.php');

$Db = new DB();

if(isset($_GET['page'])&&is_numeric($_GET['page'])) {
	$curpage = $_GET['page'];
} else {
	$curpage = 1;
}
$num = 3;
$start = $num*($curpage-1);
$sql = "select * from user limit $start,$num";
$result = $Db->exequery($sql);
//分页
$sql1 = "select * from user";
$result1 = $Db->exequery($sql1);
$totals =  mysqli_num_rows($result1);
$page = ceil($totals/$num);

while($data = mysqli_fetch_assoc($result)){
	$data['status'] = $data['status']?'在线':'离线';
	$data['regip'] = @long2ip($data['regip']);
	if($data['lastlogtime']!=''){
		$data['lastlogtime'] = date('Y-m-d H:i',$data['lastlogtime']);
	} else {
		$data['lastlogtime'] = '未登录';
	}
	if($data['regtime']!=''){
		$data['regtime'] = date('Y-m-d H:i',$data['regtime']);
	}
	$uinfo[] = $data;
}
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
    <link rel="stylesheet" href="static/css/bootstrap.min_2.css">
    <!-- Fonts from Font Awsome -->
    <link rel="stylesheet" href="static/css/font-awesome.min_2.css">
    <!-- CSS Animate -->
    <link rel="stylesheet" href="static/css/animate_2.css">
    <!-- Custom styles for this theme -->
    <link rel="stylesheet" href="static/css/main_2.css">
    <!-- Vector Map  -->
    <link rel="stylesheet" href="static/css/jquery-jvectormap-1.2.2_1.css">
    <!-- ToDos  -->
    <link rel="stylesheet" href="static/css/todos_1.css">
    <!-- Morris  -->
    <link rel="stylesheet" href="static/css/morris_1.css">
    <!-- Fonts -->
    <!-- <link href='static/css/efeed120e5014226b432e4e23f60ab49.css' rel='stylesheet' type='text/css'>
    <link href='static/css/bea5ee741e6649078804eb6a36f782ed.css' rel='stylesheet' type='text/css'> -->
    <!-- Feature detection -->
    <script src="static/js/modernizr-2.6.2.min_2.js"></script>
     
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="static/js/html5shiv_2.js"></script>
    <script src="static/js/respond.min_2.js"></script>
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
                        <img style="width:55px;height:54px;" src=".<?php echo $_SESSION['userpic'] ?>" alt="" class="img-circle">
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
                    <li class="active">
                        <a href="/bbs/index.php/Admin/User/../Index"><i class="fa fa-dashboard"></i><span>首页</span></a>
                    </li>
                    
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
         

      
            <link rel="stylesheet" href="static/css/search.css">
        <!--main content end-->
        <!--sidebar right start-->
        <section class="main-content-wrapper">
            <section id="main-content">
                <div class="row">
                    <div class="col-md-12">
                        <!--breadcrumbs start -->
                        <ul class="breadcrumb">
                            <li><a href="#">首页</a>
                            </li>
                            <li>用户管理</li>
                            <li class="active">查看用户</li>
                        </ul>
                        <!--breadcrumbs end -->
                        <h1 class="h1">查看用户</h1>
                    </div>
                </div>

              

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">查看用户</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                    <i class="fa fa-times"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                          
                                            <th>头像</th>
                                            <th>姓名</th>
                                            <th>注册时间</th>
                                            <th>最后登录时间</th>
                                            <th>登录IP</th>
                                            <th>状态</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <form name="fmact" action="./deleteall.php" method="POST">
   									<?php if(!empty($uinfo)) {
   											foreach($uinfo as $k=>$v) {?>
                                        <tr>
                                            
                                    
                                        <input type="hidden" name="id[]" value="<?php echo $v['id'] ?>">
                                        <td><img style="width:55px;height:54px;" src='.<?php echo $v['pic'] ?>'></td>                                               
                                        <td><?php echo $v['username'] ?></td>
                                        <td><?php echo $v['regtime'] ?></td>
                                        <td><?php echo $v['lastlogtime'] ?></td>
                                        <td><?php echo $v['regip'] ?></td>
                                        <td><?php echo $v['status'] ?></td>
                                        <td><a href="./edit.php?id=<?php echo $v['id'] ?>">修改</a> | <a href="./delete.php?id=<?php echo $v['id'] ?>" class="confirm">删除</a>
                                        </td>
                                   
                                    </tr>
                                    <?php }}?>
                                                        </tr>                                                     <tr>
                                                        	<td colspan="11">
                                                        	<div class="dataTables_paginate paging_simple_numbers">
                                                        		<div>
                                                        		<?php

                                                        			for($i=1;$i<=(int)$page;$i++){

                                                        				if($curpage==$i){
                                                        					echo '<span class="current">'.$i.'</span>';
                                                        				} else {
                                                        					echo '<a class="num" href="./show.php?page='.$i.'">'.$i.'</a>';
                                                        				}
                                                        			}
                                                        		?>  
                                                        		
                                                        	</div>
                                                        	</div>
                                                        </td>
                                                    </tr>
                                      
                                    </form>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </section>
 
        <!--sidebar right end-->
 <!--Page Leve JS -->
     <!--Global JS-->

    <script src="static/js/bootstrap.min_2.js"></script>
    <script src="static/js/waypoints.min_2.js"></script>
    <script src="static/js/jquery.nanoscroller.min_1.js"></script>
    <script src="static/js/application_2.js"></script>
    <!--Page Leve JS -->
    <script src="static/js/jquery.datatables.js"></script>
    <script src="static/js/datatables.bootstrap.js"></script>
    <script>
    $(document).ready(function() {
        $('#example').dataTable();
    });
    </script>
    
    <!--Global JS-->
    <script src="static/js/jquery-1.10.2.min_2.js"></script>
    <script src="static/js/bootstrap.min_2.js"></script>
    <script src="static/js/waypoints.min_2.js"></script>
    <script src="static/js/application_2.js"></script>
    <!--Page Level JS-->
    <script src="static/js/jquery.countto_1.js"></script>
    <script src="static/js/skycons_1.js"></script>
    <!-- FlotCharts  -->
    <script src="static/js/jquery.flot.min_1.js"></script>
    <script src="static/js/jquery.flot.resize.min_1.js"></script>
    <script src="static/js/jquery.flot.canvas.min_1.js"></script>
    <script src="static/js/jquery.flot.image.min_1.js"></script>
    <script src="static/js/jquery.flot.categories.min_1.js"></script>
    <script src="static/js/jquery.flot.crosshair.min_1.js"></script>
    <script src="static/js/jquery.flot.errorbars.min_1.js"></script>
    <script src="static/js/jquery.flot.fillbetween.min_1.js"></script>
    <script src="static/js/jquery.flot.navigate.min_1.js"></script>
    <script src="static/js/jquery.flot.pie.min_1.js"></script>
    <script src="static/js/jquery.flot.selection.min_1.js"></script>
    <script src="static/js/jquery.flot.stack.min_1.js"></script>
    <script src="static/js/jquery.flot.symbol.min_1.js"></script>
    <script src="static/js/jquery.flot.threshold.min_1.js"></script>
    <script src="static/js/jquery.colorhelpers.min_1.js"></script>
    <script src="static/js/jquery.flot.time.min_1.js"></script>
    <script src="static/js/jquery.flot.example_1.js"></script>
    <!-- Morris  -->
    <script src="static/js/morris.min_1.js"></script>
    <script src="static/js/raphael.2.1.0.min_1.js"></script>
    <!-- Vector Map  -->
    <script src="static/js/jquery-jvectormap-1.2.2.min_1.js"></script>
    <script src="static/js/jquery-jvectormap-world-mill-en_1.js"></script>
    <!-- ToDo List  -->
    <script src="static/js/todos_1.js"></script>
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