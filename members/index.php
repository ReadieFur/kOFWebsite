<?php
    $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
    require_once "{$DOCUMENT_ROOT}/assets/php/main.php";

    $splitPath = array_filter(explode('/', $REQUEST_URI));
    $username = $splitPath[count($splitPath)];

    $members = json_decode(file_get_contents("{$DOCUMENT_ROOT}/assets/members/members.json"), true);

    $user = null;
    foreach ($members['members'] as $member)
    {
        if (strtolower(str_replace(' ', '', $member['name'])) == $username)
        {
            $user = $member;
            break;
        }
    }

    if ($user == null)
    {
        http_response_code(404);
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>kOF | <?php echo $user['name']; ?></title> <!-- Placed before head script is loaded so the title is overriden -->
    <?php echo execAndRead("{$DOCUMENT_ROOT}/assets/php/head.php"); ?>
    <script>var member = JSON.parse(`<?php echo json_encode($user) ?>`);</script>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <script src="../script.js"></script>
</head>
<header id="header"><?php echo execAndRead("{$DOCUMENT_ROOT}/assets/php/header.php"); ?></header>
<body>
        <!--<div class="panel1">
        <img src="<?php echo $user['splash']; ?>">
        <section>
            <div></div>
            <div class="panel1Content bottomStrip">
                <div class="blurImage">
                    <img class="containImage" src="<?php echo $user['icon']; ?>">
                </div>
                <div class="p1c">
                    <h3>kOF . <span class="red"><?php echo $user['name']; ?></span></h3>
                </div>                
            </div>
            <div></div>
        </section>
    </div>-->
    <!----><div class="headerSpacer"></div><!---->
    <section>
        <h3 class="decoratedHeader1"><span><span class="red">kOF . </span><?php echo $user['name']; ?></span></h3>
        <table>
            <tr>
                <td class="memberDescriptor">
                    <h4><?php echo $user['position']; ?></h4>
                    <p id="description"><?php echo $user['description']; ?></p>
                </td>
                <td class="userIcon"><img class="imgMedium circle" src="<?php echo $user['icon']; ?>"></td>
            </tr>
        </table>
    </section>
    <section id="socials">

    </section>
</body>
<footer id="footer"><?php echo execAndRead("{$DOCUMENT_ROOT}/assets/php/footer.php"); ?></footer>
</html>