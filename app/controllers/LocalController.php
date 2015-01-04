<?php
class LocalController extends BaseController {
            
            public function getIndex(){
                
                return View::make('local.local',$this->view_data);
            
            }
}