<?php

class Admin extends Controller{
    
    public function __construct(){
        
        $this->userModal=$this->modal('User');
    }
    
    public function register(){
        
        $data=[
          
            'username'=>'',
            'email'=>'',
            'password'=>'',
            'usernameError'=>'',
            'emailError'=>'',
            'passwordError'=>'',
            'successMessage'=>''
            
        ];
        
        if($_SERVER['REQUEST_METHOD']=='POST'){
                 
          $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            
          $data=[
          
            'username'=>trim($_POST['username']),
            'email'=>trim($_POST['email']),
            'password'=>trim($_POST['password']),
            'usernameError'=>'',
            'emailError'=>'',
            'passwordError'=>'',
            'successMessage'=>''
            
          ];
           
          //validating username     
          $nameValidation="/^[a-zA-Z0-9]*$/";
           
          if(empty($data['username'])){
              
              $data['usernameError']='Please enter username';
          }    
          
          else if($this->userModal->checkUserByUsername($data['username'])){
              
              $data['usernameError']='Username not avaliable';
          }
            
          else{
         
              if(!preg_match($nameValidation,$data['username'])){
                  
                  $data['usernameError']='Username can only contain letters and symbols';
              }
              
          }
            
          //validating email
            
          if(empty($data['email'])){
              
              $data['emailError']='Please enter E-mail address';
          }
            
          else if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
              
              $data['emailError']='Invalid E-mail address';
          }
         
          else{
              
              if($this->userModal->checkUserByEmail($data['email'])){
                  
                  $data['emailError']='E-mail already registered';
              }
          }    
         
          //validating password
            
            if(empty($data['password'])){
                
                $data['passwordError']='Please enter password';
            }
            
            else{
                
                if(strlen($data['password'])<6 || strlen($data['password'])>62){
                    
                   $data['passwordError']='Password must contain 6 letters'; 
                }
            }
            
            
            if(empty($data['usernameError']) && empty($data['emailError']) && empty($data['passwordError'])){
            
                $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
                
                if($this->userModal->register($data)){
                    
                    $data['successMessage']='User registered successfully';
                }
                
                else{
                    
                    die('Somthing went wrong please retry');
                }
                
            
            }
        }
        
