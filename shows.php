<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Network Shows</title>
</head>
<body>
    <h1>Here are the Shows for Your Chosen Network</h1>
    <?php
    // Connecting to database
    $database = new PDO('mysql:host=172.31.22.43;dbname=Brody_D1099030', 'Brody_D1099030', 'a2KuwUM4hz');

    // Saves user choice for a network into a variable
    $networkChosen = $_POST['networks'];

    // SQL query command that reads all information in database and then gathers it
    $sqlQuery = "SELECT * FROM shows WHERE networkName = networkChosen;"; // reads all info
    $command = $database->prepare($sqlQuery); // runs sqlQuery command
    $command->execute();
    $shows = $command->fetchAll(); // gathers all info

    // Creates html table and loops through to populate it with database information
    echo '<table border=1><thead><th>Show Name</th><th>Year Released</th><th>Network Name</th></thead>';

    foreach ($shows as $infoStored){
        echo '<tr><td>' . $infoStored['showName'] . '</td><td>' . $infoStored['firstYear'] . '</td><td>' . $infoStored['networkName'] . '</td></tr> ';
    }
    echo '</table>';

    // disconnect from the database
    $database = null;
    ?>
</body>
</html>
