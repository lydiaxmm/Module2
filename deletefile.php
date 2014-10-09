<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Delete a file</title>
    <link rel="stylesheet" type="text/css" href="style/custom/style.css"></head>
    <link rel="stylesheet" type="text/css" href="style/bootstrap/css/bootstrap.min.css" media="screen"></head>
</head>
<body>
    <?php
        session_start();
        $user=$_SESSION['username'];
        $filetodelete = $_SESSION['filetodelete'];
        $full_path = sprintf("/home/emilysybrant/public_html/module2group/fileuploaded/%s/%s", $user, $filetodelete);
        unlink("$full_path");
        $_SESSION['deletestatus'] = "File successfully deleted.";
        header("Location:fileshare.php");
        exit();
    
    ?>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="style/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>