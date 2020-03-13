<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
session_start();
require_once("auth.php");
// parse the artistId from the url
$artistId = $_GET['artistId'];
// connect to the database
require_once('db.php');
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