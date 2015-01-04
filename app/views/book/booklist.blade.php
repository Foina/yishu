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
    <h3>图书列表</h3>
    </section>
    <div class="tree">
    @foreach ($books as $book)
            <ul class="well">
                <li>
                	<span><i class="icon-plus-sign"></i><div class="tree-img"><img src="{{ asset('/') }}{{$book->path}}{{$book->cover}}" alt="" height="144" width="102"/></div><div class="tree-text"> <a href="{{URL::route('bookshow', array('id'=>$book->id,'name'=>$book->name))}}">{{$book->name}}</a><div class="operater_edit"><a  href="{{route('edit/Book',$book->id)}}">
								<i class="icon-edit icon-white"></i>编辑</a></div><div class="operater_delete"> 
                                <a  class="deletebook" data-id="{{$book->id}}" href="#">
								<i class="icon-trash icon-white"></i>删除</a></div><p>{{$book->info}}</p></div></span>
                    @foreach(Article::where('book_id','=',$book->id)->get() as $article)
                    <ul>
                        <li style="display:none;">
                        <hr>
	                        <span><i class="icon-leaf"></i> {{$article->title}}。。。。。。。。。。。。{{$article->page_num}}</span> 
                        </li>
                    </ul>
                    @endforeach
                </li>
                
            </ul>
            @endforeach
            
        </div>

    </div>
</div>
@endif
@stop