        $this->view('admin/register',$data);
    }
    
    public function admindash(){
        
        $this->view('admin/admindash');
    }

    public function insert(){
        
        $data=[
            
            'first'=>'',
            'last'=>'',
            'std'=>'',
            'rollno'=>'',
            'contact'=>'',
            'city'=>'',
            'firstError'=>'',
            'lastError'=>'',
            'stdError'=>'',
            'rollnoError'=>'',
            'contactError'=>'',
            'cityError'=>'',
            'successMessage'=>''
            
        ];
        
        if($_SERVER['REQUEST_METHOD']=='POST'){
           
          $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
          
             
          $data=[
            
            'first'=>trim($_POST['first']),
            'last'=>trim($_POST['last']),
            'std'=>trim($_POST['std']),
            'rollno'=>trim($_POST['rollno']),
            'contact'=>trim($_POST['contact']),
            'city'=>trim($_POST['city']),
            'firstError'=>'',
            'lastError'=>'',
            'stdError'=>'',
            'rollnoError'=>'',
            'contactError'=>'',
            'cityError'=>'',
            'successMessage'=>''
            
            ];
         
            //validating first name
            
            $firstname='/[A-Za-z]{3,30}$/';
            
            if(empty($data['first'])){
                
                $data['firstError']='Please enter first name';
            }
            
            else{
                
                if(!preg_match($firstname,$data['first'])){
                    
                    $data['firstError']='Invalid first name';
                }
                
            }
            
            //validating last name
           
            $lastname='/[A-Za-z]{3,30}$/';
            
            if(empty($data['last'])){
                
                $data['lastError']='Please enter last name';
            }
            
            else{
                
                if(!preg_match($lastname,$data['last'])){
                    
                    $data['lastError']='Invalid last name';
                }
                
            }
            
            //validating standard
            
            if(empty($data['std'])){
                
                $data['stdError']='Please enter standard';
            }
            
            //validating rollno
            
            if(empty($data['rollno'])){
                
                $data['rollnoError']='Please enter rollno';
            }
            
            else{
                
                if($this->userModal->checkUserByRollno($data['rollno'],$data['std'])){
                    
                    $data['rollnoError']='Rollno already registered';
                }
                
            }
            
            //validating contact
            
            if(empty($data['contact'])){
                
                $data['contactError']='Please enter contact';
            }
            
            //validaing city
            
            if(empty($data['city'])){
                
                $data['cityError']='Please enter city';
            }
            
            else{
                
                if(strlen($data['city'])>50){
                    
                    $data['cityError']='Invalid city length';
                }
            }
            
            if(empty($data['firstError']) && empty($data['lastError']) && empty($data['stdError']) && empty($data['rollnoError']) && empty($data['contactError']) && empty($data['cityError'])){
            
                if($this->userModal->insert($data)){
                    
                    $data['successMessage']='Student registered successfully';
                }
                
                else{
                    
                    die('Something went wrong please retry');
                }
            
            }
            
        }
        
        $this->view('admin/insert',$data);
    }
    
    public function search(){
        
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
                   
                   if(isset($_GET['type'])){
                       
                       if($_GET['type']=='update'){
                            
                           header('location:'.URLROOT.'/admin/details/'.$data['std'].'/'.$data['rollno']);
                    
                           
                       }
                       
                       else if($_GET['type']=='delete'){
                           
                           header('location:'.URLROOT.'/admin/delete/'.$data['std'].'/'.$data['rollno']);
                  
                           
                       }
                   }
                   
                   
                  
                       
               }
               
               else{
                   
                   $data['errorMessage']='No records found';
               }
                      
           }
            
        }
        
        $this->view('admin/search',$data);
    }
    
    public function details($std,$rollno){
            
        $data=$this->userModal->search($std,$rollno);
        
        $this->view('admin/details',$data);

    }
    
    public function delete($std,$rollno){
       
        $data=$this->userModal->search($std,$rollno);
        
        $this->view('admin/delete',$data);
 
      
    }
  
    public function confirm($id){
        
      $data=[
          
          'id'=>$id,
      
      ];
        
      if($_SERVER['REQUEST_METHOD']=='POST'){
            
         $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
         
          if(isset($_POST['yes'])){
            
              if($this->userModal->delete($id)){
                  
                  header('location:'.URLROOT.'/admin/message');
              }
              
              else{
                  
                  die('smmething went wrong');
              }
            
          }
          
          else if(isset($_POST['no'])){
              
              header('location:'.URLROOT.'/admin/search?type=delete');
          }
          
         
      
      }
        
        $this->view('admin/confirm',$data);
    }
    
    public function message(){
        
        $this->view('admin/message');
    }
    
    public function update($id){
        
         $info=$this->userModal->getData($id);
        
          $data=[
            
            'first'=>'',
            'last'=>'',
            'std'=>'',
            'rollno'=>'',
            'contact'=>'',
            'city'=>'',
            'firstError'=>'',
            'lastError'=>'',
            'stdError'=>'',
            'rollnoError'=>'',
            'contactError'=>'',
            'cityError'=>'',
            'successMessage'=>'',
            'info'=>$info,
            'id'=>$id
            
        ];
        
         if($_SERVER['REQUEST_METHOD']=='POST'){
           
          $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
          
             
          $data=[
            
            'first'=>trim($_POST['first']),
            'last'=>trim($_POST['last']),
            'std'=>trim($_POST['std']),
            'rollno'=>trim($_POST['rollno']),
            'contact'=>trim($_POST['contact']),
            'city'=>trim($_POST['city']),
            'firstError'=>'',
            'lastError'=>'',
            'stdError'=>'',
            'rollnoError'=>'',
            'contactError'=>'',
            'cityError'=>'',
            'successMessage'=>'',
            'info'=>$info,
            'id'=>$id
            
            ];
         
             
            //validating first name
            
            $firstname='/[A-Za-z]{3,30}$/';
            
            if(empty($data['first'])){
                
                $data['firstError']='Please enter first name';
            }
            
            else{
                
                if(!preg_match($firstname,$data['first'])){
                    
                    $data['firstError']='Invalid first name';
                }
                
            }
            
            //validating last name
           
            $lastname='/[A-Za-z]{3,30}$/';
            
            if(empty($data['last'])){
                
                $data['lastError']='Please enter last name';
            }
            
            else{
                
                if(!preg_match($lastname,$data['last'])){
                    
                    $data['lastError']='Invalid last name';
                }
                
            }
            
            //validating standard
            
            if(empty($data['std'])){
                
                $data['stdError']='Please enter standard';
            }
            
            //validating rollno
            
            if(empty($data['rollno'])){
                
                $data['rollnoError']='Please enter rollno';
            }
            
            else{
                
                if($this->userModal->checkOthersByRollno($data['rollno'],$data['std'],$data['id'])){
                    
                    $data['rollnoError']='Rollno already registered';
                }
                
            }
            
            //validating contact
            
            if(empty($data['contact'])){
                
                $data['contactError']='Please enter contact';
            }
            
            //validaing city
            
            if(empty($data['city'])){
                
                $data['cityError']='Please enter city';
            }
            
            else{
                
                if(strlen($data['city'])>50){
                    
                    $data['cityError']='Invalid city length';
                }
            }
            
            
             if(empty($data['firstError']) && empty($data['lastError']) && empty($data['stdError']) && empty($data['rollnoError']) && empty($data['contactError']) && empty($data['cityError'])){
            
               
                 if($this->userModal->update($data)){
                     
                     $data['successMessage']='Data updated successfully';
                 }
               
                 else{
                     
                     die('Something went wrong please retry');
                 }
                 
             }
             
           
        }
        
        $this->view('admin/update',$data);
    }
    
    public function logout(){
        
        session_start();
        session_destroy();
        
        header('location:'.URLROOT.'/pages/admin');
    }
}

?>