<?php

	session_start();

	$currentPage = basename( $_SERVER['PHP_SELF'] );

	function __autoload($class_name) {
	    include_once ( 'classes/' . $class_name . '.php' );
	}

	function funHeader($page){

		header('Location: '.$page);
	}


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

				funHeader('login-form.php');

			}
		}

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
				
				$validUser = true;

			} else 
			{
				setcookie('login','', time() - 3600 );
		
				funHeader('login-form.php');

			}

		}	
		catch (PDOException $e)
		{
			$message['type'] = 'error';
			$message['text'] = 'Er kon geen verbinding gemaakt worden met de database. Probeer opnieuw.';

		}

	} else 
	{

		funHeader('login-form.php');

	}



if ($validUser)
{

	if ( isset( $_POST['toevoegen'] ) ) 
	{
		if ( ( ($_FILES["profielfoto"]["type"] == "image/gif")
		|| ($_FILES["profielfoto"]["type"] == "image/jpeg")
		|| ($_FILES["profielfoto"]["type"] == "image/png") )
		&& ($_FILES["profielfoto"]["size"] < 2000000)) 
		{
			if ( $_FILES['profielfoto']['error'] > 0 ) 
			{	
				
				$_SESSION['notification']['type'] = 'error';
				$_SESSION['notification']['text'] = 'Het bestand heeft niet de juiste extensie of is groter dan 2mb. Probeer opnieuw.';

				funHeader('gegevens-wijzigen-form.php');

			} else 
			{	

				$timeStamp = time();
				$extension = explode('/', $_FILES["profielfoto"]["type"]);
				
				$fileName = $timeStamp.'_profielfoto.'.$extension[1];

				define('ROOT', dirname(__FILE__) );

				if ( file_exists( ROOT.'/img/'.$fileName ) ) 
				{
					
					$timeStamp = time();
				
					$fileName = $timeStamp.'_profielfoto.jpg';

				}

				move_uploaded_file( $_FILES['profielfoto']['tmp_name'], ( ROOT . "/img/" . $fileName ) );

				var_dump($fetchAssoc[0]['email']);

				$insertQuery = 'UPDATE users
								SET users.profile_picture = :filename
								WHERE users.email = :email';

				$tokens = array( ':filename' => $fileName, ':email' => $fetchAssoc[0]['email']);

				$result = DatabaseIm::query($db, $insertQuery, $tokens);


				$_SESSION[ 'notification' ]['type'] = 'succes';
				$_SESSION[ 'notification' ]['message'] = 'Gegevens succesvol gewijzigd.';
				$_SESSION['profielfoto'] = 'img/' . $fileName;

				funHeader('gegevens-wijzigen-form.php');

			}	

		} else 
		{

			$_SESSION['notification']['type'] = 'error';
			$_SESSION['notification']['text'] = 'Het bestand heeft niet de juiste extensie of is groter dan 2mb. Probeer opnieuw.';

			funHeader('gegevens-wijzigen-form.php');
		}	
	

	}	

}

	//var_dump($_GET);

	//var_dump($_SESSION);

	//var_dump($_POST);

	//var_dump($_FILES);

?>