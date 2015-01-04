<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>admin</title>
   
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               
                <div class="nav-collapse collapse">
                     <ul class="nav">
                        <li class="active"><a href="">易书后台管理</a></li>
                 </ul>
                 
                     
                    <ul class="nav pull-right nav-tables">
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="">{{ Auth::user()->name }}
                <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="">个人资料</a></li>
                    <li><a href="">设置</a></li>
                    <li><a href="{{URL::to('admin/logout')}}">退出</a></li>
                </ul>
                </li>
                </ul>
                </div>
            </div>
            
        </div>
    </div>
     <div class="container ">
     <div class="row">
        <div class="span3 bs-docs-sidebar">
            <ul class="nav nav-list affix-top bs-docs-sidenav">
                <li ><a href="{{URL::route('admin')}}"><i class="icon-chevron-right"></i>用户管理</a></li>
                <li ><a href="#"><i class="icon-chevron-right"></i>图书管理</a></li>
                <li ><a href="#"><i class="icon-chevron-right"></i>文章管理</a></li>
                <li ><a href="{{URL::route('home')}}"><i class="icon-chevron-right"></i>返回首页</a></li>
            </ul>
        </div>
        <div class="span8">
            <h3>后台管理</h3>
            <hr/>
            <h5>用户管理</h5>
                <table class="table">
                    <thead>
                        <tr>
                        <th>id</th>
                        <th>用户名</th>
                        <th>角色id</th>
                        <th>性别</th>
                        <th>生日</th>
                        <th>邮箱</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->role_id}}</td>
                            <td>{{$user->sex}}</td>
                            <td>{{$user->birthday}}</td>
                            <td>{{$user->email}}</td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
                
                <h5>图书管理</h5>
                <table class="table">
                    <thead>
                        <tr>
                        <th>id</th>
                        <th>图书名</th>
                        <th>图书类别</th>
                        <th>图书浏览量</th>
                        <th>图书简介</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($books as $book)
                        <tr>
                            <td>{{$book->id}}</td>
                            <td>{{$book->name}}</td>
                            <td>{{$book->category_id}}</td>
                            <td>{{$book->viewNum}}</td>
                            <td>{{$book->info}}</td>
                           
                        </tr>
                      @endforeach
                    </tbody>
                </table>
                
        </div>
    </div>
</div>
    
    <link rel="stylesheet" href="static/styles/bootstrap.css">
    <link rel="stylesheet" href="static/styles/site.css">
    <link rel="stylesheet" href="static/styles/bootstrap-responsive.css">
  
    <script src="static/scripts/jquery.js"></script>
    <script src="static/scripts/bootstrap.min.js"></script>
    
</body>
</html>