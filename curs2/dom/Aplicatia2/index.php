<?php

$xml = "images.xml";

$error = null;

$doc = new DOMDocument();
$doc->preserveWhiteSpace = false;
$doc->load($xml);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Exercitiu 2</title>

    <style>
    #gallery {
        padding: 10px;
    }

    div.error {
        background-color: #7c0202;
        padding: 20px;
        color: white;
        font-family: Arial, sans-serif;
        text-transform: uppercase;
        text-align: center;
    }

    div.img {
        padding: 10px;
        float: left;
    }

    div.img img {
        display: block;
    }

    div.img span {
        display: block;
        text-align: center;
        font-family: Arial, sans-serif;
        margin-top: 10px;
    }
    </style>
</head>
<body>
    <?php if (null !== $error) { ?>

        <div class="error"><?php echo $error; ?></div>
    
    <?php } else { ?>

        <div id="gallery">
            <!-- creaza html-ul aici -->    
        </div>

    <?php } ?>



</body>
</html>

