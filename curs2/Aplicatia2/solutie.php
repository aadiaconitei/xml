<?php

$xml = "images.xml";

$error = null;

try {
    $root = new SimpleXMLElement("images.xml", 0, true);

    $images = [];
    foreach ($root as $el) {
        $path = "{$root['path']}/{$el['file']}";
        $title = "{$el['title']}";

        $images[$path] = $title; 
    }
} catch (Exception $e) {
    $error = "Fisierul $xml nu a putut fi procesat";
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Aplicatia 2 curs 2</title>

    <style>
    #gallery {
        padding: 10px;
    }

    .error {
        background-color: #7c0202;
        padding: 20px;
        color: white;
        font-family: Arial, sans-serif;
        text-transform: uppercase;
        text-align: center;
    }

    .img {
        padding: 10px;
        float: left;
    }

    .img img {
        display: block;
    }

    .img span {
        display: block;
        text-align: center;
        font-family: Arial, sans-serif;
        margin-top: 10px;
    }
    </style>
</head>
<body>
    <?php if (null !== $error): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php else: ?>
        <div id="gallery">
            <?php foreach ($images as $path => $title): ?>
                <div class="img">
                    <img src="<?php echo $path; ?>" title="<?php echo $title; ?>" />
                    <span><?php echo $title; ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</body>
</html>

