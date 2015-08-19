<?php

	$pigHealth = 5;
	$maximumThrows = 8;

	function calculateHit(){

		$randNr = rand(0,100);

		$result = FALSE;

			if ($randNr > 60) {

				$result = TRUE;

			} 

		return $result;

	}

	function launchAngryBird($pigHealth, $maximumThrows){

		static $fCount = 0;


		if ($fCount < $maximumThrows && $pigHealth != 0) {
			
			++$fCount;
			
			if (calculateHit()){


				if ($pigHealth === 2) {

					--$pigHealth;

					echo '<p>Raak! Er is nog maar ' . $pigHealth .  ' varken over.</p>';
			
					return launchAngryBird($pigHealth, $maximumThrows);

				} else {

				--$pigHealth;	

				echo '<p>Raak! Er zijn nog maar ' . $pigHealth .  ' varkens over.</p>';
			
				return launchAngryBird($pigHealth, $maximumThrows);

				}
			
			} else {

				if ($pigHealth === 1) {

					$mis = '<p>Mis! Nog ' . $pigHealth . ' varken in het team.</p>';

					echo $mis;

					return launchAngryBird($pigHealth, $maximumThrows);

				} else {

				$mis = '<p>Mis! Nog ' . $pigHealth . ' varkens in het team.</p>';

				echo $mis;

				return launchAngryBird($pigHealth, $maximumThrows);

				}

			}


		} elseif ($fCount === $maximumThrows || $pigHealth === 0) {

			$einde = '';

			if ($pigHealth === 0) {

				$einde = '<p>Gewonnen!</p>';

				echo $einde;

			} elseif ($pigHealth > 0) {

				$einde = '<p>Verloren!</p>';

				echo $einde;

			}
			
		}
		
	}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>functies-gevorderd2</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">

		<h2>ANGRY BIRDS!</h2>

		<p>
			<?= launchAngryBird($pigHealth, $maximumThrows) ?>
		</p>	

	</section>

</body>
</html>