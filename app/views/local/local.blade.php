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
         <li>此板块暂未开放</li>
          
        </ul>
       
        </div>
        
        <div class="span4">
        @include('layouts.sidebar')
      
        </div>
     </div>
     <script src="{{ asset('static/scripts/jquery.js') }}"></script>
      <script>
      $(document).ready(function(){
$('#myTab').find('li:eq(1)').addClass("active");});
</script>
@stop