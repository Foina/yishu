@extends('layouts.head')

@section('content')
<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
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
    <h2>文章管理</h2>
    </div>
    <h3>创建文章</h3>
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
    <form name="article" method="post" class="form-horizontal" id="article_edit_form" >
    <input type="hidden" name="article_id" value="{{$article->id}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="control-group">
    <label class="article-label" for="title">标题</label>
    <div class="article">
           <input type="text" id="title" name="title" placeholder="title"  class="span12" value="{{ Input::old('title', $article->title) }}"/>
           <span class="help-inline"></span>
    </div> 
   </div>
   <div class="control-group">
        <textarea rows="30" cols="50" name="content" id="content">{{ Input::old('content', $article->content) }}</textarea>
    <script> CKEDITOR.replace('content');
    CKEDITOR.instances['content'].on('blur', function() {
        CKEDITOR.instances['content'].updateElement();
    });</script>
    </div>
     <div class="control-group">
    
    <div class="article_book  ">
    所属图书&nbsp
    <select  id="book" name="book_id" >
        <option value="{{Input::old('book_id',$oldbook->id)}}">{{Input::old('book_name',$oldbook->name)}}</option>
        @foreach ($books as $book)
            <option value="{{Input::old('book_id',$book->id)}}">{{Input::old('book_name',$book->name)}}</option>
        @endforeach
    </select> 
      </div>&nbsp
      页码&nbsp <input type="text" id="pagenum" name="pagenum" value="{{Input::old('pagenum',$article->page_num)}}" style="width:20px"/>
      
      <div class="article_pagenum">
      <button type="submit" class="btn" id="update_article">提交</button>
      </div>
       </div>
    
</form>
        </div>

    </div>
</div>

@endif

@stop