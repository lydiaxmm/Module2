<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Module 2 Login</title>
    <link rel="stylesheet" type="text/css" href="style/custom/style.css"></head>
    <link rel="stylesheet" type="text/css" href="style/bootstrap/css/bootstrap.min.css" media="screen"></head>
</head>
<body>
    
    <?php
        session_start();
        $user=$_SESSION['username'];
        $userfilename = $user.'filelist.txt';

        $fp = fopen("$userfilename","wb");
        chmod($userfilename, 0777);
        fclose($fp);
        
        mkdir("/home/emilysybrant/public_html/module2group/fileuploaded/$user");
        
        header("Location:fileshare.php");
        exit();
    ?>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="style/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>