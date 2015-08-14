<?php

	$output = array();
	$rij = '';

	for ($kol=0; $kol <11 ; ++$kol) { 

		$data = '';

		for ($tafelKey=0; $tafelKey < 11 ; $tafelKey++) { 
			
			$dataTemp = $tafelKey*$kol;

			$data .= '<td>' . $dataTemp . '</td>';

		}

		$output[ ] = '<tr>' . $data . '</tr>';

	}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>looping statements for 2b</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">
		
		<table>

		<?php foreach ($output as $tafel): ?>
			<?= $tafel ?>
		<?php endforeach; ?>

		</table>

	</section>

</body>
</html>