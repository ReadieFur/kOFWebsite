<?php
    if(isset($_POST["forename"])) //Checks if the form is valid (not empty)
    {
        //Database details
        include_once 'DBDetails.php';

        //Connect to the database
        $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

        //Write to database
        $forename = mysqli_real_escape_string($conn, $_POST['forename']); //Turns input to string (cannot be manupliated as code)
        $nickname = mysqli_real_escape_string($conn, $_POST['nickname']);
        $birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
        $competedGames = mysqli_real_escape_string($conn, $_POST['competedGames']);
        $country = mysqli_real_escape_string($conn, $_POST['country']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $previousCompetitions = mysqli_real_escape_string($conn, $_POST['previousCompetitions']);
        $whykOF = mysqli_real_escape_string($conn, $_POST['whykOF']);
        $daysActive = mysqli_real_escape_string($conn, $_POST['daysActive']);
        $streamUpload = mysqli_real_escape_string($conn, $_POST['streamUpload']);

        $sql = "INSERT INTO
        applications
          (
            forename,
            nickname,
            birthdate,
            competedGames,
            country,
            email,
            previousCompetitions,
            whykOF,
            daysActive,
            streamUpload
          )
        values
          (
            '$forename',
            '$nickname',
            '$birthdate',
            '$competedGames',
            '$country',
            '$email',
            '$previousCompetitions',
            '$whykOF',
            '$daysActive',
            '$streamUpload'
          )";

        //Submit query to the database
        mysqli_query($conn, $sql);

        echo "sucessful";
    }
    else { echo "unsucessful"; }