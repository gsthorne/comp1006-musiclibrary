<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Artist Dropdown List</title>
</head>
<body>

<form method="post" action="artist-details.php">
    <fieldset>
        <label for="name">Select an Artist</label>
        <select name="name" id="name">
            <?php
            // connect
            $db = new PDO('mysql:host=172.31.22.43;dbname=Gillian_S1095952', 'Gillian_S1095952', 'WlLdxV5ePi');
            // write and run query to get artist names
            $sql = "SELECT name FROM artists";
            $cmd = $db->prepare($sql);
            $cmd->execute();
            $artists = $cmd->fetchAll();
            // loop through each record and add each name to the dropdown using <option></option> tags
            foreach ($artists as $value) {
                echo '<option>' . $value['name'] . '</option>';
            }
            // disconnect
            $db = null;

            ?>
        </select>
    </fieldset>
    <button>View Details</button>
</form>

</body>
</html>