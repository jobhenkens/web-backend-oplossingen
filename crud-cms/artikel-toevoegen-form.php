<?php

	session_start();

	$currentPage = basename( $_SERVER['PHP_SELF'] );

	if ( isset($_COOKIE['login'] ) ) 
	{
		
		//var_dump($_SESSION);
		//var_dump($_COOKIE);

		$saltUser = explode(',', $_COOKIE['login']);

		#var_dump($saltUser);

		if ( isset( $_GET['submit'] ) ) 
		{
			$submit = $_GET['submit'];
			
			if ( $submit == 'uitloggen' ) 
			{
				
				$_SESSION[ 'notification' ]['type'] = 'logout';
				$_SESSION[ 'notification' ]['message'] = 'U bent uitgelogd, tot de volgende keer.';

				setcookie('login','', time() - 3600 );

				header('Location: login-form.php');

			}
		}

		try 
		{

			$db = new PDO('mysql:host=localhost;dbname=opdracht-crud-cms', 'root', '' );

			$getUserData = 'SELECT * 
							FROM users 
							WHERE hashed_password = :hashed_password';

			$statementGetData = $db->prepare($getUserData);

			$statementGetData->bindValue( ':hashed_password', $saltUser[1] );

			$isGot = $statementGetData->execute();

			$fetchAssoc = array();

			while ( $row = $statementGetData->fetch(PDO::FETCH_ASSOC) ) 
			{

				$fetchAssoc[]	=	$row;

			}

			#var_dump($fetchAssoc);

			if ($saltUser[1] === $fetchAssoc[0]['hashed_password']) 
			{
				
				$dashboard = true;

			} else 
			{
				setcookie('login','', time() - 3600 );
		
				header('location: login-form.php');

			}

		}	
		catch (PDOException $e)
		{
			$message['type'] = 'error';
			$message['text'] = 'Er kon geen verbinding gemaakt worden met de database. Probeer opnieuw.';

		}

	} else 
	{

		header('Location: login-form.php');

	}

	//var_dump($_GET);

	var_dump($_SESSION);

	//var_dump($_POST);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Security login</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
	<link rel="stylesheet" type="text/css" href="css/cms.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">

	<?php if($dashboard): ?>

		<p><a href="dashboard.php">Terug naar dashboard</a> | Ingelogd als <?= $saltUser[0] ?> | <a href="dashboard.php?submit=uitloggen">uitloggen</a></p>
		<p><a href="artikel-overzicht.php">Terug naar overzicht</a></p>

		<h1>Artikel toevoegen</h1>

		<form action="artikel-toevoegen-process.php" method="POST">
		<ul>
			<li><label for="titel">Titel</label><input  class="formArtikels" type="text" name="titel" value=""></li>
			<li><label for="artikel">Artikel</label><textarea  class="formArtikels" name="artikel" value=""></textarea></li>
			<li><label for="kernwoorden">Kernwoorden</label><input class="formArtikels" type="text" name="kernwoorden" value=""></li>
			<li><label for="datum">Datum (dd-mm-jjjj)</label><input class="formArtikels" type="date" name="datum" value=""></li>
			<li><input type="submit" name="toevoegen" value="artikel toevoegen"></li>
		</ul>
		</form>

		<p><a href="registratie-process.php?session=destroy"><button>verwijder gegevens</button></a></p>

	<?php endif ?>	

	</section>

</body>
</html>