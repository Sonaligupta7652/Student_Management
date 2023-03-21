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
    
        <div class="form-container">
        
            <form method="post" action="<?php echo URLROOT ?>/admin/insert">
            
                <div class="form-row">
                
                    <input type="text" name="first" class="first" placeholder="Enter first name">
                    <p><?php echo $data['firstError']; ?></p>
                    
                </div>
                
                
                <div class="form-row">
                
                    <input type="text" name="last" class="last" placeholder="Enter last name">
                    <p><?php echo $data['lastError']; ?></p>
                    
                </div>
                
                  <div class="form-row">
                
                    <input type="number" name="std" class="std" placeholder="Enter standard">
                    <p><?php echo $data['stdError']; ?></p>
                    
                </div>
                
                  
                <div class="form-row">
                
                    <input type="number" name="rollno" class="rollno" placeholder="Enter rollno">
                    <p><?php echo $data['rollnoError']; ?></p>
                    
                </div>
                
               
                
                <div class="form-row">
                
                    <input type="number" name="contact" class="contact" placeholder="Enter contact">
                    <p><?php echo $data['contactError']; ?></p>
                
                </div>
            
                
                 <div class="form-row">
                
                    <input type="text" name="city" class="city" placeholder="Enter city">
                    <p><?php echo $data['cityError']; ?></p>
                
                </div>
                
                <div class="form-row">
                
                    <p class="success-message"><?php echo $data['successMessage']; ?></p>
                    <input type="submit" name="submit" value="Register">
                
                </div>
                
            </form>
        
        </div>
    
    </section>
    
</body>    
</html>