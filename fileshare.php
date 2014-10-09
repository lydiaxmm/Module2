<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-8">
    <title>Your files</title>
    <link rel="stylesheet" type="text/css" href="style/custom/style.css">
    <link rel="stylesheet" type="text/css" href="style/bootstrap/css/bootstrap.min.css" media="screen">
</head>
<body>
    <div class="container">
    <?php
        session_start();
        $user=$_SESSION['username'];
        $uploadstatus = $_SESSION['uploadstatus'];
        $deletestatus = $_SESSION['deletestatus'];
        $newfilename = $_SESSION['filename'];
        $deletedfile = $_SESSION['filetodelete'];
        $userfilename = $user.'filelist.txt';
        $filearray=""; 
        $filearray = file("$userfilename", FILE_IGNORE_NEW_LINES);
        $filearraysize = count($filearray);
        
        if (strcmp($uploadstatus,"")!=0){
            array_push($filearray, $newfilename);
            $filearraysize++;
        }else if(strcmp($deletestatus,"")!=0){
            for ($i=0; $i<$filearraysize; $i++){
                if ((strcmp($filearray[$i],$deletedfile))==0){
                    unset($filearray[$i]);
                    for($x = $i; $x<$filearraysize-1; $x++){ #fix this
                        $filearray[$x]=$filearray[$x+1];
                    }
                }
            }
            $filearraysize = $filearraysize-1;
        }
        
        file_put_contents($userfilename, "");
        $handle = fopen($userfilename, "w");
        for ($i=0; $i<$filearraysize; $i++){
            fwrite($handle, "$filearray[$i]\n");
        }
        fclose($handle);
       
        $filearray=""; 
        $filearray = file("$userfilename", FILE_IGNORE_NEW_LINES);
        $filearraysize = count($filearray);
        
        $_SESSION['deletestatus'] = "";
        $_SESSION['uploadstatus'] = "";
        $_SESSION['filename'] = "";
    ?>
    
    <div class="row">
        <div class="span10 offset1 fileshareform">
        <form method="POST">
            <?php
                for($i = 0; $i < $filearraysize; $i++){
                    echo sprintf('<div class="filelist"><input type="radio" name="select" value="' . htmlspecialchars($filearray[$i]) . '" />' . htmlspecialchars($filearray[$i]) . '<br></div>');
                }
            ?>
            <input type="submit" value="View file" name="view"/>
            <input type="submit" value="Delete file" name="delete"/>
            <input type="submit" value="Upload new file" name="upload" />
            <input type="submit" value="Log out" name="logout" class="logoutbutton"/>
        </form>
        </div>
    </div>
       
    <?php
            if (isset($_POST['view']) and isset($_POST['select'])){
                 $filetoview = $_POST['select'];
                 $_SESSION['fileselected'] = $filetoview;
                 header("Location:readfile.php");
                 exit();
            }
            if (isset($_POST['delete']) and isset($_POST['select'])){
                $filetodelete = $_POST['select'];
                $_SESSION['filetodelete'] = $filetodelete;
                header("Location:deletefile.php");
                exit();
            }
            if (isset($_POST['upload'])){
                header("Location:uploadfile.php");
                exit();
            }
            if (isset($_POST['logout'])){
                header("Location:logout.php");
                exit();
            }
        ?>
    </div>  

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="style/bootstrap/js/bootstrap.min.js"></script>


</body>
</html>