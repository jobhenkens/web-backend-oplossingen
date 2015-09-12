<?php

	var_dump($_POST);

	$message = '';

	if ( isset( $_POST['submit']) ) {
		
		$regEx = $_POST['regEx'];
		$string = $_POST['string'];
		$match = preg_replace('/'.$regEx.'/', '#', $string);

		if ($match == $string) {

			$message = 'Er werd geen match gevonden.';
		} else {

			$message = $match;
		}
	}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>RegEx Tester</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
	<style>

		form {

			width: 25%;
			padding:10px;
		}

		textarea {

			width:100%;
			height: 100px
		}

	</style>
</head>
<body class="web-backend-inleiding">

	<section class="body">

	<h1>RegEx Tester</h1>

	<form action="regEx.php" method="POST">

		<label for="regEx">Regular expression</label><input type="text" name="regEx" value="<?= (isset($_POST['regEx'] ) ) ? $_POST['regEx'] : '' ?>">
		<label for="string">String</label><textarea name="string"><?= (isset($_POST['string'] ) ) ? $_POST['string'] : '' ?></textarea></br>
		<input type="submit" name="submit" value="test">

	</form>

	<p>Resultaat: <?= ( isset($message) ) ? $message : $message ?></p>

	</section>

</body>
</html>