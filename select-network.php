<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Network Selection Page</title>
</head>
<body>
    <h1>Welcome to The Network Shows Database Website</h1>
    <form action="shows.php" method="post">
        <fieldset>
            <label>Network Shows</label>
             <select name="networks" id="networks">
                 <?php
                 // Connecting to database
                 $database = new PDO('mysql:host=172.31.22.43;dbname=Brody_D1099030', 'Brody_D1099030', 'a2KuwUM4hz');
                 $networks = "SELECT * FROM networks;";
                 $command = $database->prepare($networks);
                 $command->execute();
                 $networks = $command->fetchAll();

                 // loop that runs through the database and then populates a drop down with each piece of info in database
                foreach($networks as $infoStored){
                 echo "<option> $infoStored[1]</option>";
                }
                // disconnects from database
                $database = null;
                 ?>
             </select>
         </fieldset>
         <fieldset>
            <button>Get Network Shows</button>
         </fieldset>
    </form>
</body>
</html>
