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
    <h2>文章管理</h2>
    </div>
    <h3>文章列表</h3>
    </section>
    <div class="tree">
    @foreach ($books as $book)
            <ul class="well">
                <li>
                	<span><i class="icon-plus-sign"></i> {{$book->name}}</span>
                    @foreach(Article::where('book_id','=',$book->id)->get() as $article)
                    <ul>
                        <li style="display:none;">
                        <hr>
	                        <span><i class="icon-leaf"></i> <a href="{{URL::route('article', array('id'=>$article->id,'title'=>$article->title))}}">{{$article->title}}</a>。。。。。。。。。。。。<a  href="{{ route('edit/Article', $article->id) }}">
								<i class="icon-edit icon-white"></i>编辑</a>
							<!-- <a id="deletearticle" href="{{URL::route('delete/Article',array('id'=>$article->id))}}"> -->
                                <a class="deletearticle" data-id="{{$article->id}}" href="#">
								<i class="icon-trash icon-white"></i>删除</a></span> 
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