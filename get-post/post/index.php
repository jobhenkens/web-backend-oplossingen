<?php
	
	$password = 'paswoord';
	$username =  'Job Henkens';

	$usernameInput = '';

	$message = '';

	if( isset( $_POST['submit'] ) ) {

		$passwordInput = $_POST['password'];
		$usernameInput = $_POST['username'];

		if ( $password == $passwordInput && $username == $usernameInput ) {

			$message = 'Welkom!';
			
		} else {

			$message = 'Sorry, je gaf verkeerde data in. Probeer opnieuw...';

		}

	}

	#var_dump($GLOBALS);


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>POST</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">

		<p><?= $message ?></p>

	<h2>Inloggen</h2>
		<p>
		<form action="index.php" method="post">

			<label for="username">Username</label><input type="username" name="username" id="username" value="<?= $usernameInput ?>">
			<label for="password">Password</label><input type="password" name="password" id="password">
			<label></label><button type="submit" formmethod="post" name="submit">Query verzenden</button>

		</form>
		</p>

	</section>

</body>
</html>