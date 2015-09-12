<?php

	session_start();

	$currentPage = basename( $_SERVER['PHP_SELF'] );


	function funHeader($page){

		header('Location: '.$page);
	}


	if ( isset( $_POST['submit'] ) ) 
	{
		
		if ( isset($_POST['email'] ) )
		{

			$email = $_POST['email'];

			if ( isset( $_POST['kopie'] ) )
			{
				$_SESSION['kopie'] = $_POST['kopie'];
			}

			if ( filter_var($email, FILTER_VALIDATE_EMAIL ) ) 
			{		
				$_SESSION['email'] = $email;

				if ( $_POST['bericht'] !== '' ) 
				{
					$bericht = $_POST['bericht'];
					$_SESSION['bericht'] = $bericht;

				} else 
				{

					$_SESSION['message'] = 'Je gaf geen bericht mee.';
				}
			} else 
			{

				$_SESSION['message'] = 'Je gaf geen correct e-mailadres mee.';
			}
		}
	}

	funHeader('contact-form.php');

	



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>mail</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">

	<h1>Contacteer ons</h1>

	<form action="contact.php" method="POST">
		<ul>
			<li><label for="email">e-mailadres</label><input type="email" name="email"></li>
			<li><label for="bericht">bericht</label><textarea name="bericht" cols="50" rows="10"></textarea></li>
			<li><input type="checkbox" name="kopie"><label for="kopie"> Stuur een kopie naar mezelf</label></li>
			<li><input type="submit" name="submit" value="verzenden"></li>
		</ul>
	</form>

	

	</section>

</body>
</html>