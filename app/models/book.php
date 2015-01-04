<?php

class Book extends Eloquent {
    
    protected $fillable = array('path', 'cover', 'name','user_id','category_id','info');
  
    public function category()
    {
        return $this->belongsTo('Category');
    }
    
    public function article()
    {
        return $this->hasMany('Article','book_id');
    }
    
    public function user()
    {
        return $this->belongsTo('User');
    }
    
    public function tags()
    {
        return $this->belongsToMany('Tag_book', 'tag_book', 'tag_id', 'book_id');
    }
}