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
 
    <?php require_once APPROOT.'/views/includes/header.php'; ?>
     <section class="wrapper">
    
        <h1 class="title-header">Student details</h1>
    
        <table border="1px">
        
          
            <tr>
            
                <th>First</th>
                <th>Last</th>
                <th>Standard</th>
                <th>Rollno</th>
                <th>Contact</th>
                <th>City</th>
               
            
            </tr>
            
            <tr>
            
                <td><?php echo $data->first; ?></td>
                <td><?php echo $data->last; ?></td>
                <td><?php echo $data->std; ?></td>
                <td><?php echo $data->rollno; ?></td>
                <td><?php echo $data->contact; ?></td>
                <td><?php echo $data->city; ?></td>
             
            
            </tr>
            
            
        </table>
        
    </section>
    
    
</body>    
</html>