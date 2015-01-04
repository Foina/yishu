<?php
class CategoriesController extends BaseController {
        public function getIndex()
        {
            $categories=DB::table('categories')->orderBy('id','DESC')->get();
            
            return View::make('categories.categories',compact('categories'))->with($this->view_data);
        }
}