<?php

	$getallen = array();

	for ($getalKey=0; $getalKey <= 100 ; ++$getalKey) { 
		
		$getallen[ ] = $getalKey;

	}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>loop statements while</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">
	
		<p>
		<?php foreach ($getallen as $getal): ?>
			<?= $getal . ' , ' ?>
		<?php endforeach ?>
		</p>


	</section>

</body>
</html>