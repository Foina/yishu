<div class="well affix" style="min-width:280px;padding:8px 0;" >
        <ul class="nav nav-list nav-pills nav-stacked ">
            <li class="nav-header"><i class="icon-pencil"></i>图书管理</li>
            <li class="divider"></li>
            <li><a href="{{URL::route('create/BookList')}}">图书列表</a></li>
            <li><a href="{{URL::route('create')}}">创建图书</a></li>
            <li class="divider"></li>
            <li class="nav-header"><i class="icon-pencil"></i>文章管理</li>
            <li class="divider"></li>
            <li><a href="{{URL::route('create/ArticleList')}}">文章列表</a></li>
            <li><a href="{{URL::route('create/ArticleCreate')}}">创建文章</a></li>
        </ul>
        </div>