<?php

	$rijen = 10;
	$kolommen = 10;
	$output = '';
	$rij = '';
	$rijVol = '';

	for ($kol=0; $kol <11 ; ++$kol) { 

		for ($teller=0; $teller < 11; ++$teller) { 

			$data = $kol*$teller;
			#var_dump($data);
			$rij .= '<td>' . $data . '</td>';
			$rijVolTemp = '<tr>' . $rij . '</tr>';

		}
		
		$rijVol = '<tr>' . $rijVolTemp . '</tr>';

	
	}

	#var_dump($rijVol);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>looping statements for 2</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">
		
		<table>

		<?= $rij ?>

		</table>

	</section>

</body>
</html>