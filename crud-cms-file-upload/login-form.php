<?php

	session_start();

	$currentPage = basename( $_SERVER['PHP_SELF'] );

if ( isset($_COOKIE['login'] ) ) 
{
	
	//var_dump($_SESSION);
	//var_dump($_COOKIE);

	$saltUser = explode(',', $_COOKIE['login']);

	var_dump($saltUser);

	try 
	{

		$db = new PDO('mysql:host=localhost;dbname=opdracht-crud-cms-file-upload', 'root', '' );

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

		var_dump($fetchAssoc);

		if ($saltUser[1] === $fetchAssoc[0]['hashed_password']) 
		{
			
			header('location: dashboard.php');

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

} 

	//var_dump($_GET);

	//var_dump($_POST);

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

	<p><?= ( isset($_SESSION[ 'notification' ]['type']) && $_SESSION[ 'notification' ]['type'] == 'logout' ) ? $_SESSION[ 'notification' ]['message'] : '' ?></p>
	<p><?= ( isset($_SESSION[ 'notification' ]['type']) && $_SESSION[ 'notification' ]['type'] == 'error' ) ? $_SESSION[ 'notification' ]['message'] : '' ?></p>

	<h1>Inloggen</h1>

<!--	<p><?= ( isset( $_SESSION['invalidEmail'] ) && ($_SESSION['invalidEmail'] == true) ) ? $_SESSION[ 'notification' ]['message'] : '' ?></p> 
	<p><?= ( isset( $_SESSION['checkEmail'] ) && ($_SESSION['checkEmail'] == true) && ($_SESSION[ 'notification' ]['type'] != 'logout')  ) ? $_SESSION[ 'notification' ]['message'] : '' ?></p> -->

	<form action="login-process.php" method="POST">
		<ul>
			<li>
				<label for="email">e-mail</label><input type="email" name="email" value="<?= ( isset( $_SESSION['email'] ) ) ? $_SESSION['email'] : '' ?>">
			</li>
			<li>
				<label for="paswoord">paswoord</label><input type="<?= ( isset($_SESSION['passwordGen']) ) ? 'text' : 'password' ?>" name="paswoord" value="<?= (isset($_SESSION['passwordGen']) ) ? $_SESSION['passwordGen'] : '' ?>">
			</li>
			<li>
				<input type="submit" name="submit" value="inloggen">
			</li>
			<li>
				<p>Nog geen account? Maak er dan eentje aan op de <a href="registratie-form.php">registratiepagina.</a></p>
			</li>
			
		</ul>
	</form>

	<p><a href="registratie-process.php?session=destroy"><button>verwijder gegevens</button></a></p>

	

	</section>

</body>
</html>