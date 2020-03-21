<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<!-- must remember enctype if uploading files -->
<form method="post" action="upload-file.php" enctype="multipart/form-data">
    <fieldset>
        <label for="file1">Upload any file:</label>
        <input name="file1" id='file1' type="file">
    </fieldset>
    <button>Submit</button>
</form>

</body>
</html>