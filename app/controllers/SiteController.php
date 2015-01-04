<?php

class SiteController extends BaseController {

    public function getHome()
	{
        $books = Book::orderBy('id', 'DESC')->orderBy('created_at', 'DESC')->take(5)->get();
        $viewbooks = Book::orderBy('id', 'DESC')->orderBy('viewNum', 'DESC')->take(5)->get();
        $articles=DB::table('articles')->orderBy('id','DESC')->orderBy('created_at','DESC')->take(5)->get();
        $comments=DB::table('comments')->orderBy('id','DESC')->orderBy('created_at','DESC')->take(5)->get();
        $tags=DB::table('tags')->join('tag_book', 'tags.id', '=', 'tag_book.tag_id')->orderBy('tag_book.frequency', 'DESC')->get();
        $states=DB::table('states')->orderBy('created_at','DESC')->get();
		return View::make('home',compact('books'))->with(compact('articles'))->with(compact('comments'))->with(compact('viewbooks'))->with($this->view_data);
	}
    
    public function postSignin()
    {
        $rules = array(
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
            'remember' => 'in:0,1',
        );
        
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()){
            return Response::json(array(
                'success' => false,
                'errors' => $validator->messages()->first('email'),
            ));
        }
        
        if (!Auth::attempt(array(
                    'email' => Input::get('email'),
                    'password' =>Input::get('password'),
               ), Input::get('remember'))) {
            return Response::json(array(
                'success' => false,
                'errors' => 'user or password invalid.',
            ));
        }

        return Response::json(array(
            'success' => true,
            'errors' => '',
        ));
       
    }    
    
    
    public function postSignup()
    {
        $rules = array(
            'name' => 'required|min:3|max:64',
            'pd' => 'required|min:6|max:64',            
            'sex' => 'in:male,female',
            'el'=>'required|email|unique:users,email',
            'year' => 'integer|between:1900,2013',
            'month' => 'integer|between:1,12',
            'day' => 'integer|between:1,31',
            'phone' => 'max:15',
            'qq' => 'min:5|max:15',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()){
            return Response::json(array(
                'success' => false,
                'errors' => $validator->messages()->toArray(),
            ));
        }
        
        $birthday = Input::get('year').Input::get('month').Input::get('day');
    
        $user = new User;
        $user->fill(array(
            'name' => Input::get('name'),
            'password' =>  Hash::make(Input::get('pd')),
            'email' => Input::get('el'),
            'role_id' => 1,
            'sex' => Input::get('sex','male'),
            'birthday'=> $birthday,
            'address' => Input::get('address'),
            'phone'=>Input::get('phone'),
            'qq'=>Input::get('qq'),
            'activation_code' => md5(Hash::make(time())),
        ));
        $user->save();
        return Response::json(array(
            'success' => true,
            'errors' => '',
        ));
    }
    
    public function getSignout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return Redirect::home();
    }
}