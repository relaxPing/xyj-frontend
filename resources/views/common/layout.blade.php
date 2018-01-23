<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--<link type="text/css" rel="stylesheet" href="css/menu.css" mce_href="css/menu.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--引入css文件-->
    @section('css')
    <link rel="stylesheet" type="text/css" href="css\layout.css">
    <link rel="stylesheet" type="text/css" href="css\pagination.css">
    @show
    <!--控制左侧下拉菜单-->
    <script type="text/javascript">
        $(document).ready(function(){
            //var uls = $("ul");
            //找到ul下的a节点
            var as = $("ul > a");
            as.click(function(){
                //首先找到当前ul中的li，然后让li显示出来
                //获取当前被点击的ul节点
                var aNode = $(this);
                //找到被点击ul节点下的所有li节点
                var lis = aNode.nextAll("li");
                //显示或隐藏ul的li子节点们
                lis.toggle("fast");
            });
        });
    </script>
    @section('js')
    @show
</head>
<body>
<header>
    @section('headPic')
    <img src="imgs/header.jpg" style="width: 100%;height: auto">
    @show
</header>
<div class="container-fluid">
    <div class="row webBody">
        <div class="col-sm-2 sidenav">
            <ul class="list">
                <a href="#" >运单</a>
                <li ><a href="{{ url('yundanManagementS1')}}" class="{{Request::getPathInfo() == 'yundanManagementS1'?'active':''}}">运单管理</a></li>
                <li><a href="{{ url('createYundan')}}" class="{{Request::getPathInfo() == 'createYundan'?'active':''}}">直接下单</a></li>
            </ul>
            <ul class="list">
                <a href="#">财务</a>
                <li><a href="{{url('recordMoneyIn')}}">充值记录</a></li>
                <li><a>消费记录</a></li>
            </ul>
            <ul class="list">
                <a href="#">账号管理</a>
                <li><a href="{{url('memberDetail')}}">我的资料</a></li>
                <li><a>密码修改</a></li>
                <li><a href="{{url('addressManagement')}}">地址簿</a></li>
            </ul>
        </div>
        <div class="col-sm-10 content">
            @yield('content')
        </div>
    </div>
</div>
</body>

<footer class="container-fluid text-center">
    <p>@by Ping Xin</p>
</footer>
</html>