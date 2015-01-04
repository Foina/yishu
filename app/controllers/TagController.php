<?php
 class TagController extends BaseController{
               
              public   function getIndex($id=null,$name=null){
                        
                      $tag_books=DB::table('books')->where('tag_id','=',$id)->paginate(10);
                        return View::make('tags.tag',compact('tag_books','name'))->with($this->view_data);
              }
 }