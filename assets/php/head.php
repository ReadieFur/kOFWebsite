<?php
    global $REQUEST_URI;
    $DirName = ltrim(ucwords(str_replace("_", " ", basename($REQUEST_URI))));
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="og:type" content="website">
<meta property="og:title" content="kOF - Knockout Force"/>
<meta property="og:description" content="<?php echo $DirName; ?>"/>
<meta property="og:url" content="https://global-gaming.co<?php echo $REQUEST_URI; ?>"/>
<meta property="og:image" content="https://cdn.global-gaming.co/images/Panda.png"/>
<title>kOF | <?php echo $DirName; ?></title>
<link rel="icon" href="https://cdn.global-gaming.co/images/Panda.png" type="image/png">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7cOpen+Sans:400,700" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/assets/css/main.css"/>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-XMSKKH16PK"></script>
<script>window.dataLayer = window.dataLayer || []; function gtag() { dataLayer.push(arguments); } gtag('js', new Date()); gtag('config', 'G-XMSKKH16PK');</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/assets/js/main.js"></script>