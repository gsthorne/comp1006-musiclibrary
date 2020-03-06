<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php

// 1. Connect to the db.  Host: 172.31.22.43, DB: dbNameHere, Username: usernameHere, PW: passwordHere
$db= new PDO('mysql:host=172.31.22.43;dbname=Gillian_S1095952', 'Gillian_S1095952', 'WlLdxV5ePi');

//  2. Write the SQL Query to read all the records from the artists table and store in a variable
$query = "Select * from artists";

// 3. Create a Command variable $cmd then use it to run the SQL Query
$cmd = $db->prepare($query);
$cmd->execute();

// 4. Use the fetchAll() method of the PDO Command variable to store the data into a variable called $persons.  See  for details.
$artists = $cmd->fetchAll();

// 5. Use a foreach loop to iterate (cycle) through all the values in the $artists variable.  Inside this loop, use an echo command to display the name of each person.  See https://www.php.net/manual/en/control-structures.foreach.php for details.
Foreach ($artists as $value) {
    echo $value['name'];
}

// 6. Disconnect from the database
$db = null;
?>

</body>
</html>