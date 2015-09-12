<?php

	session_start();

	$currentPage = basename( $_SERVER['PHP_SELF'] );


	function funHeader($page){

		header('Location: '.$page);
	}


try {

	if (isset($_GET['session']))
	{
		if($_GET['session'] === 'destroy')
		{
			session_destroy();
			funHeader('registratie-form.php'); // staat in voor refresh
		}
	}


	if ( isset ( $_POST['paswoordGeneratie'] ) ) 
	{
		
		$email = $_POST['email'];
		$_SESSION['email'] = $email;

		$passwordGen = generatePassword(8);

		$_SESSION['passwordGen'] = $passwordGen;

		funHeader('registratie-form.php');

	}

	if ( isset( $_POST['submit'] ) ) 
	{

		$db = new PDO('mysql:host=localhost;dbname=opdracht-crud-cms', 'root', '' );
		
		$email = $_POST['email'];
		$_SESSION['email'] = $email;
		$emailSess = $_SESSION['email'];

		#var_dump($emailSess);	

		$paswoord = $_POST['paswoord'];
		$_SESSION['paswoord'] = $paswoord;
		$paswoordSess = $_SESSION['paswoord'];

		if ( filter_var($emailSess, FILTER_VALIDATE_EMAIL ) ) 
		{

			$checkEmailCount = checkEmail($db, $emailSess);
			//var_dump($checkEmailCount);

			if ( $checkEmailCount > 0 ) 
			{

				$_SESSION['checkEmail'] = true;

				$_SESSION[ 'notification' ]['type'] = 'error';
    			$_SESSION[ 'notification' ]['message'] = 'Het ingegeven e-mailadres bestaat al. Geef een ander e-mailadres in.';

    			funHeader('registratie-form.php');
			
			} elseif ( $checkEmailCount === 0 ) 
			{
				var_dump($checkEmailCount);

				$salt = uniqid(mt_rand(), true);
				var_dump($salt);

				$passwordSalt = $salt . $paswoordSess;
				var_dump($passwordSalt);

				$hashPassword = hash('sha512', $passwordSalt);
				var_dump($hashPassword);

				$queryAddUser = 'INSERT INTO users(users.email, users.salt, users.hashed_password, users.last_login_time) 
								VALUES (:email, 
										:salt, 
										:hashpassword, 
										NOW() )';

				$statementAdd = $db->prepare($queryAddUser);

				$statementAdd->bindValue( ':email', $emailSess );
				$statementAdd->bindValue( ':salt', $salt );
				$statementAdd->bindValue( ':hashpassword', $hashPassword );

				$isAdded = $statementAdd->execute();

				var_dump($isAdded);

				if ( $isAdded ) 
				{

					setcookie('login', $emailSess.','.$hashPassword, time() + 2592000 );
					funHeader('dashboard.php');

					unset ( $_SESSION['email'] );
					unset ( $_SESSION['paswoord'] );
					unset ( $_SESSION['passwordGen'] );
					unset ( $_SESSION['invalidEmail'] );
				}

			}


		} else 
		{

			$_SESSION['invalidEmail'] = true;
			$_SESSION['checkEmail'] = false;

			$_SESSION[ 'notification' ]['type'] = 'error';
    		$_SESSION[ 'notification' ]['message'] = 'Het ingegeven e-mailadres klopte niet. Probeer opnieuw aub.';
	
			funHeader('registratie-form.php');
		}
		
	}

}

catch ( PDOException $e ) 
{

	$message['type'] = 'error';
	$message['text'] = 'Er kon geen verbinding gemaakt worden met de database. Probeer opnieuw.';

}


function generatePassword($length = 8)
{

	$result = '';

	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	$count = mb_strlen($chars);

		for ($karak=0; $karak < $length; ++$karak) 
		{ 
			
			 $index = rand(0, $count - 1);
       		 $result .= mb_substr($chars, $index, 1);

       	}

   	return $result;

	
}

function checkEmail($dbase, $email)
{
	//var_dump($email);

	$_SESSION['invalidEmail'] = false;


	$checkEmailQuery = 'SELECT users.email 
						FROM users';

	$statementCheckEmail = $dbase->prepare($checkEmailQuery);

	$isChecked = $statementCheckEmail->execute();

	$fetchAssoc = array();

	while ( $row = $statementCheckEmail->fetch(PDO::FETCH_ASSOC) ) 
	{

		$fetchAssoc[]	=	$row;

	}

	//var_dump($fetchAssoc);

	$checkEmail = array();

	for ($iMail=0; $iMail < count($fetchAssoc); ++$iMail) 
	{ 

		#var_dump($emailSess);	
		if ( array_search($email, $fetchAssoc[$iMail] ) )
		{

		$checkEmail[] = true;

		}

	} 

	#var_dump($checkEmail);

	$result = count( $checkEmail );

	//var_dump ( $result );

	

	return $result;
}

	#var_dump($_GET);
	#var_dump($_POST);


?>