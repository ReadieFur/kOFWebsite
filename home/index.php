<?php
    $DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
    require_once "{$DOCUMENT_ROOT}/assets/php/main.php";
?>
<!DOCTYPE html>
<html lang="en">
<head><?php echo execAndRead("{$DOCUMENT_ROOT}/assets/php/head.php"); ?></head>
<header id="header">
    <?php echo execAndRead("{$DOCUMENT_ROOT}/assets/php/header.php"); ?>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="script.js"></script>
</header>
<body>
    <div class="panel1">
        <video muted autoplay loop class="containVideo" src="https://cdn.global-gaming.co/videos/kOFSplash.mp4"></video>
        <section>
            <div></div>
            <div class="panel1Content bottomStrip">
                <div class="blurVideo">
                    <video muted autoplay loop class="containVideo" src="https://cdn.global-gaming.co/videos/kOFSplash.mp4"></video>
                </div>
                <div class="p1c">
                    <span class="h3">Knockout Force</span>
                    <span class="h3 red"> ✖ </span>
                    <span class="h3">Global Gaming</span>
                </div>
            </div>
            <div></div>
        </section>
    </div>
    <section>
        <h3 class="decoratedHeader1"><span><span class="red">About the</span> team</span></h3>
        <p>Some description</p>
    </section>
    <br>
    <div>
        <h3 class="centerText"><span class="red">Player</span> Roster</h3>
        <br>
        <table id="rosterContainer">
            <tr id="rosterPages">
                <td><h3 id="rosterBack" class="center asButton"><div class="center">❮</div></h3></td>
                <td><h3 id="rosterForward" class="center asButton"><div class="center">❯</div></h3></td>
            </tr>
        </table>
    </div>
</body>
<footer id="footer"><?php echo execAndRead("{$DOCUMENT_ROOT}/assets/php/footer.php"); ?></footer>
</html>