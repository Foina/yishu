<?php
class Article extends Eloquent{
     protected $fillable = array('title', 'content','user_id','book_id','page_num');
      public function books()
        {
           return $this->belongsTo('Books','Book_id');
        }
}