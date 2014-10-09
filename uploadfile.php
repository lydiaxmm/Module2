<!DOCTYPE html>


<html>
<head>
    <meta charset="UTF-8">
    <title>Upload a file</title>
    <link rel="stylesheet" type="text/css" href="style/custom/style.css">
    <link rel="stylesheet" type="text/css" href="style/bootstrap/css/bootstrap.min.css" media="screen">
</head>
<body>
    <div class="container">
    <?php
<<<<<<< HEAD
        session_start();
        $user = $_SESSION['username'];
=======
	session_start();
	$user = $_SESSION['username'];
>>>>>>> FETCH_HEAD
    ?>
    <div class="row">
    <div class="span10 offset1 upload">

    <form  method="POST" enctype="multipart/form-data">
<<<<<<< HEAD
        <p>
            <input type="hidden" name="MAX_FILE_SIZE" value="20000000" class="uploadelement"/>
            <label for="uploadfile_input" class="uploadelement">Choose a file to upload:</label>
            <input name="uploadedfile" type="file" id="uploadfile_input" class="uploadelementsmall"/>
        </p>
        <p>
                <input type="submit" value="Upload File" name="fileToUpload" />
        </p>
    </form>
    </div>
        </div>
=======
	<p>
	    <input type="hidden" name="MAX_FILE_SIZE" value="20000000" class="uploadelement"/>
	    <label for="uploadfile_input" class="uploadelement">Choose a file to upload:</label>
            <input name="uploadedfile" type="file" id="uploadfile_input" class="uploadelementsmall"/>
	</p>
	<p>
		<input type="submit" value="Upload File" name="fileToUpload" />
	</p>
    </form>
    </div>
	</div>
>>>>>>> FETCH_HEAD
    
    <?php
        if (isset($_POST['fileToUpload'])) {
            $_SESSION['uploadstatus'] = "here";
            $filename = basename($_FILES['uploadedfile']['name']);
            if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
                exit;
            }
            
            $_SESSION['filename'] = $filename;
<<<<<<< HEAD
            
            $full_path = sprintf("/home/emilysybrant/public_html/module2group/fileuploaded/%s/%s", $user, $filename);
            
            if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
                $_SESSION['uploadstatus'] = "The file was uploaded successfully.";
                header("Location:fileshare.php");
                exit;
            }else{
                $_SESSION['uploadstatus'] = "File upload failed.";
=======
	    
            $full_path = sprintf("/home/emilysybrant/public_html/module2group/fileuploaded/%s/%s", $user, $filename);
            
            if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
		$_SESSION['uploadstatus'] = "The file was uploaded successfully.";
                header("Location:fileshare.php");
                exit;
            }else{
		$_SESSION['uploadstatus'] = "File upload failed.";
>>>>>>> FETCH_HEAD
                header("Location:fileshare.php");
                exit;
            }
        }
    ?>
<<<<<<< HEAD
        </div>
=======
	</div>
>>>>>>> FETCH_HEAD
   
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="style/bootstrap/js/bootstrap.min.js"></script>
   
   
</body>
</html>