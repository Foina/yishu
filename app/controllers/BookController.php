<?php
class BookController extends BaseController {
   
    public function getIndex()
    {
        $books = Book::orderBy('id', 'DESC')->orderBy('created_at', 'DESC')->take(5)->get();
        $viewbooks = Book::orderBy('id', 'DESC')->orderBy('viewNum', 'DESC')->take(5)->get();
        return View::make('book.book',compact('books','viewbooks'))->with($this->view_data);
    }
    public function bookList()
    {
        $books = Book::orderBy('id', 'DESC')->orderBy('created_at', 'DESC')->paginate(10);
        return View::make('book.booklist',compact('books'));
    }
    
    public function bookShow($id=null,$name=null){
            $book=DB::table('books')->where('id','=',$id)->first();
            $book->viewNum++;
            DB::table('books')->where('id','=',$id)->update(array('viewNum'=>$book->viewNum));
            $user=DB::table('users')->where('id','=',$book->user_id)->first();
            $articles=DB::table('articles')->where('book_id','=',$id)->get();
            return View::make('book.bookshow',compact('book','name','user','articles'))->with($this->view_data);
    }
    
    public function getCreate(){
            if(Auth::check())
            {
                $categories=DB::table('categories')->orderBy('id','DESC')->get();             
                return View::make('book.create',compact('categories'));
            }
            else{
                return View::make('home');
            }
    }
    public function postCreate(){           
        $rules=array(
            'image'=>'image',
            'bookname'=>'required|min:3|max:64',
            'category_id'=>'integer',
            'info'=>'min:3|max:255'
        );
        $messages = array(
                    'bookname.required'=> '请填写图书名称',
                    'info.min' => '简介最少3个字',
                    'info.max' => '介绍不能多于255个字',
                    'category_id.required' => '图书分类必须选',
                    'category_id.integer'	=> '图书分类只能是数字',
                );
      $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()){
            return Redirect::back()->withInput()->withErrors($validator);
        }
        $userid=Auth::user()->id;

    if (Input::hasFile('image')) {
        $file            = Input::file('image');
        $destinationPath = public_path().'/img/';
        $filename        = str_random(6) . '_' . $file->getClientOriginalName();
        $uploadSuccess   = $file->move($destinationPath, $filename);
    }
    
    $book=Book::create([
    'path'=>'public/img/',
    'cover'=>$filename,
    'name'=>Input::get('bookname'),
    'category_id'=>Input::get('bookcategory'),
    'user_id'=>$userid,
    'info'=>Input::get('info')]
    );
    $success="图书创建成功";
    if($book)
    {
        return Redirect::route('book')->with('success', $success);
    }
    
    }
    
    public function getEdit($id=null){
            if(Auth::check()){
                $book=DB::table('books')->where('id','=',$id)->first();       
                $category=DB::table('categories')->where('id','=',$book->category_id)->first();
                return View::make('book.Edit',compact('book','category'));
            }
            else{
                return View::make('home');
            }
    }
    public function postEdit($id=null){
            $rules=array(
            'image'=>'image',
            'bookname'=>'required|min:3|max:64',
            'category_id'=>'integer',
            'info'=>'min:3|max:255'
        );
        $messages = array(
			 'bookname.required'=> '请填写图书名称',
             'info.min' => '简介最少3个字',
             'info.max' => '介绍不能多于255个字',
             'category_id.required' => '图书分类必须选',
             'category_id.integer'	=> '图书分类只能是数字',
		);
        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()){
            return Redirect::back()->withInput()->withErrors($validator);
        }
        $userid=Auth::user()->id;

    if (Input::hasFile('image')) {
        $file            = Input::file('image');
        $destinationPath = public_path().'/img/';
        $filename        = str_random(6) . '_' . $file->getClientOriginalName();
        $uploadSuccess   = $file->move($destinationPath, $filename);
    }
    $book = Book::find( Input::get('book_id'));
    $book->fill(array(
    'path'=>'public/img/',
    'cover'=>$filename,
    'name'=>Input::get('bookname'),
    'category_id'=>Input::get('bookcategory'),
    'user_id'=>$userid,
    'info'=>Input::get('info'))
    );
     $book->save();
    if($book)
    {
        return Redirect::route('book');
    }

    }
    
    public function getDelete($id=null){
            if(is_null(DB::table('books')->where('id','=',$id)->get())){
                     return Response::json(array(
            'success' => false,
        ));
            }
            DB::table('books')->where('id','=',$id)->delete();
            DB::table('articles')->where('book_id','=',$id)->delete();
             return Response::json(array(
            'success' => true,
            'errors' => '',
        ));
    }
}