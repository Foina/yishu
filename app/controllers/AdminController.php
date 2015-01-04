<?php

class AdminController extends BaseController {
    
    public function getAdmin(){
        if(Auth::check()&& Auth::user()->role_id==2)
        {
            $users=User::All();
            $books=Book::All();
            return View::make('Admin/index',compact('users'),compact('books'));
         }
         else
         {
                 return Redirect::back()->withErrors( '无权限访问');
         }
    }
    public function getLogin(){
        return View::make('Admin/login');
    }
    public function postLogin()
    {
        $rules = array(
             'email' => 'required|email|exists:users,email',
            'password' => 'required',
            'remember' => 'in:0,1',
        );
        $messages= array(
            'email.required' => '用户名必须填',
            'password.required' =>'密码必须填',
        );
         $validator = Validator::make(Input::all(), $rules,$messages);
        if ($validator->fails()){
            return Redirect::back()->withInput()->withErrors($validator);
        }
        
        if (!Auth::attempt(array(
                    'email' => Input::get('email'),
                    'password' =>Input::get('password'),
               ), Input::get('remember'))) {
            return Redirect::back()->withErrors( '用户名或密码错误');
        }

        return Redirect::route('admin');
    }
    public function getLogout()
    {
            Auth::logout();
            return Redirect::route('admin/login');
    }
}