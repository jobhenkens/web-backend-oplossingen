<?php

	$container = array();

	$figuren = array(helden => array( 'spiderman', 'superman', 'antman', 'wolverine'), 
			     	 antihelden => array('BDW', 'Krimson', 'Gargamal', 'Mr. Burns')
			     	);

	function drukArrayAf($array){

		$result = array();

		foreach ($array as $key => $value) {
				 $result[] =  '$helden [' . $key . '] heeft de waarde ' . $value . '.';
		}

		return $result;

	}

	$resultaat = drukArrayAf($figuren);

	

	/* ------------------------------------ */

	$html = 
'<!DOCTYPE html><html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">

	

	</section>

</body>
</html>';

	function endsWith($haystack, $needle) {
    // search forward starting from end minus needle length characters
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
}

	function validateHtmlTag($html) {

		$result = array();

		$result[ ] = strpos($html, '<html>');

		$result[ ] = endsWith($html, '</html>');

		return $result;





	}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>functies2</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">

	<!--	<p><?php foreach (drukArrayAf( $helden ) as $value): ?> 
			<?= $value ?>
		<?php endforeach ?>
		</p> -->

		<p><?= drukArrayAf( $figuren ) ?></p>

		<!-- <p><?= validateHtmlTag( $html ) ?></p> -->

		<p><?php foreach (validateHtmlTag( $html ) as $value): ?> 
			<?= $value ?>
		<?php endforeach ?>
		</p>

	</section>	

</body>
</html>