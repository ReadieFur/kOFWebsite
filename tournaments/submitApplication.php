<?php
    if(isset($_POST["teamName"])) //Checks if the form is valid (not empty)
    {
        //Database details
        include_once 'DBDetails.php';

        //Connect to the database
        $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

        //Write to database
        $teamName = mysqli_real_escape_string($conn, $_POST['teamName']); //Turns input to string (cannot be manupliated as code)
        $instagram = mysqli_real_escape_string($conn, $_POST['instagram']);
        $playerNames = mysqli_real_escape_string($conn, $_POST['playerNames']);

        $sql = "INSERT INTO
        _2020September_MacedonianLeagueOfLegends
          (
            teamName,
            instagram,
            playerNames
          )
        values
          (
            '$teamName',
            '$instagram',
            '$playerNames'
          )";

        //Submit query to the database
        mysqli_query($conn, $sql);

        //Redirect back to website
        header("Location: ../tournaments/?submission=sucessful");
    }
    else { header("Location: ../tournaments/?submission=unsucessful"); }
?>