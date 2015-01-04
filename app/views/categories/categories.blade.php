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
        <hr/>
         @foreach ($categories as $category)
         <h4>{{$category->name}}</h4>
         @foreach ($tags as $tag)
                <a href="{{URL::route('tags', array('id'=>$tag->id,'name'=>$tag->name))}}">{{$tag->name}}</a>
          @endforeach
          @endforeach
        
       
        </div>
        
        <div class="span4">
        @include('layouts.sidebar')
      
        </div>
     </div>
@stop