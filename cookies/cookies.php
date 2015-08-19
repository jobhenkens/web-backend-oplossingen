<?php

	$text = file_get_contents('text.txt');
	#var_dump($text);

	$exp = explode( ',', $text);
	#var_dump($exp);

	$message = '';
	$isAuthenticated = false;

	if (isset($_GET['cookie'])) {

	if ($_GET['cookie'] == 'delete') {
	
		setcookie('authenticated','', time() - 3600 );
		
		header('location: cookies.php');
	}
	}

	if( isset( $_POST['submit'] ) ) {

		$paswoordInput = $_POST['paswoord'];
		$gebruikersnaamInput = $_POST['gebruikersnaam'];

		if ( $exp[1] == $paswoordInput && $exp[0] == $gebruikersnaamInput ) {

			$message = 'Welkom!';

			if ( !isset( $_POST['onthouden'] ) ) {
				setcookie('authenticated',TRUE, 0 );
				header( 'location: cookies.php' );
			} else {
				setcookie('authenticated',TRUE, time() + 2592000 );
				header( 'location: cookies.php' );
			}
			
			
		} else {

			$message = 'Gebruikersnaam en/of paswoord niet correct. Probeer opnieuw.';

		} 

	} else {

			$gebruikersnaamInput = '';
		
		}

		//IF AUTHENTICATED
	if ( isset( $_COOKIE['authenticated'] ) ) 
	{
		$isAuthenticated	=	true;
	}



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cookies</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
	<style type="text/css">

	.error{
		color:red;

	.welkom{
		color:green;
	}

	}

	</style>
</head>
<body class="web-backend-inleiding">

	<section class="body">

	

	<?php if ( $isAuthenticated ):	?>

	<h2>Dashboard</h2>

		<p>Dag <?= $exp[0] ?>, fijn dat je er weer bent!</p>
		<p><a href="?cookie=delete">Uitloggen</a></p>

	<?php else: ?>

	<h2>Inloggen</h2>

	<?php if( $message ): ?>
		<p class="error"><?= $message ?></p>
	<?php endif ?>

			<form action="cookies.php" method="post">
			<ul>
				<li><label for="gebruikersnaam">Gebruikersnaam</label><input type="gebruikersnaam" name="gebruikersnaam" id="gebruikersnaam" value="<?= $gebruikersnaamInput ?>"></li>
				<li><label for="paswoord">Paswoord</label><input type="password" name="paswoord" id="paswoord"></li>
				<li><input type="radio" name="onthouden" id="onthouden" value="Onthoud mij"> Onthoud mij</li>
				<li><label></label><button type="submit" formmethod="post" name="submit">Verzenden</button></li>
			</ul>
			</form>

	<?php endif ?>
		

	</section>

</body>
</html>

	