<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
   <script>var SITE_URL = '{{  URL::route('home') }}';</script>
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
                    <ul class="nav" id="myTab">
                        <li><a href="{{URL::route('home')}}">首页</a></li>
                        <li><a href="{{URL::route('local')}}">同城</a></li>
                        <li><a href="{{URL::to('about')}}">关于</a></li>
                    </ul>
                    
                    <form class="navbar-search pull-left " id="searchForm">
                        <input type="text" class="search-query span2" placeholder="Search" id="searchBtn" name="search_text" style="height: 25px;">
                    </form>
                    <ul class="nav pull-right">
                        @if (Auth::check()) 
                            <li><a href="javascript:void(0);">Hello, {{ Auth::user()->name }}</a></li>
                            <li>{{ link_to_route('signout', '退出', array(), array('class' => 'signout')) }}</li>
                            <li><a href="{{URL::to('create')}}"><i class="icon-align-justify"></i>创建图书</a></li>
                        @else
                          <li ><a href="#loginModal" role="button" data-toggle="modal">登录</a></li>
                          <li class="divider-vertical"></li>
                          <li ><a href="#registerModal" role="button" data-toggle="modal">注册</a></li>                        
                        @endif
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
     <div class="container">
     @yield('content')
    </div>

<div id="loginModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"  >用户登录</h3>
  </div>
  <div class="row-fluid">
          {{  Form::open(array(
                'method' => 'post',
                'class' => 'form-horizontal',
                'id' => 'SigninForm',
            )) }}
          <div class="control-group">
            {{ Form::label('inputEmail', '邮箱', array('class' => 'control-label')) }}
            <div class="controls">
            <span class="add-on"><i class="icon-envelope"></i></span>
              <input type="text" id="inputEmail" placeholder="Email" name="email" class="span6">
              <span class="help-inline"></span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputPassword">密码</label>
            <div class="controls">
             <span class="add-on"><i class="icon-key"></i></span>
              <input type="password" id="inputPassword" name="password" placeholder="Password" class="span6">
              <span class="help-inline"></span>
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <label class="checkbox">
                {{ Form::checkbox('remember', 0) }}记住我
              </label>      
            </div>
          </div>
          <div class="form-actions">
                <button type="submit" class="btn" id="loginBtn">登录</button>
          </div>
            {{ Form::close() }}
    </div>
</div> 
<div id="registerModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"  >用户注册</h3>
  </div>
  <div class="row-fluid">
      {{ Form::open(array(
            'method' => 'post',
            'class' => 'form-horizontal',
            'id' => 'SignupForm',
      )) }}
      
      <div class="control-group">
        <label class="control-label" for="inputname">用户名</label>
        <div class="controls">
          <input type="text" id="inputname" name="name" placeholder="Name" class="span6">
          <span class="help-inline"></span>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputpd">密码</label>
        <div class="controls">
          <input type="password" id="inputpd" name="pd" placeholder="Password" class="span6">
          <span class="help-inline"></span>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">性别</label>
        <div class="controls">
        <label class="radio inline">
        <input type="radio" name="sex"   value="male">男
        </label>
        <label class="radio inline">
        <input type="radio" name="sex"  value="female">女
        <span class="help-inline"></span>
        </label>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">生日</label>
        <div class="controls">
        <select name="year" class="span3" id="year">
            <?php
            for($i=1900;$i<=2012;$i++)
            {
                echo "<option value=".$i.">".$i."</option>";
            }
            ?>
            </select>
            <select name="month" class="span3" id="month">
            <?php
            for($j=1;$j<=12;$j++){
            echo "<option value=".$j.">".$j."</option>";
            } 
            ?>
             </select >
            <select  name="date" class="span3" id="date">
            <?php
            for($i=1;$i<=31;$i++){
            echo "<option value=".$i.">".$i."</option>";
            }
             ?>
        </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputEm">邮箱</label>
        <div class="controls">
          <input type="text" id="inputEm" name="el" placeholder="Email" class="span6">
          <span class="help-inline"></span>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputaddress">地址</label>
        <div class="controls">
          <input type="text" id="inputaddress" name="address" placeholder="Address" class="span6">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputphone">电话</label>
        <div class="controls">
          <input type="text" id="inputphone" name="phone" placeholder="Phone" class="span6">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputqq">qq</label>
        <div class="controls">
          <input type="text" id="inputqq" name="qq" placeholder="qq" class="span6">
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <button type="submit" class="regiserbtn" id="registerBtn">注册</button>
        </div>
      </div>
    {{ Form::close() }}
    </div>
</div>   
    
    <footer class="footer"> 
     <p class="pull-right"><a href="#">回到顶端</a></p>
     <p>生如夏花之绚烂，死如秋叶之静美。</p>
     <a href="http://www.wiyishu.com" target="_blank">Foina_Chan</a>
    </footer>
    <link rel="stylesheet" href="{{ asset('static/styles/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('static/styles/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('static/styles/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('static/styles/site.css') }}">
    <link rel="stylesheet" href="{{ asset('static/styles/bootstrap-responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('static/styles/doc.css') }}">
    <!---<link rel="stylesheet" href="{{ asset('static/styles/todc-bootstrap.css') }}">-->
    <script src="{{ asset('static/scripts/jquery.js') }}"></script>
    <script src="{{ asset('static/scripts/bootstrap.min.js') }}"></script>
    <script src="{{ asset('static/scripts/site.js') }}"></script>
       
</body>
</html>