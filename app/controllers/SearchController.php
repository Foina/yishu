<?php
class SearchController extends BaseController {
    
    public function getIndex($word){
        $word = trim(urldecode($word));
        
        $results = array();
        if ($word) {
            $results = Article::where('title', 'LIKE', "%{$word}%")->orderBy('id', 'DESC')->get();
        }
        
        return View::make('search.search', $this->view_data)->with(compact('results'));
        //return View::make('search.search',compact('results'))->with(compact('tags'))->with(compact('states'));
        
    }
}