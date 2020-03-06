<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Saving...</title>
</head>
<body>
<?php
// store form inputs in variables
$username = $_POST['username'] ;
$password = $_POST['password'];
$confirm = $_POST['confirm'];
$ok = true;
// validate inputs
if (empty($username)) {
    echo 'Username is required<br>';
    $ok = false;
}
if (empty($password)) {
    echo 'Password is required<br>';
    $ok = false;
}
if ($password != $confirm) {
    echo 'Passwords do not match<br>';
    $ok = false;
}
if ($ok) {
    // hash the password
    $password = password_hash($password, PASSWORD_DEFAULT);
//    echo $password;
    // connect to db
    $db = new PDO('mysql:host=172.31.22.43;dbname=Gillian_S1095952', 'Gillian_S1095952', 'WlLdxV5ePi');
    // duplicate users check before insert
    $sql = "SELECT * FROM users WHERE username = :username";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
    $cmd->execute();
    $user = $cmd->fetch();

    if (!empty($user)) {
        echo 'User already exists<br>';
    } else {
        // set up and run insert
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
        $cmd->bindParam(':password', $password, PDO::PARAM_STR, 255);
        $cmd->execute();
    }
    // disconnect from db
    $db = null;
    // redirect to login page
    header('location:login.php');
}
?>
</body>
</html>