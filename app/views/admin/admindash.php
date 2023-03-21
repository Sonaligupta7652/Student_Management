<?php

require_once APPROOT.'/helpers/user_session.php';

?>
<!DOCTYPE HTML>
<html>
<head>
    
    
    <meta name="viewport" content="width=device-width">
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/header.css" type="text/css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/admindash.css" type="text/css">

    
<title><?php echo 'SITENAME'; ?></title>    
</head>
<body>
 
    <?php require_once APPROOT.'/views/includes/header_1.php'; ?>

    <section class="wrapper">
    
        <h1 class="title-header">Welcome to Admindash</h1>
    
        <table border="1px">
        
            <tr>
            
                <th>Add Student</th>
                <td><a href="<?php echo URLROOT ?>/admin/insert">Insert new Student</a></td>
                
            </tr>
            
            <tr>
            
                <th>Update Student</th>
                <td><a href="<?php echo URLROOT ?>/admin/search?type=update">Update old student</a></td>
            
            </tr>
            
             
            <tr>
            
                <th>Delete Student</th>
                <td><a href="<?php echo URLROOT ?>/admin/search?type=delete">Delete exisiting student</a></td>
            
            </tr>
            
            
            
        </table>
        
    </section>
    
    
</body>    
</html>