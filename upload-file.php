<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
// get the uploaded file object
$file = $_FILES['file1'];

// access and display properties of the uploaded file
$name = $file['name'];
echo "Name: $name <br>";

$tmp_name = $file['tmp_name'];
echo "Tmp name: $tmp_name <br>";

// don't use the type attribute as it checks the extension instead of the actual file type
$extension = $file['type'];
echo "Extension: $extension <br>";

$type = mime_content_type($tmp_name);
echo "Type: $type <br>";

$size = $file['size'];
echo "Size: $size <br>";

// create a unique name for each upload so there's no overwriting (unless same file and session)
session_start();
$name = session_id() . '-' . $name;

// move the file to the uploads folder for permanent storage
move_uploaded_file($tmp_name, "uploads/$name")

?>

</body>
</html>