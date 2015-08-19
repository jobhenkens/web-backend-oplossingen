<?php

	session_start();

	$straatInput = $_POST['straat'];    
	$nummerInput = $_POST['nummer'];
	$gemeenteInput = $_POST['gemeente'];
	$postcodeInput = $_POST['postcode'];
	$submitOverzichtInput = $_POST['submitOverzicht'];

	$_SESSION['straat'] = $straatInput;
	$_SESSION['nummer'] = $nummerInput;
	$_SESSION['gemeente'] = $gemeenteInput;
	$_SESSION['postcode'] = $postcodeInput;
	$_SESSION['submitOverzicht'] = $submitOverzichtInput;

	$straatInputSess = $_SESSION['straat'];
	$nummerInputSess = $_SESSION['nummer'];
	$gemeenteInputSess =  $_SESSION['gemeente'];
	$postcodeInputSess = $_SESSION['postcode'];
	$nicknameInputSess = $_SESSION['nickname'];
	$emailInputSess = $_SESSION['email'];
	$submitOverzichtInputSess = $_SESSION['submitOverzicht'];

	#var_dump($GLOBALS);


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
	<title>Overzichtspagina</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">

		<h2>Overzichtspagina</h2>
		
			<ul>
				<li>email: <?= $emailInputSess . ' | ' ?><a href="registratie.php?focus=email">Wijzig</a></li>
				<li>nickname: <?= $nicknameInputSess . ' | '  ?><a href="registratie.php?focus=nickname">Wijzig</a></li>
				<li>straat: <?= $straatInputSess . ' | '  ?><a href="adresgegevens.php?focus=straat">Wijzig</a></li>
				<li>nummer: <?= $nummerInputSess . ' | '  ?><a href="adresgegevens.php?focus=nummer">Wijzig</a></li>
				<li>gemeente: <?= $gemeenteInputSess . ' | '  ?><a href="adresgegevens.php?focus=gemeente">Wijzig</a></li>
				<li>postcode: <?= $postcodeInputSess . ' | '  ?><a href="adresgegevens.php?focus=postcode">Wijzig</a></li>
			</ul>

	</section>

</body>
</html>