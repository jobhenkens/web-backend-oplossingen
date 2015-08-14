<?php

	$md5HashKey = 'd1fa402db91a7a93c4f414b8278ce073';

	$needle = 2;
	$needle2 = 8;
	$needle3 = 'a';

	function count1 ($param1) {

		global $md5HashKey;

		$result = ''; 

		$paraCount = substr_count($md5HashKey, $param1); #2

		if ($paraCount != 0 ) {

			$keyLength = strlen($md5HashKey); #32


		 	
		 	$result = ($paraCount/$keyLength)*100 . '%';
		 
		 } 

		else {

			$result = 'niet';

		}

		return $result;

	}

	function count2 ($param2, $md5HashKey = 'd1fa402db91a7a93c4f414b8278ce073') {

		$result = ''; 

		$paraCount = substr_count($md5HashKey, $param2); #2

		if ($paraCount != 0 ) {

			$keyLength = strlen($md5HashKey); #32


		 	
		 	$result = ($paraCount/$keyLength)*100 . '%';
		 
		 } 

		else {

			$result = 'niet';

		}

		return $result;

	}

	function count3 ($param3, $param4) {

		$result = ''; 

		$paraCount = substr_count($param4, $param3); #2

		if ($paraCount != 0 ) {

			$keyLength = strlen($param4); #32


		 	
		 	$result = ($paraCount/$keyLength)*100 . '%';
		 
		 } 

		else {

			$result = 'niet';

		}

		return $result;

	}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>functies gevorderd 1</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">

		<p>Functie 1: de needle '<?= $needle ?>' komt <?= count1($needle) ?> voor in de hash key '<?= $md5HashKey ?>'</p>

		<p>Functie 2: de needle '<?= $needle2 ?>' komt <?= count2($needle2) ?> voor in de hash key '<?= $md5HashKey ?>'</p>

		<p>Functie 3: de needle '<?= $needle3 ?>' komt <?= count3($needle3, $md5HashKey) ?> voor in de hash key '<?= $md5HashKey ?>'</p>

	</section>

</body>
</html>