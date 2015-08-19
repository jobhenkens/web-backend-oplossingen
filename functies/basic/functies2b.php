<?php

#	$container = array();

#	$figuren = array( 'spiderman', 'superman', 'antman', 'wolverine');

	$figuren = array(array( 'Spiderman', 'Superman', 'Antman', 'Wolverine'), 
			     	 array('BDW', 'Krimson', 'Gargamal', 'Mr. Burns')
			     	); 


	function drukArrayAf($figuren){

		$result = array();

		for ($arrayCounter = 0; $arrayCounter < count($figuren); ++$arrayCounter) {

				$container = array();

				for( $arrayCounter2 = 0; $arrayCounter2 < count($figuren[$arrayCounter]); ++$arrayCounter2 ){

					$container[ ] = $figuren[$arrayCounter][$arrayCounter2]; 

				}
		
		$result[$arrayCounter] =  $container;
				 
		} 

		return $result;

	}

	$resultaat = drukArrayAf($figuren);

	/* of gebruik array_merge() !!!! */

	

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
	<p>
		<?php foreach ($resultaat as $key => $value): ?>
					<h2><?= $key ?></h2>
					<?php foreach ($resultaat[$key] as $value ): ?>
						<p><?= $value ?></p>
					<?php endforeach ?>
		<?php endforeach ?>
	</p>

	<?php foreach (validateHtmlTag( $html ) as $value): ?> 
		<p><?= $value ?></p>
	<?php endforeach ?>
	

	</section>	

</body>
</html>