@extends('layouts.head')
@section('content')
@if (!Auth::check())

@include('layouts.login')

@else

<h1>易书</h1>
     <p>生如夏花之绚烂，死如秋叶之静美。</p>
     <hr>
     <div class="subnav">
        <ul class="nav nav-pills">
            <li><a href="{{URL::route('book')}}">在线阅读</a></li>
            <li><a href="{{URL::route('categories')}}">分类浏览</a></li>
        </ul>
    </div>
    <div class="row-fluid">
    <div class="span3 bs-docs-sidebar " >
       @include('layouts.sidebar2')
    </div>
    <div class="span9">
    <section>
    <div class="page-header">
    <h2>图书管理</h2>
    </div>
    <h3>创建图书</h3>
    </section>
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
    <div class="well">
    <form class="form-horizontal" method="post" enctype="multipart/form-data" id="book_form">
    <input type="hidden" name="book_id" value="{{$book->id}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <fieldset>
    <div class="control-group">
    <label class="control-label" for="upload">封面</label>
    <div class="controls">
    <input type="file" name='image' id="upload"  /> <p class="text-info">请上传图片作为封皮</p>
    <!---- <button type="submit" class="btn" id="upload" >上传图片</button>请上传图片作为封皮-->
    </div> 
   </div>
   <div class="control-group">
    <label class="control-label" for="bookname">图书名称</label>
    <div class="controls">
           <input type="text" id="bookname" name="bookname" placeholder="bookname"  class="span6"
           value="{{ Input::old('bookname', $book->name) }}"/>
           <span class="help-inline"></span>
    </div> 
   </div>
   <div class="control-group">
    <label class="control-label" for="bookcategory">图书类别</label>
    <div class="controls">
    <select  id="bookcategory" name="bookcategory"  class="span6">
      <option value="{{Input::old('category_id',$category->id)}}">{{Input::old('category_name',$category->name)}}</option>
     
      </select>   
    </div> 
   </div>
   <div class="control-group">
    <label class="control-label" for="bookinfo">图书简介</label>
    <div class="controls">
           <textarea rows="3" name="info" placeholder="info" >{{Input::old('info',$book->info)}}</textarea>
              <button type="submit" class="btn" >更新</button>
     </div>
     </div>
   </fieldset>
     </form>
        </div>

    </div>
</div>
 
@endif

@stop