<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
$password = 'abc';
$confirm = 'def';

if ($password = $confirm) {
    echo 'values are equal    ';
} else {
    echo 'values are different';
}

echo $password;
?>
</body>
</html>