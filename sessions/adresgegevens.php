<?php

	session_start();



	// Sessie verwijderen
	if (isset($_GET['session']))
	{
		if($_GET['session'] === 'destroy')
		{
			session_destroy();
			header('Location: registratie.php'); // staat in voor refresh
		}
	}

	if ( isset( $_POST['submit'] ) ) {
		
		$nicknameInput = $_POST['nickname'];
		$emailInput = $_POST['email'];

		$_SESSION['nickname'] = $nicknameInput;
		$_SESSION['email'] = $emailInput;

		$nicknameInputSess = $_SESSION['nickname'];
		$emailInputSess = $_SESSION['email'];
		$_GET['focus'] = ''; 

	} else {

		$nicknameInputSess = $_SESSION['nickname'];
		$emailInputSess = $_SESSION['email'];

	}




	if ( isset( $_SESSION['submitOverzicht'] ) ) {

		$straatInputSess = $_SESSION['straat'];
		$nummerInputSess = $_SESSION['nummer'];
		$gemeenteInputSess =  $_SESSION['gemeente'];
		$postcodeInputSess = $_SESSION['postcode'];

		
	} else {

			$straatInputSess = '';
			$nummerInputSess = '';
			$gemeenteInputSess =  '';
			$postcodeInputSess = '';

	}

	#var_dump($GLOBALS);


/*	if ($_POST['straat']) {

		$straatInput = $_POST['straat'];
		$nummerInput = $_POST['nummer'];
		$gemeenteInput = $_POST['gemeente'];
		$postcodeInput = $_POST['postcode'];

	} */

/*	if( isset( $_POST['submit'] ) ) {

		$nicknameInput = $_POST['email'];
		$emailInput = $_POST['nickname'];

		if ( $password == $passwordInput && $username == $usernameInput ) {

			$message = 'Welkom!';
			
		} else {

			$message = 'Sorry, je gaf verkeerde data in. Probeer opnieuw...';

		} 

	} */

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Adresgegevens</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">

		<h2>Registratiegegevens</h2>
		
			<ul>
				<li>email: <?= $emailInputSess ?></li>
				<li>nickname: <?= $nicknameInputSess ?></li>
			</ul>

		<h2>Deel 2: adresgegevens</h2>
		<form action="overzicht.php" method="post">
			<ul>
				<li><label for="straat">straat </label>
					<input type="text" name="straat" value="<?= $straatInputSess ?>" <?= ( $_GET['focus'] == 'straat' ) ? 'autofocus' : '' ?>>
				</li>
				<li><label for="nummer">nummer </label>
					<input type="number" name="nummer" value="<?= $nummerInputSess ?>" <?= ( $_GET['focus'] == 'nummer' ) ? 'autofocus' : '' ?>>
				</li>
				<li><label for="gemeente">gemeente </label>
					<input type="text" name="gemeente" value="<?= $gemeenteInputSess ?>" <?= ( $_GET['focus'] == 'gemeente' ) ? 'autofocus' : '' ?>>
				</li>
				<li><label for="postcode">postcode </label>
					<input type="number" name="postcode" value="<?= $postcodeInputSess ?>" <?= ( $_GET['focus'] == 'postcode' ) ? 'autofocus' : '' ?>>
				</li>	
				<li><input type="submit" value="Volgende" name="submitOverzicht"></li>

			
				

			</ul>
		</form>
		<a href="adresgegevens.php?session=destroy">Verwijder alle gegevens en ga terug naar de registratie</a>

	</section>

</body>
</html>