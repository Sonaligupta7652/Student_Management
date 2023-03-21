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
        
            <form method="post" action="<?php echo URLROOT ?>/admin/register">
            
                <div class="form-row">
                
                    <input type="text" name="username" class="username" placeholder="Enter username">
                    <p><?php echo $data['usernameError']; ?></p>
                    
                </div>
                
                 <div class="form-row">
                
                    <input type="email" name="email" class="email" placeholder="Enter email">
                     <p><?php echo $data['emailError']; ?></p>
                
                </div>
                
                <div class="form-row">
                
                    <input type="password" name="password" class="password" placeholder="Enter password">
                    <p><?php echo $data['passwordError']; ?></p>
                
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