<?php

class Category extends Eloquent {

        public function tags()
        {
           return $this->hasMany('Tags');
        }
}