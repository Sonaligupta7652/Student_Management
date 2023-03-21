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
 
    
    <?php
    
    $info=$data['info'];
    
    
    if($info){
    
    require_once APPROOT.'/views/includes/header_1.php';    
        
        ?>
        
    <section class="wrapper">
    
        <div class="form-container">
        
            <form method="post" action="<?php echo URLROOT ?>/admin/update/<?php echo $info->id; ?>">
            
                <div class="form-row">
                
                    <input type="text" name="first" class="first" placeholder="Enter first name" value="<?php echo $info->first; ?>">
                    <p><?php echo $data['firstError']; ?></p>
                    
                </div>
                
                
                <div class="form-row">
                
                    <input type="text" name="last" class="last" placeholder="Enter last name"  value="<?php echo $info->last; ?>">
                    <p><?php echo $data['lastError']; ?></p>
                    
                </div>
                
                  <div class="form-row">
                
                    <input type="number" name="std" class="std" placeholder="Enter standard" value="<?php echo $info->std; ?>">
                    <p><?php echo $data['stdError']; ?></p>
                    
                </div>
                
                  
                <div class="form-row">
                
                    <input type="number" name="rollno" class="rollno" placeholder="Enter rollno" value="<?php echo $info->rollno; ?>">
                    <p><?php echo $data['rollnoError']; ?></p>
                    
                </div>
                
               
                
                <div class="form-row">
                
                    <input type="number" name="contact" class="contact" placeholder="Enter contact"  value="<?php echo $info->contact; ?>">
                    <p><?php echo $data['contactError']; ?></p>
                
                </div>
            
                
                 <div class="form-row">
                
                    <input type="text" name="city" class="city" placeholder="Enter city"  value="<?php echo $info->city; ?>">
                    <p><?php echo $data['cityError']; ?></p>
                
                </div>
                
                <div class="form-row">
                
                    <p class="success-message"><?php echo $data['successMessage']; ?></p>
                    <input type="submit" name="submit" value="Update">
                
                </div>
                
            </form>
        
        </div>
    
    </section>

      <?php
 
     }
    
    else{
        
        die('Something went wrong');
        
    }
    
    
    
    ?>

</body>    
</html>