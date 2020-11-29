<?php
    $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
    require_once "{$DOCUMENT_ROOT}/assets/php/main.php";
?>
<!DOCTYPE html>
<html lang="en">
<head><?php echo execAndRead("{$DOCUMENT_ROOT}/assets/php/head.php"); ?></head>
<header id="header"><?php echo execAndRead("{$DOCUMENT_ROOT}/assets/php/header.php"); ?></header>
<body>
    <div class="panel1">
        <img src="https://cdn.global-gaming.co/images/banner.png">
        <section>
            <div></div>
            <div class="panel1Content bottomStrip">
                <div class="blurImage">
                    <img class="containImage" src="https://cdn.global-gaming.co/images/banner.png">
                </div>
                <div class="p1c">
                    <span class="h3">kOF</span>
                    <span class="h3">—</span>
                    <span class="h3 red">PAGE TITLE</span>
                </div>                
            </div>
            <div></div>
        </section>
    </div>
</body>
<footer id="footer"><?php echo execAndRead("{$DOCUMENT_ROOT}/assets/php/footer.php"); ?></footer>
</html>