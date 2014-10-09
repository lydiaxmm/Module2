<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Module 2 Login</title>
    <link rel="stylesheet" type="text/css" href="style/custom/style.css">
    <link rel="stylesheet" type="text/css" href="style/bootstrap/css/bootstrap.min.css" media="screen">
</head>
<body>
    <div class="container">
    <div class="row">
    <div class="span10 offset1 login">

    <form method="POST">
        <h1 class="header">File Share User Login</h1>
        <h2 class="subhead">Don't have a username? Enter a username and click sign up!</h2>
        <p>
            <input type="text" name="username" id="usernameinput" />
        </p>
            <input type="submit" value="Log In" name="login" />
            <input type="submit" value="Sign Up" name="signup" />
    </form>
    </div>
    </div>

    
    <?php
        $userarray = file('users.txt', FILE_IGNORE_NEW_LINES);
        
        if(isset($_POST['username']) and isset($_POST['login'])){
            $user = htmlentities($_POST['username']);
            for($i=0; $i<count($userarray); $i++){
                if((strcmp($user, $userarray[$i])) == 0){
                    session_start();
                    $_SESSION['username']=$user;
                    $_SESSION['uploadstatus'] = "";
                    $_SESSION['filename'] = "";
                    $_SESSION['deletestatus'] = "";
                    $_SESSION['filetodelete'] = "";
                    header("Location:fileshare.php");
                    exit();
                }
            }
        }
        
        if(isset($_POST['username']) and isset($_POST['signup'])){
            $user = htmlentities($_POST['username']);
            session_start();
            $_SESSION['username']=$user;
            $_SESSION['uploadstatus'] = "";
            $_SESSION['filename'] = "";
            $_SESSION['deletestatus'] = "";
            $_SESSION['filetodelete'] = "";
            header("Location:newuser.php");
            exit();
        }
    ?>
    
    </div>

    
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="style/bootstrap/js/bootstrap.min.js"></script>
        
</body>
</html>