<?php

	$getallen = array( 1,2,3,4,5 );

	$verm = array_product( $getallen );

	/* ----------- */


	$container = array();
	
	for ($i=0; $i < count($getallen); $i++) { 

		$oneven = $getallen[$i];
		
		if ( $oneven%2 != 0 ) {

			
			$container[] = $oneven;
			

		}


	}


	/* ----------- */


	$getallenBack = array( 5,4,3,2,1 );
	$som = '';

	for ($i=0; $i < count($getallen) ; $i++) { 
		
		$som = $getallen[$i] + $getallenBack[$i];
		var_dump($som);
	}
		
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>arrays 2</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">

	<p><?= $verm ?></p>

	<p><?php

			for ($contKey=0; $contKey < count($container); $contKey++) { 
				echo $container[$contKey] . ' ';
			}

	?></p>

	</section>

</body>
</html>