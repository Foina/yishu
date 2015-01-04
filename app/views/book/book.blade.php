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
        <ul class="thumbnails">
         <h4>推荐图书</h4>
                @foreach ($books as $key=>$book)
                    <li >
                    <a href="{{URL::route('bookshow', array('id'=>$book->id,'name'=>$book->name))}}" class="thumbnail">
                    <img src="{{ asset('/') }}{{$book->path}}{{$book->cover}}" alt="{{$book->cover}}" height="144" width="102">
                    </a>
                    <a href="{{URL::route('bookshow', array('id'=>$book->id,'name'=>$book->name))}}">{{$book->name}}</a>
                    </li>
                @endforeach
        </ul>
        <ul class="thumbnails ">
        <h4>最新图书</h4>
          @foreach($viewbooks as $key=>$viewbook)
          <li >  
            <a href="{{URL::route('bookshow', array('id'=>$viewbook->id,'name'=>$viewbook->name))}}" class="thumbnail">
             <img src="{{ asset('/') }}{{$viewbook->path}}{{$viewbook->cover}}" alt="{{$viewbook->cover}}" height="144" width="102">
            </a>
            <a href="{{URL::route('bookshow', array('id'=>$viewbook->id,'name'=>$viewbook->name))}}">{{$viewbook->name}}</a>
          </li>
          @endforeach
        </ul>
        
        </div>
        
        <div class="span4">
        @include('layouts.sidebar')
         
        </div>
     </div>
@stop