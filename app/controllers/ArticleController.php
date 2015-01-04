<?php
class ArticleController extends BaseController {
   
    public function getIndex($id=null,$title=null)
    {
        $article= DB::table('articles')->where('id','=',$id)->first();
        
      $user_id=$article->user_id;
        $_user=DB::table('users')->where('id','=',$user_id)->first();
        $article->views++;
        DB::table('articles')->where('id','=',$id)->update(array('views'=>$article->views));
        
        return View::make('articles.article',compact('article','title','_user'))->with($this->view_data);
    }
    
    public function articleList()
    {
        $books=DB::table('books')->orderBy('id', 'DESC')->paginate(10);
        return View::make('articles.articlelist',compact('books'));
    }
    
    public function articleCreate()
    {
        if(Auth::check()){
        $books=DB::table('books')->where('user_id','=',Auth::user()->id)->get();
        return View::make('articles.create',compact('books'));
        }else{
             return View::make('articles.create');
        }
    }
    
    public function postCreate()
    {
        $rules=array(
            'title'=>'required|min:3|max:64',
            'content'=>'min:3|max:255',
            'book_id'=>'required|integer',
            'pagenum'=>'integer',
        );
        $messages=array(
            'title.required'=>'请填写文章标题',
            'content.min'=>'内容至少3个字',
            'content.max'=>'内容不得超过255个字',
            'pagenum.integer'=>'页数只能是整数',
            'book_id.required'=>'请选择该文章所属图书',
        );
        $validator = Validator::make(Input::all(), $rules,$messages);
        $userid=Auth::user()->id;
        if ($validator->fails()){
        
        return Redirect::back()->withInput()->withErrors($validator);
        /*
            return Response::json(array(
                'success' => false,
                'errors' => $validator->messages()->toArray(),
            ));
            */
        }
        $article=new Article;
        $article->fill(array(
            'title'=>Input::get('title'),
            'content'=>Input::get('content'),
            'user_id'=>$userid,
            'book_id'=>Input::get('book_id'),
            'page_num'=>Input::get('pagenum'),
        )
        );
        $article->save();
        $success="文章创建成功";
        return Redirect::route('create/ArticleList')->with('success', $success);
    }
    
    public function getEdit($id=null){
         if(Auth::check()){
            $books=DB::table('books')->where('user_id','=',Auth::user()->id)->get();
            $article=DB::table('articles')->where('id',$id)->first();
            $oldbook=Book::where('id',$article->book_id)->first();
            return View::make('articles.Edit',compact('books'),compact('oldbook'))->with(compact('article'));
        }else{
             return View::make('home');
        }
            
    }
    public function postEdit(){
    
        if(is_null($article = Article::find($articleId = Input::get('article_id')))){
            /*
            return Response::json(array(
                'success' => false,
                'errors' => '该文章不存在',
            ));
            */
            return Redirect::to('articles.articlelist')->with('error', '该文章不存在');
        }
      
        $rules=array(
               'title'=>'required|min:3|max:64',
                'content'=>'min:3|max:64',
                'book_id'=>'integer',
                'pagenum'=>'integer', 
        );
        $messages=array(
            'title.required'=>'请填写文章标题',
            'content.min'=>'内容至少3个字',
            'content.max'=>'内容不得超过255个字',
            'pagenum.integer'=>'页数只能是整数',
            'book_id.required'=>'请选择该文章所属图书',
        );
        $userid=Auth::user()->id;
        $validator = Validator::make(Input::all(), $rules,$messages);
        if ($validator->fails()){
            return Redirect::back()->withInput()->withErrors($validator);
        /*
            return Response::json(array(
                'success' => false,
                'errors' => $validator->messages(),
            ));
            */
        }
        
        $article->fill(array(
            'title'=>Input::get('title'),
            'content'=>Input::get('content'),
            'user_id'=>$userid,
            'book_id'=>Input::get('book_id'),
            'page_num'=>Input::get('pagenum'),
        )
        );
        $article->save();
        $success="文章修改成功";
        return Redirect::route('create/ArticleList')->with('success', $success);
        /*
        return Response::json(array(
            'success' => true,
            'errors' => '',
        ));
        */
    }
    public function getDelete($id=null){
            if(is_null(DB::table('articles')->where('id','=',$id)->get())){
                     return Response::json(array(
            'success' => false,
        ));
            }
            DB::table('articles')->where('id','=',$id)->delete();
             return Response::json(array(
            'success' => true,
            'errors' => '',
        ));
    }
}