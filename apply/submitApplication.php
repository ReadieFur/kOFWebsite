<?php
    if(isset($_POST["forename"])) //Checks if the form is valid (not empty)
    {
        //Database details
        include_once 'kOFDBDetails.php';

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

        //Redirect back to website
        header("Location: ../apply/?submission=sucessful");
    }
    else
    {
        header("Location: ../apply/?submission=unsucessful");
    }
?>
<script type="text/javascript">
  //WIP WS SSL
  /*window.addEventListener("DOMContentLoaded", function()
  {
    var socket = new WebSocket("wss://51.210.44.49:1593");

    socket.onopen = function(e)
    {
      socket.send(JSON.stringify(
        {
          forename: "<?php echo $forename ?>",
          nickname: "<?php echo $nickname ?>",
          birthdate: "<?php echo $birthdate ?>",
          competedGames: "<?php echo $competedGames ?>",
          country: "<?php echo $country ?>",
          email: "<?php echo $email ?>",
          previousCompetitions: "<?php echo $previousCompetitions ?>",
          whykOF: "<?php echo $whykOF ?>",
          daysActive: "<?php echo $daysActive ?>",
          streamUpload: "<?php echo $streamUpload ?>"
        }));
    };
  
    socket.onmessage = function(event)
    {
      console.log(event.data);
      //if (event.data = "valid") { window.location.replace("../apply/?submission=sucessful"); }
      //else if (event.data = "invalid") { window.location.replace("../apply/?submission=unsucessful"); }
    };
  
    socket.onerror = function(error)
    {
      console.log(`[WSS ERROR] ${error.message}`);
    };
  });*/
</script>