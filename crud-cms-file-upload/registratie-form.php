<?php

	session_start();

	$currentPage = basename( $_SERVER['PHP_SELF'] );

	//var_dump($_GET);

	//var_dump($_SESSION);

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
</head>
<body class="web-backend-inleiding">

	<section class="body">

	<h1>Registreren</h1>

	<p><?= ( isset( $_SESSION['invalidEmail'] ) && ($_SESSION['invalidEmail'] == true) ) ? $_SESSION[ 'notification' ]['message'] : '' ?></p>
	<p><?= ( isset( $_SESSION['checkEmail'] ) && ($_SESSION['checkEmail'] == true) ) ? $_SESSION[ 'notification' ]['message'] : '' ?></p>

	<form action="registratie-process.php" method="POST">
		<ul>
			<li>
				<label for="email">e-mail</label>
				<input type="email" name="email" value="<?= ( isset( $_SESSION['email'] ) ) ? $_SESSION['email'] : '' ?>">
			</li>
			<li>
				<label for="paswoord">paswoord</label>
				<input type="<?= ( isset($_SESSION['passwordGen']) ) ? 'text' : 'password' ?>" name="paswoord" value="<?= (isset($_SESSION['passwordGen']) ) ? $_SESSION['passwordGen'] : '' ?>"> <input type="submit" name="paswoordGeneratie" value="genereer een paswoord">
			</li>
			<li>
				<input type="submit" name="submit" value="registreren">
			</li>
			
		</ul>
	</form>

	<p><a href="registratie-process.php?session=destroy"><button>verwijder gegevens</button></a></p>

	

	</section>

</body>
</html>