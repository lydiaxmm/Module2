<?php session_start();
$filename = trim($_SESSION['fileselected']);
$user = $_SESSION['username'];
if(!preg_match('/^[\w_\.\-]+$/', $filename)){ echo "Invalid filename"; exit(); }
$full_path = sprintf("/home/emilysybrant/public_html/module2group/fileuploaded/%s/%s", $user, $filename);
// Now we need to get the MIME type (e.g., image/jpeg). PHP provides a neat little interface to do this called finfo.
$finfo = new finfo(FILEINFO_MIME_TYPE); $mime = $finfo->file($full_path);
// Finally, set the Content-Type header to the MIME type of the file, and display the file.
header("Content-Type: ".$mime);
header('Content-Disposition: inline; filename='.basename($filename));
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');
readfile($full_path); exit();?>