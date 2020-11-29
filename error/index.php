<?php
    $DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
    require_once "{$DOCUMENT_ROOT}/assets/php/main.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo execAndRead("{$DOCUMENT_ROOT}/assets/php/head.php"); ?>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="script.js"></script>
</head>
<body>
    <img src="/assets/images/banner.png">
    <div>
        <h2 id="status">STATUS</h2>
        <h1>Oh no, it seems you got lost!</h1>
        <button class="hollowButton" onclick="location='/'">Take me home</button>
    </div>    
</body>
</html>