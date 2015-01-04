<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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