<?php

	session_start();

	$currentPage = basename( $_SERVER['PHP_SELF'] );


	function funHeader($page){

		header('Location: '.$page);
	}


try 
{	
	//var_dump($_POST);
	
	if ( isset( $_POST['submit'] ) ) 
	{
		$email = $_POST['email'];
		$paswoord = $_POST['paswoord'];

		$db = new PDO('mysql:host=localhost;dbname=opdracht-crud-cms', 'root', '' );

		$getUserData = 'SELECT * 
						FROM users 
						WHERE users.email = :email';

		$statementGetData = $db->prepare($getUserData);

		$statementGetData->bindValue( ':email', $email );

		$isGot = $statementGetData->execute();

		$fetchAssoc = array();

		while ( $row = $statementGetData->fetch(PDO::FETCH_ASSOC) ) 
		{

			$fetchAssoc[]	=	$row;

		}

		var_dump($fetchAssoc);
		var_dump($email);

		if ( $email === $fetchAssoc[0]['email'] ) 
		{

			$saltPassword = $fetchAssoc[0]['salt'].$paswoord;

			$hashPasswordLogin = hash('sha512', $saltPassword);

			if ( $hashPasswordLogin === $fetchAssoc[0]['hashed_password'] ) {

				unset($_SESSION[ 'notification' ]['type']);
				unset($_SESSION[ 'notification' ]['message']); 

				setcookie('login', $email.','.$fetchAssoc[0]['hashed_password'], time() + 2592000 );
			
				funHeader('dashboard.php');

			} else 
			{
				$_SESSION[ 'notification' ]['type'] = 'error';
				$_SESSION[ 'notification' ]['message'] = 'Er werd een verkeerd paswoord opgegeven. Probeer opnieuw aub.';	

				funHeader('login-form.php');
			}


		} else 
		{
			$_SESSION[ 'notification' ]['type'] = 'error';
			$_SESSION[ 'notification' ]['message'] = 'De gebruiker kon niet worden teruggevonden. <p>Nog geen account? Maak er dan eentje aan op de <a href="registratie-form.php">registratiepagina.</a></p>';

			funHeader('login-form.php');
		}
	}

}	
catch (PDOException $e)
{
	$message['type'] = 'error';
	$message['text'] = 'Er kon geen verbinding gemaakt worden met de database. Probeer opnieuw.';

} 

	//var_dump($_GET);

	//var_dump($_SESSION);

?>