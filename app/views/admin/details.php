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
    
        <h1 class="title-header">Search Result</h1>
    
        <table border="1px">
        
          
            <tr>
            
                <th>First</th>
                <th>Last</th>
                <th>Standard</th>
                <th>Rollno</th>
                <th>Edit</th>
            
            </tr>
            
            <tr>
            
                <td><?php echo $data->first; ?></td>
                <td><?php echo $data->last; ?></td>
                <td><?php echo $data->std; ?></td>
                <td><?php echo $data->rollno; ?></td>
                <td><a href="<?php echo URLROOT ?>/admin/update/<?php echo $data->id; ?>">Edit</a></td>
            
            </tr>
            
            
        </table>
        
    </section>
    
    
</body>    
</html>