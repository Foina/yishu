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
         <h4>推荐图书</h4>
         @foreach ($viewbooks as $viewbook)
          <li class="span2">
                <a  href="{{URL::route('bookshow', array('id'=>$viewbook->id,'name'=>$viewbook->name))}}" class="thumbnail"  rel="tooltipview"  data-title="{{$viewbook->info}}">  
                <img src="{{ asset('/') }}{{$viewbook->path}}{{$viewbook->cover}}" alt="{{$viewbook->name}}">
                </a>
                <a href="{{URL::route('bookshow', array('id'=>$viewbook->id,'name'=>$viewbook->name))}}" >{{$viewbook->name}}</a><p>作者:{{$viewbook->user->name}}</p>
          </li>
          @endforeach
        </ul>
        <ul class="thumbnails ">
        <h4>最新图书</h4>
           @foreach ($books as $book)
            <li class="span2">
            <a href="{{URL::route('bookshow', array('id'=>$book->id,'name'=>$book->name))}}" class="thumbnail"  rel="tooltip" data-title="{{$book->info}}"  >
                <img src="{{ asset('/') }}{{$book->path}}{{$book->cover}}" alt="{{$book->cover}}" height="144" width="102">
                </a>
                <a href="{{URL::route('bookshow', array('id'=>$book->id,'name'=>$book->name))}}">{{$book->name}}</a><p>作者:{{$book->user->name}}</p>
          </li>
          @endforeach
        </ul>
        <hr/>
        <h4>推荐文章</h4>
          @foreach ($articles as $article)
             <a href="{{URL::route('article', array('id'=>$article->id,'title'=>$article->title))}}">{{$article->title}}</a><p>{{Str::limit($article->content,120);}}</P>
          @endforeach
          <hr/>
        
          <h4>热门评论</h4>
            @foreach ($comments as $comment)
             <a href="#">{{Str::limit($comment->content, 120);}}</a> <br/> 
          @endforeach
        
        </div>
        
        <div class="span4">
        @include('layouts.sidebar')
      
        </div>
     </div>
      <script src="{{ asset('static/scripts/jquery.js') }}"></script>
      <script>
      $(document).ready(function(){
$('#myTab').find('li:eq(0)').addClass("active");});
</script>
@stop
    