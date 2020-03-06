<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
session_start();
if (empty($_SESSION['userId'])) {
    header('location:login.php');
    exit();
}
// parse the artistId from the url
$artistId = $_GET['artistId'];
// connect to the database
$db = new PDO('mysql:host=172.31.22.43;dbname=Gillian_S1095952', 'Gillian_S1095952', 'WlLdxV5ePi');
// create the sql delete command
$sql = 'DELETE FROM artists WHERE artistId = :artistId';
// pass the artistId parameter to the command
$cmd = $db->prepare($sql);
$cmd->bindParam(':artistId', $artistId, PDO::PARAM_INT);
// execute the deletion
$cmd->execute();
// $db = null
$db = null;
// redirect to updated artists-list
header('location:artists-list.php');
?>
</body>
</html>