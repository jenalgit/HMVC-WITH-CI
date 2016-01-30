<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Upload</title>
</head>
<body>
<?php
// Required: anonymous function reference number as explained above.
$funcNum = $_GET['CKEditorFuncNum'] ;
// Optional: instance name (might be used to load a specific configuration file or anything else).
$CKEditor = $_GET['CKEditor'] ;
// Optional: might be used to provide localized messages.
$langCode = $_GET['langCode'] ;
// Optional: compare it with the value of `ckCsrfToken` sent in a cookie to protect your server side uploader against CSRF.
// Available since CKEditor 4.5.6.
$token = $_POST['ckCsrfToken'] ;

// Check the $_FILES array and save the file. Assign the correct path to a variable ($url).

$dir = '/var/www/html/curatigo/upload/ckimage/';  

/*$dir = '/home/curatigo/sub_domain/test/upload/ckimage/'; 
*/
if (file_exists($dir. $_FILES["upload"]["name"]))
{
 echo $_FILES["upload"]["name"] . " already exists please choose another image.";
}
else
{
 @move_uploaded_file($_FILES["upload"]["tmp_name"], $dir . $_FILES["upload"]["name"]);
 echo "Stored in: " .base_url(). "upload/story/ckimage/" . $_FILES["upload"]["name"];
}

$url = $dir. $_FILES["upload"]["name"];

//$url = '/path/to/uploaded/file.ext';
// Usually you will only assign something here if the file could not be uploaded.
$message = '';
echo "<script type='text/javascript'>var url='".$url."'</script>";
echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
?>
</body>
</html>