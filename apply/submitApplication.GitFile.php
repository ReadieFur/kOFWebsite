<?php
    if(isset($_POST["forename"])) //Checks if the form is valid (not empty)
    {
        //Database details
        //HIDDEN FOR SECURITY REASONS

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
        DROP TABLE IF EXISTS `applications`;
        CREATE TABLE `applications`
        (
          `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
          `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
          `forename` VARCHAR(128) NOT NULL,
          `nickname` VARCHAR(128) NOT NULL,
          `birthdate` VARCHAR(128) NOT NULL,
          `competedGames` VARCHAR(512) NOT NULL,
          `country` VARCHAR(128) NOT NULL,
          `email` VARCHAR(512) NOT NULL,
          `previousCompetitions` VARCHAR(1024) NOT NULL,
          `whykOF` VARCHAR(1024) NOT NULL,
          `daysActive` INT(11) NOT NULL,
          `streamUpload` TINYINT(1) NOT NULL,
          `notes` VARCHAR(1024)
      );
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