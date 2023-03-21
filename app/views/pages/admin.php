<?php

session_start();
if(isset($_SESSION['uid'])){
    
    header('location:'.URLROOT.'/admin/admindash');
    
}

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
 
    <?php require_once APPROOT.'/views/includes/header.php'; ?>
    
    <section class="wrapper">
    
        <div class="form-container">
        
            <form method="post" action="<?php echo URLROOT ?>/pages/admin">
            
                <div class="form-row">
                
                    <input type="text" name="username" class="username" placeholder="Enter username">
                    <p><?php echo $data['usernameError']; ?></p>
                    
                </div>
                
                <div class="form-row">
                
                    <input type="password" name="password" class="password" placeholder="Enter password">
                    <p><?php echo $data['passwordError']; ?></p>
                    
                </div>
                
                <div class="form-row">
                
                    <input type="submit" name="submit" value="Login">
                
                </div>
                
            </form>
        
        </div>
    
    </section>
    
</body>    
</html>