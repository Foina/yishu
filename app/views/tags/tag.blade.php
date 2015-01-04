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
        <li>
    <h5>{{$name}}</h5>
     @foreach ($tag_books as $tag_book)
    <a href="{{URL::route('bookshow', array('id'=>$tag_book->id,'name'=>$tag_book->name))}}">{{$tag_book->name}}</a> &nbsp;
     @endforeach      
      </li>
        </ul>
       
        </div>
        
        <div class="span4">
        @include('layouts.sidebar')
      
        </div>
     </div>
        
        
@stop