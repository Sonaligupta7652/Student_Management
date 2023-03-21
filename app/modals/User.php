<?php

class User{
    
    private $db;
    
   public function __construct(){
        
        $this->db=new Database;
    }
    
   public function checkUserByUsername($username){
        
        $sql='SELECT username FROM users WHERE username=:username';
        
        $this->db->query($sql);
        
        $this->db->bind(':username',$username);
        
        if($this->db->rowCount()>0){
            
            return true;
        }
        
        else{
            
            return false;
        }
        
    }
    
   public function checkUserByEmail($email){
       
       $sql='SELECT email FROM users WHERE email=:email';
       
       $this->db->query($sql);
       
       $this->db->bind(':email',$email);
       
       if($this->db->rowCount()>0){
           
           return true;
       }
       
       else{
           
           return false;
       }
       
   }
    
   public function checkUserByRollno($rollno,$std){
       
       $sql='SELECT rollno FROM student WHERE std=:std and rollno=:rollno';
       
       $this->db->query($sql);
       
       $this->db->bind(':std',$std);
       $this->db->bind(':rollno',$rollno);
       
       if($this->db->rowCount()>0){
           
           return true;
       }
       
       else{
           
           return false;
       }
       
   }
   
   public function checkOthersByRollno($rollno,$std,$id){
       
       $sql='SELECT rollno FROM student WHERE std=:std and rollno=:rollno and id!=:id';
       
       $this->db->query($sql);
       
       $this->db->bind(':std',$std);
       $this->db->bind(':rollno',$rollno);
       $this->db->bind(':id',$id);
       
       if($this->db->rowCount()>0){
           
           return true;
       }
       
       else{
           
           return false;
       }
       
   }    
    
   public function insert($data){
       
       $sql='INSERT INTO student VALUES (NULL,:first,:last,:std,:rollno,:contact,:city)';
       
       $this->db->query($sql);
       
       $this->db->bind(':first',$data['first']);
       $this->db->bind(':last',$data['last']);
       $this->db->bind(':std',$data['std']);
       $this->db->bind(':rollno',$data['rollno']);
       $this->db->bind(':contact',$data['contact']);
       $this->db->bind(':city',$data['city']);
       
       if($this->db->execute()){
           
           return true;
       }
       
       else{
           
           return false;
       }
       
   }    
     
   public function update($data){
       
       $sql='UPDATE student SET first=:first,last=:last,std=:std,rollno=:rollno,contact=:contact,city=:city WHERE id=:id';
       
       $this->db->query($sql);
       
       $this->db->bind(':first',$data['first']);
       $this->db->bind(':last',$data['last']);
       $this->db->bind(':std',$data['std']);
       $this->db->bind(':rollno',$data['rollno']);
       $this->db->bind(':contact',$data['contact']);
       $this->db->bind(':city',$data['city']);
       $this->db->bind(':id',$data['id']);
       
       if($this->db->execute()){
           
           return true;
       }
       
       else{
           
           return false;
       }
       
   }        
    
   public function delete($id){
       
       $sql='DELETE FROM student WHERE id=:id';
       
       $this->db->query($sql);
       
       $this->db->bind(':id',$id);
       
       if($this->db->execute()){
           
           return true;
       }
       
       else{
           
           return false;
       }
   }
    
   public function search($std,$rollno){
       
       $sql='SELECT * FROM student WHERE std=:std AND rollno=:rollno';
       
       $this->db->query($sql);
       
       $this->db->bind(':std',$std);
       $this->db->bind(':rollno',$rollno);
       
       if($this->db->rowCount()>0){
           
           $row=$this->db->single();
           
           return $row;
           
       }
       
       else{
           
           return false;
       }
       
   } 
    
   public function register($data){
      
      $sql='INSERT INTO users VALUES (NULL,:username,:email,:password)';
      
      $this->db->query($sql);
      
      $this->db->bind(':username',$data['username']);
      $this->db->bind(':email',$data['email']);
      $this->db->bind(':password',$data['password']);
      
      if($this->db->execute()){
          
          return true;
      }
      
      else{
          
          return false;
      }
  }
    
   public function login($data){
      
      $sql='SELECT * FROM users WHERE username=:username';
      
      $this->db->query($sql);
      
      $this->db->bind(':username',$data['username']);
      
      $row=$this->db->single();
      
      $hashed_password=$row->password;
      
      if(password_verify($data['password'],$hashed_password)){
              
          return $row;
      }
      
      else{
          
          return false;
      }  
  }  
    
   public function getData($id){
       
       $sql='SELECT * FROM student WHERE id=:id';
       
       $this->db->query($sql);
       
       $this->db->bind(':id',$id);
       
       if($this->db->rowCount()>0){
           
           $data=$this->db->single();
           
           return $data;
           
       }
       
       else{
           
           return false;
       }
       
   }    
    
}

?>