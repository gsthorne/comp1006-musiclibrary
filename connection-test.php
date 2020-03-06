<!DOCTYPE html>
<html>
<head>
    <title>Database Connection</title>
</head>
<body>
<?php
$db = new PDO('mysql:host=aws.computerstudi.es;dbname=gcc1095952', 'gcc1095952', 'D5Bf9wQavi');
if (!$db)  {
    echo 'could not connect';
}
else {
    echo 'connected to the database';
}
$db = null;
?>
</body>
</html>