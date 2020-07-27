<?php
    if(isset($_POST["forename"])) //Checks if the form is valid (not empty)
    {
        //Database details
        $dbServername = "51.210.44.49";
        $dbUsername = "u11_9dgLd1Que1";
        $dbPassword = "Y72h@Ne8WxVz0VMt.Eo+uCkZ";
        $dbName = "s11_kof";

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

        /*
        CREATE TABLE `applications`
        (
          `id` int(11) NOT NULL,
         `forename` varchar(128) NOT NULL,
          `nickname` varchar(128) NOT NULL,
          `birthdate` varchar(128) NOT NULL,
          `competedGames` varchar(512) NOT NULL,
          `country` varchar(128) NOT NULL,
          `email` varchar(512) NOT NULL,
          `previousCompetitions` varchar(1024) NOT NULL,
          `whykOF` varchar(1024) NOT NULL,
          `daysActive` int(11) NOT NULL,
          `streamUpload` tinyint(1) NOT NULL
        )
        */

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
          )
        ";

        //Submit query to the database
        mysqli_query($conn, $sql);

        //Redirect back to website
        header("Location: ../apply/?submission=sucessful");
    }
    else
    {
        header("Location: ../apply/?submission=failed");
    }