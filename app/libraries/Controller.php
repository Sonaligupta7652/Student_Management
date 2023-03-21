<?php

class Controller{
   
    public function modal($modal){
        
        require_once '../app/modals/'.$modal.'.php';
        
        return new $modal;
    }
    
    public function view($view,$data=[]){
        
        if(file_exists('../app/views/'.$view.'.php')){
            
            require_once '../app/views/'.$view.'.php';
        }
        
        else{
            
            die('404 not found');
        }
        
    }
}

?>
