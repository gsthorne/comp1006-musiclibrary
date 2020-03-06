<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
session_start();
session_unset(); // remove any session variables
session_destroy();
header('location:login.php');
?>
</body>
</html>