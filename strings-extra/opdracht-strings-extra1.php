<?php

    $fruit = 'kokosnoot';
    $fruitLen = strlen($fruit);
    $needle = 'o';
    $pos = strpos($fruit, $needle);
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht strings extra 1</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
    		<h1>Opdracht strings extra: deel 1</h1>
            <p><?= $fruitLen ?></p>
            <p><?= $pos ?></p>

        </section>

    </body>
</html>
