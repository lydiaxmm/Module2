<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Module 2 logout</title>
    <link rel="stylesheet" type="text/css" href="style/custom/style.css">
    <link rel="stylesheet" type="text/css" href="style/bootstrap/css/bootstrap.min.css" media="screen">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="span10 offset1 logout">
                <?php
                    session_start();
                    $user=$_SESSION['username'];
<<<<<<< HEAD
                    header("Location:login.php");
                    session_destroy();
                   // echo "$user".", you have successfully logged out.";
=======
                    session_destroy();
                    echo "$user".", you have successfully logged out.";
>>>>>>> FETCH_HEAD
                ?>
            </div>
        </div>
    </div>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="style/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>