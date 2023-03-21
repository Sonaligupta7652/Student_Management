<?php

require_once APPROOT.'/helpers/user_session.php';

?>
<!DOCTYPE HTML>
<html>
<head>
    
    
    <meta name="viewport" content="width=device-width">
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/header.css" type="text/css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/confirm.css" type="text/css">
    
<title><?php echo 'SITENAME'; ?></title>    
</head>
<body>
 
    <?php require_once APPROOT.'/views/includes/header_1.php'; ?>
    
    <section class="wrapper">
   
       
        <div class="form-container">
        <h1>Are u sure you want to delete ?</h1>
       
        <form method="post" action="<?php echo URLROOT ?>/admin/confirm/<?php echo $data['id']; ?>">
        
            <div class="form-row">
            <input type="submit" value="Yes" name="yes" class="yes">
            <input type="submit" value="No" name="no" class="no">
            </div>
                
        </form>
            
        </div>
    
    </section>
    
</body>    
</html>