<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php

$username = $_POST['username'];
$password = $_POST['password'];
$db = new PDO('mysql:host=172.31.22.43;dbname=Gillian_S1095952', 'Gillian_S1095952', 'WlLdxV5ePi');

$sql = "SELECT userId, password FROM users WHERE username = :username";

$cmd = $db->prepare($sql);
$cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
$cmd->execute();

$user = $cmd->fetch();


if (!password_verify($password, $user['password'])) {
    header('location:login.php?invalid=true');
//    echo 'Invalid Login';
    exit();
}
else {
    // access the existing session - we need to do this in order to write/read values to/from the session object
    session_start();
    // create a session variable called 'userId' and fill it from the id in our login query above
    $_SESSION['userId'] = $user['userId'];
    // redirect to artists-list page
    header('location:artists-list.php');
}

$db = null;

?>
</body>
</html>