@extends('layouts.head')
@section('content')
<h1>易书</h1>
     <p>生如夏花之绚烂，死如秋叶之静美。</p>
     <div class="subnav">
        <ul class="nav nav-pills">
            <li><a href="{{URL::route('book')}}">在线阅读</a></li>
            <li><a href="{{URL::route('categories')}}">分类浏览</a></li>
        </ul>
    </div>
    <div class="row-fluid">
        <div class="span8 thumbnails">
        <div class="bookshow_image">
    
    <img src="{{ asset('/') }}{{$book->path}}{{$book->cover}}" alt="{{$book->cover}}" height="144" width="102"/>
    </div>
    <div class="bookshow_text">
    <h5>{{$name}}</h5> <p>创建时间：{{$book->created_at}} &nbsp 作者：{{$user->name}}</p>
    <p>简介：</br>{{$book->info}}</p>
      </div>
      <hr/>
      <h5>目录</h5>
       @foreach($articles as $article)
       <p><a href="{{URL::route('article', array('id'=>$article->id,'title'=>$article->title))}}">{{$article->title}}</a>。。。。。。。。。。。。。。{{$article->page_num}}</p>
       @endforeach
        </div>
        
        <div class="span4">
        @include('layouts.sidebar')
      
        </div>
     </div>
        
        
@stop