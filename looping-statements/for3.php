<?php

	/* $arr = array(
			0 => array(0,0,0,0,0,0,0,0,0,0),
			1 => array(1,2,3,4,5,6,7,8,9,10),
		);

	var_dump($arr); */

	$arr1 = array();
	$arrSub = array();

	for ($arrKey=0; $arrKey < 11 ; ++$arrKey) { 

		$arr1[ ] = $arrSub;
		$arrSub = array();


		for ($arrKey2=1; $arrKey2 < 11 ; ++$arrKey2) { 

		$arrSub[] = $arrKey*$arrKey2;

		}

	}

	var_dump($arr1); /* check klassikale oplossingen !!! ook van opdracht 4 */

	/* ---------------------------------------------------------- */
	/* ---------------------------------------------------------- */


	$output = array();
	$rij = '';

	for ($kol=0; $kol <11 ; ++$kol) { 

		$data = '';

		for ($tafelKey=0; $tafelKey < 11 ; $tafelKey++) { 
			
			$dataTemp = $tafelKey*$kol;

			$bg = '';

			if ($dataTemp%2 == 0) {
				$bg = 'bg-green';
			}

			$data .= '<td class="'. $bg .'">' . $dataTemp . '</td>';

		}

		$output[ ] = '<tr>' . $data . '</tr>';

	}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>looping statements for 3</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

<style>
			.bg-green
			{

				background-color: green;

			}
		</style>

	<section class="body">
		
		<table>

		<?php foreach ($output as $tafel): ?>
			<?= $tafel ?>
		<?php endforeach; ?>

		</table>

	</section>

</body>
</html>