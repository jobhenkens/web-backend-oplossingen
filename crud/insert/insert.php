<?php

	$message = false;

	#var_dump($_GET);

	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', ''); // Connectie maken
		

		if ( isset( $_GET['submit'] ) ) {
			
			$brNaam = $_GET['brnaam'];
			$brAdres = $_GET['adres'];
			$brPostcode = $_GET['postcode'];
			$brGemeente = $_GET['gemeente'];
			$brOmzet = $_GET['omzet'];

			$queryString = 'INSERT INTO brouwers (brnaam, adres, postcode, gemeente, omzet)
							VALUES ( :brnaam, :adres, :postcode, :gemeente, :omzet)';

			$statement = $db->prepare($queryString);

			$statement->bindValue( ':brnaam', $brNaam );
			$statement->bindValue( ':adres', $brAdres );
			$statement->bindValue( ':postcode', $brPostcode );
			$statement->bindValue( ':gemeente', $brGemeente );
			$statement->bindValue( ':omzet', $brOmzet );

			$isAdded = $statement->execute();

			if ( $isAdded )
			{
				$insertId			=	$db->lastInsertId();
				$message['type']	=	'success';
				$message['text']	=	'Brouwerij succesvol toegevoegd. Het unieke nummer van deze brouwerij is ' . $insertId . '.';
			}
			else
			{
				$message['type']	=	'error';
				$message['text']	=	'Er ging iets mis met het toevoegen, probeer opnieuw';
			}

		} 

	}
	catch ( PDOException $e )
	{
		$message['type']	=	'error';
		$message['text']	=	'De connectie is niet gelukt.';
	}

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD insert</title>
    <link rel="stylesheet" href="http://web-backend.local/css/global.css">
    <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
    <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
</head>

<body class="web-backend-voorbeeld">

	<section class="body">

		<h1>CRUD insert (PDO)</h1>	

		<h2>Voeg een brouwer toe</h2>

		<?php if ( $message ): ?>
			<p><?= $message['text'] ?></p>
		<?php endif ?>
		
		<form action="insert.php" method="get">
			<label for="brouwernaam">brouwernaam</label><input type="text" name="brnaam">
			<label for="adres">adres</label><input type="text" name="adres">
			<label for="postcode">postcode</label><input type="text" name="postcode">
			<label for="gemeente">gemeente</label><input type="text" name="gemeente">
			<label for="omzet">omzet</label><input type="text" name="omzet"></br>
			<input type="submit" value="verzenden" name="submit">
		</form>

<!-- hoe query valideren ??? !!! bekijk oplossingen ! -->

	</section>
		
</body>
</html>