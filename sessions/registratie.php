<?php

	session_start();

	if ( !isset( $_SESSION['submitOverzicht'] ) ) {
	
		$_GET['focus'] = '';	
	
	}

 

	if (isset($_GET['session']))
	{

		if($_GET['session'] === 'destroy')
		{
			session_destroy();
			header('Location: adresgegevens.php'); // staat in voor refresh
		}
	
	}

	$email		=	( isset( $_SESSION[ 'email'] ) ) ? $_SESSION[ 'email'] : '';
	$nickname		=	( isset( $_SESSION[ 'nickname'] ) ) ? $_SESSION[ 'nickname'] : '';

	#var_dump($GLOBALS);


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registratie</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">

		<h2>Deel 1: registratiegegevens</h2>
		<form action="adresgegevens.php" method="post">
			<ul>
				<li><label for="email">e-mail </label>
					<input type="email" name="email" value="<?= $email ?>" <?= ( $_GET['focus'] == 'email' ) ? 'autofocus' : '' ?>>
				</li>
				<li><label for="nickname">nickname </label>
					<input type="text" name="nickname" value="<?= $nickname ?>" <?= ( $_GET['focus'] == 'nickname' ) ? 'autofocus' : '' ?>>
				</li>
				<li><input type="submit" value="Volgende" name="submit"></li>
			</ul>
		</form>

	</section>

</body>
</html>