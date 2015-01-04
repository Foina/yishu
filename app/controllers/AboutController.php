<?php
class AboutController extends BaseController {
            
            public function getIndex(){
                
                return View::make('About.about',$this->view_data);
            
            }
}