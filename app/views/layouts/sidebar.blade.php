
    <h5><i class="icon-tags"></i>热门标签</h5>
     @foreach ($tags as $key=>$tag)
    <a href="{{URL::route('tags', array('id'=>$tag->id,'name'=>$tag->name))}}">{{$tag->name}}</a> &nbsp;
     @endforeach      

<hr/>

    <h5>用户动态</h5>
    @foreach($states as $state)
    <a href="#">{{$state->user}}{{$state->event}}</a><br>
    @endforeach
 <hr/>   
     <h5>友情链接</h5>
    
    访问Foina的博客请转至：<a href="http://blog.wiyishu.com">blog.wyishu.com</a><br>
    
