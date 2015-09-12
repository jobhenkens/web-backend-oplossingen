<?php

	session_start();

	$currentPage = basename( $_SERVER['PHP_SELF'] );

	$isValid = false;

try 
{
	if ( isset( $_POST['submit'] ) ) 
	{
		
		$submit = $_POST['submit'];

		if ( isset( $_POST['code'] ) )
		{
			$code = $_POST['code'];

			var_dump($code);

			if ( strlen( $code !== 8 ) ) 
			{
				
				throw new Exception( 'VALIDATION-CODE-LENGTH' );
				
			} else 
			{

				$isValid = true;
			}
		
		} else 
		{

			throw new Exception('SUBMIT-ERROR');
			
		}
	}



}
catch (Exception $e)
{
	$messageCode	=	$e->getMessage();

	var_dump($messageCode);

	$message	=	array();

	$createMessage	=	FALSE;

	switch( $messageCode )
	{
		case 	'SUBMIT-ERROR':
			$message[ 'type' ]	=	'error';
			$message[ 'text' ]	=	'Het juiste veld ontbreekt';

			break;

		case	'VALIDATION-CODE-LENGTH':
			$message[ 'type' ]	=	'error';
			$message[ 'text' ]	=	'De kortingscode heeft niet de juiste lengte';

			$createMessage	=	TRUE;

			break;
	}

	if ( $createMessage )
	{

		createMessage( $message );
	
	}

	logToFile( $message );
}

$message	=	getMessage();

function createMessage ($message) 
{
	$_SESSION['message'] = $message;

}

function getMessage () 
{

	$message = false;

	if ( isset( $_SESSION['message'] ) ) 
	{
		$message = $_SESSION['message'];
		unset($_SESSION['message']);

	}

	return $message;
}

function logToFile( $message )
{	
	$date = '[' . date( 'H:i:s', time() ).']';
	$ip = $_SERVER['REMOTE_ADDR'];

	$errorString = $date.' - '. $ip .' - type: ['.$message['type'].'] '.$message['text']."\n\r";

	file_put_contents( 'error.log', $errorString, FILE_APPEND );

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Error handling</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">
<?php if (!$isValid): ?>
	<h1>Geef uw kortingscode op:</h1>
	<form action="<?= $currentPage ?>" method="POST">

		<label for="code">Code</label><input type="text" name="code" value="">	
		<input type="submit" name="submit" value="verzend code">	

	</form>
<?php else: ?>
	<p>Korting toegekend!</p>
<?php endif ?>

	

	</section>

</body>
</html>