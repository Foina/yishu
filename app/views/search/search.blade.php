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
        <div class="span8">
        <ul class="thumbnails ">
         <h4>搜索结果</h4>
            @if ($results)
                
                @foreach ($results as $result)
                    <li >
                    <a href="#">{{$result->title}}</a>
                    </li>
                @endforeach
              @endif
        </ul>
        
        </div>
        
        <div class="span4">
        <ul class="thumbnails ">
        <li>
            <h5>热门标签</h5>
            @foreach ($tags as $key=>$tag)
               <a href="#">{{$tag->name}}</a> &nbsp;
             @endforeach
           
        </li>
        </ul>
        <ul class="thumbnails">
        <li>
           <h5>用户动态</h5>
           @foreach($states as $state)
           <a href="#">{{$state->user}}{{$state->event}}</a><br>
           @endforeach
        </li>
        </ul>
      
        </div>
     </div>
@stop