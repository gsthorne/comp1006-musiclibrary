<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Save Artist</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<h1>Saving artist</h1>

<?php
session_start();
require_once("auth.php");
// save the form inputs in variables (optional but recommended)
$name = htmlspecialchars($_POST['name']);
$yearFounded = $_POST['yearFounded'];
$website = htmlspecialchars($_POST['website']);
$artistId = $_POST['artistId']; // has value when empty, has value when adding
$photo = $_FILES['photo'];
$photoName = null;

echo $name;

$ok = true;

// validate inputs
if (empty($name)) {
    echo 'Name is required<br>';
    $ok = false;
}
if (!empty($yearFounded)) {
    if ($yearFounded < 1000 || $yearFounded > date('Y')) {
        echo 'Year must be between 1000 and ' . date('Y'). '<br>';
        $ok = false;
    }
}
if (!empty($website)) {
    if (substr($website, 0, 4) != 'http') {
        echo 'Website is invalid <br>';
        $ok = false;
    }
}

if (!empty($photo['tmp_name'])) {
    $photoName = $photo['name'];
    $tmp_name = $photo['tmp_name'];
    $type = mime_content_type($tmp_name);

    // check type
    if ($type != 'image/jpeg' && $type != 'img/png') {
        echo 'Photo must be a .jpg or .png';
        $ok = false;
        exit();
    }

    $photoName = session_id() . '-' . $photoName;
    move_uploaded_file($tmp_name, "img/artists/$photoName");
}

if ($ok) {
    try {
        // connect to the database
        require_once('db.php');

        // adding or editing depending on if we have an artistId
        if (empty($artistId)) {
            // set up the sql insert command - use 3 parameter placeholders for the values (prefixed with a ':')
            $sql = "INSERT INTO artists (name, yearFounded, website, photo) VALUES (:name, :yearFounded, :website, :photo)";
        } else {
            $sql = "UPDATE artists SET name = :name, yearFounded = :yearFounded, website = :website, photo = :photo WHERE artistId = :artistId";
        }

        // create a PDO command object and fll the parameters at a time for type and safety checking
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':name', $name, PDO::PARAM_STR, 50);
        $cmd->bindParam(':yearFounded', $yearFounded, PDO::PARAM_INT);
        $cmd->bindParam(':website', $website, PDO::PARAM_STR, 100);
        $cmd->bindParam(':photo', $photoName, PDO::PARAM_STR, 100);

        // if we have an artistId, we need to bind the 4th parameter
        if (!empty($artistId)) {
            $cmd->bindParam(':artistId', $artistId, PDO::PARAM_INT);
        }
        // try to send the data to the database
        $cmd->execute();

        // disconnect from database
        $db = null;

        // show message to user
        echo "<h2 class='alert alert-success'>Artist saved</h2>";
        header('location:artists-list.php');
    } catch (Exception $e) {
        header('location:error.php');
        exit();
    }
}
?>
</body>
</html>