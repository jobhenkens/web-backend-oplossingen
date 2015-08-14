<?php

    $lettertje = 'e';
    $cijfertje = 3;
    $langsteWoord = 'zandzeepsodemineralenwatersteenstralen'; 
    $output = str_replace ( $lettertje , $cijfertje , $langsteWoord );

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht strings extra 3</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
    		<h1>Opdracht strings extra: deel 3</h1>
            <p><?= $output ?></p>


        </section>

    </body>
</html>
