<?php

class BaseController extends Controller {
//    protected $restful  = true;
//protected $layout = 'layouts.head';
  protected $view_data = array();
  
    public function __construct() 
    {
    
        $tags=DB::table('tags')->join('tag_book', 'tags.id', '=', 'tag_book.tag_id')->orderBy('tag_book.frequency', 'DESC')->get();
        $states=DB::table('states')->orderBy('created_at','DESC')->get();
        
        $this->view_data=[
        'tags' => $tags,
       'states'=>$states,
        ];
    
    
        $this->beforeFilter('csrf', array(
            'on' => array(
                'post',
            ),
        ));
    }
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
    
    
}