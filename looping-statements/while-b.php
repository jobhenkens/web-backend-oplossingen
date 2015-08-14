<?php

	$getallen = array();

	$getalKey = 0;

	while ($getalKey <= 100) {
		$getallen[ ] = $getalKey;
		echo ($getallen[$getalKey]);
		
		if ($getalKey < 100) {
			echo (', ');
		}
		
		++$getalKey;
	}


	/* gebruik functie Implode om values van arrays met elkaar te verbinden via een string ", " !!!! */


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>loop statements while-b</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">

	<p>
		<?php foreach ($getallen as $getal): ?>
			<?php if($getal%3 === 0 && $getal > 40 && $getal < 80) {
				echo $getal;
			}
	
			?>
		<?php endforeach ?>
	</p>


	</section>

</body>
</html>