<?php

	$result = array();  
	$kapitaal = 100000;
	$jarenInt = 1;
	$rentevoet = 0.08;
	$periode = 10;


function berekening($result, $kapitaal, $jarenInt, $rentevoet, $periode){



	if ($jarenInt <= $periode) {

		$rente = floor($kapitaal*$rentevoet);
			
		$kapitaal = $kapitaal + $rente;

		$result[ ] = 'Na '.$jarenInt.' jaar heeft Hans '.$kapitaal.'€ op zijn rekening staan. (waarvan '.$rente.'€ rente is)';

		$jarenInt = ++$jarenInt;

		return berekening($result, $kapitaal, $jarenInt, $rentevoet, $periode);

	} else {

		return $result;

	}
	

}

$var = berekening($result, $kapitaal, $jarenInt, $rentevoet, $periode);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>functies recursief 2</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">


	<ul>
		<?php foreach ( $var as $value ): ?>
			<li>
				<?= $value ?>
			</li>
		<?php endforeach ?>

	</ul>

	</section>

</body>
</html>