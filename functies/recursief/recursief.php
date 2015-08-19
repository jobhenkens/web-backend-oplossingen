<?php

/*	$kapitaal = 100000;
	$rentevoet = 0.08;
	$periode = 10; 

	$result = array();  */

function berekening(){

	static $kapitaal = 100000;
	$rentevoet = 0.08;
	$periode = 10;

	static $result = array();

	static $jaren = 1;

	if ($jaren <= $periode) {

		$rente = floor($kapitaal*$rentevoet);
			
		$kapitaal = $kapitaal + $rente;

		$result[ ] = 'Na '.$jaren.' jaar heeft Hans '.$kapitaal.'€ op zijn rekening staan. (waarvan '.$rente.'€ rente is)';

		++$jaren;

		berekening();

	} else {

		return $result;

	}
	

}

$resultaat = berekening();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>functies recursief</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">


	<ul>
		<?php foreach (berekening() as $value): ?>
			<li>
				<?= $value ?>
			</li>
		<?php endforeach ?>

	</ul>

	</section>

</body>
</html>