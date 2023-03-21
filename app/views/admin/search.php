<?php

require_once APPROOT.'/helpers/user_session.php';

?>


<!DOCTYPE HTML>
<html>
<head>
    
    
    <meta name="viewport" content="width=device-width">
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/header.css" type="text/css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/form.css" type="text/css">
    
<title><?php echo 'SITENAME'; ?></title>    
</head>
<body>
    
       <?php require_once APPROOT.'/views/includes/header_1.php'; ?>


              <section class="wrapper">
    
                  <?php
                  
                   if(isset($_GET['type'])){
                       
                     if($_GET['type']=='update'){
                           
                   ?>
                  
                   <div class="form-container">
                  
                     <form method="post" action="<?php echo URLROOT ?>/admin/search?type=update">
    
                 
                      <div class="form-row">
                
                      <input type="number" name="std" class="std" placeholder="Enter Standard">
                      <p><?php echo $data['stdError']; ?></p>
                    
                      </div>
                
                      <div class="form-row">
                
                      <input type="number" name="rollno" class="rollno" placeholder="Enter Rollno">
                      <p><?php echo $data['rollnoError']; ?></p>
                
                      </div>
    
                
                       <div class="form-row">
                
                        <p align='center'><?php echo $data['errorMessage']; ?></p>
                        <input type="submit" name="submit" value="Search">
                
                       </div>
                 
                     </form>
              
    
                      
                  </div>
                  
                  
                  
                       <?php
                     
                       }
                       
                         else if($_GET['type']=='delete'){
                           
                       ?>
                  
                    <div class="form-container">
                  
                     <form method="post" action="<?php echo URLROOT ?>/admin/search?type=delete">
    
                 
                      <div class="form-row">
                
                      <input type="number" name="std" class="std" placeholder="Enter Standard">
                      <p><?php echo $data['stdError']; ?></p>
                    
                      </div>
                
                      <div class="form-row">
                
                      <input type="number" name="rollno" class="rollno" placeholder="Enter Rollno">
                      <p><?php echo $data['rollnoError']; ?></p>
                
                      </div>
    
                
                      <div class="form-row">
                
                       <p align='center'><?php echo $data['errorMessage']; ?></p>
                       <input type="submit" name="submit" value="Search">
                
                       </div>
                 
                    </form>
              
    
                      
                  </div>
                  
                  
                  
                        <?php
                           
                       }
                   }
                  
               
                  ?>
                
                  
              </section>
            
  
    
</body>
</html>