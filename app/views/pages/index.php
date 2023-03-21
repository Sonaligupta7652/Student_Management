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
        
            <form method="post" action="index.php">
            
                <div class="form-row">
                
                    <input type="number" name="rollno" class="rollno" placeholder="Enter rollno">
                    <p><?php echo $data['rollnoError']; ?></p>
                    
                    
                </div>
                
                <div class="form-row">
                
                    <input type="number" name="std" class="std" placeholder="Enter standard">
                    <p><?php echo $data['stdError']; ?></p>
                    
                </div>
                
                <div class="form-row">
                
                    <p align="center"><?php echo $data['errorMessage']; ?></p>
                    <input type="submit" name="submit" value="Show info">
                
                </div>
                
            </form>
        
        </div>
    
    </section>
    
</body>    
</html>