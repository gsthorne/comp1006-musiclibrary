<?php
require_once('header.php');
?>
<h1>Artist Details</h1>
<?php
// store the artist name selection in a variable
$name = $_POST['name'];

// connect to db
require_once('db.php');

// set up a query to fetch the selected artist
$sql = "SELECT * FROM artists WHERE name = :name";
$cmd = $db->prepare($sql);
$cmd->bindParam(':name', $name, PDO::PARAM_STR, 50);
$cmd->execute();
$artist = $cmd->fetch();

// output the other column values
echo 'Year Founded: '. $artist['yearFounded'] . '<br>';
echo 'Website: <a href="' . $artist['website'] . '" target="_new"> ' . $artist['website'] . '</a><br>';

// disconnect
$db = null;

?>

</body>
</html>