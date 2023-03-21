<?php

class Pages extends Controller{
    
    public function __construct(){
    
       $this->userModal=$this->modal('User');
    
    }
    
    public function index(){
        
          $data=[
            
            'std'=>'',
            'rollno'=>'',
            'stdError'=>'',
            'rollnoError'=>'',
            'errorMessage'=>''
            
        ];
        
        if($_SERVER['REQUEST_METHOD']=='POST'){
            
          $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
          
            $data=[
            
            'std'=>trim($_POST['std']),
            'rollno'=>trim($_POST['rollno']),
            'stdError'=>'',
            'rollnoError'=>'',
            'errorMessage'=>''
            
           ];
          
           if(empty($data['std'])){
               
               $data['stdError']='Please enter standard';
           }    
            
           if(empty($data['rollno'])){
               
               $data['rollnoError']='Please enter rollno';
           }
            
           
            
           if(empty($data['stdError']) && empty($data['rollnoError'])){
               
               if($this->userModal->search($data['std'],$data['rollno'])){
                   
                     header('location:'.URLROOT.'/pages/info/'.$data['std'].'/'.$data['rollno']);                  
                       
               }
               
               else{
                   
                   $data['errorMessage']='No records found';
               }
                      
           }
            
        }
        
        
        $this->view('pages/index',$data);
        
    }
    
    public function info($std,$rollno){
        
        $data=$this->userModal->search($std,$rollno);
        
        $this->view('pages/info',$data);

    }
    
    public function admin(){
        
        $data=[
            
            'usernameError'=>'',
            'passwordError'=>'',
            'username'=>'',
            'password'=>''
            
        ];
        
        if($_SERVER['REQUEST_METHOD']=='POST'){

            
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
         
            $data=[
            
            'usernameError'=>'',
            'passwordError'=>'',
            'username'=>trim($_POST['username']),
            'password'=>trim($_POST['password'])
            
            ];
        
            if(empty($data['username'])){
                
                $data['usernameError']='Please enter username';
            }
            
            else{
                
                if(!$this->userModal->checkUserByUsername($data['username'])){
                    
                    $data['usernameError']='Username not registered';
                }
            }
            
            if(empty($data['password'])){
                
                $data['passwordError']='Please enter password';
            }
                    
            
            if(empty($data['usernameError']) && empty($data['passwordError'])){
                
                $loggedInUser=$this->userModal->login($data);
                
                if($loggedInUser){
                
                   $this->createUserSession($loggedInUser);    
                   
                }
                
                else{
                    
                    $data['passwordError']='Incorrect password';
                }
                
            }
            
            
        }
        
        $this->view('pages/admin',$data);
    }
    
    public function createUserSession($user){
        
        session_start();
        
        $_SESSION['uid']=$user->id;
        
        header('location:'.URLROOT.'/admin/admindash');
    }
 
}

?>