<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>tes</title>
     <link rel="stylesheet" href="../static/styles/bootstrap.css">  
    <link rel="stylesheet" href="../static/styles/bootstrap-responsive.css">
    <script src="../static/scripts/jquery.js"></script>
    <script src="../static/scripts/bootstrap.min.js"></script>
    <style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
      .center{
            margin-left: auto !important;
            margin-right: auto !important;
            float: none !important;
            display: block;
            text-align: center;
      }
      .login-header {
            padding-top: 30px;
            height: 120px;
        }
        .input-prepend {
            margin-bottom: 10px;
        }
        .remember {
            margin-top: 3px;
        }
        .btn {
margin-top: 15px;
width: 100%;
}
	</style>
</head>
<body>
		<div class="container-fluid">
		<div class="row-fluid">
		
			<div class="row-fluid">
				<div class="span12 center login-header ">
					<h3>后台管理登录</h3>
				</div><!--/span-->
			</div><!--/row-->
			
            @if ($errors->any())
<div class="alert alert-error alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>出错了</h4>
   @foreach ($errors->all() as $error)
      <div>{{ $error }}</div>
  @endforeach
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>操作成功</h4>
	{{ $message }}
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-error alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>出错了</h4>
	{{ $message }}
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>警告</h4>
	{{ $message }}
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>操作提示</h4>
	{{ $message }}
</div>
@endif
            
			<div class="row-fluid">
				<div class="well span5 center login-box">
					<div class="alert alert-info">
						请输入后台管理员帐号和密码登录.
					</div>
					<form class="form-horizontal" action="" method="post">
						<!-- CSRF Token -->
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
						<fieldset>
							<div class="input-prepend" title="管理员邮箱" data-rel="tooltip">
								<span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span11" name="email"  type="text" value="{{ Input::old('email') }}" 
                                placeholder="邮箱"/>
								{{ $errors->first('email', '<span class="help-inline">:message</span>') }}
							</div>
							<div class="clearfix"></div></br>

							<div class="input-prepend" title="管理员密码" data-rel="tooltip">
								<span class="add-on"><i class="icon-lock"></i></span><input class="input-large span11" name="password"  type="password" value="" placeholder="密码"/>
								{{ $errors->first('password', '<span class="help-inline">:message</span>') }}
							</div>
							<div class="clearfix"></div></br>

							<div class="input-prepend">
                                
                                  <label class="checkbox">
                                    <input type="checkbox"/> 记住我
                                  </label>
                                
                              </div>
							<div class="clearfix"></div>

							<p class="center span5">
							<button type="submit" class="btn btn-primary">登录</button>
							</p>
						</fieldset>
					</form>
				</div><!--/span-->
			</div><!--/row-->
				</div><!--/fluid-row-->
		
	</div><!--/.fluid-container-->
		
</body>
</html>