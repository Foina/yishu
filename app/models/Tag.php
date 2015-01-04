<?php
 class Tag extends Eloquent{
       
       public function books()
        {
           return $this->hasMany('Books');
        }
        
        public function categories()
        {
            return $this->belongsToMany('Categories');
        }
 } 