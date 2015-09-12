<?php
	
	var_dump($_GET);

	function __autoload($class_name) 
	{

		include_once ('classes/' . $class_name . '.php');

	}


	if ( isset( $_GET['hook'] ) ) 
	{
		
		$hook = $_GET['hook'];

		$hook = trim($hook, '/');

		$hookExp = explode('/', $hook);

		var_dump($hookExp);

		if( isset($hookExp[0]) ) 
		{

				$inBieren = ucfirst($hookExp[0]);
				$inBieren = new $hookExp[0]();

		}

		switch ($hookExp[1]) 
		{
			case 'overview':
				$titel = $inBieren->$hookExp[1]();
				break;
			case 'insert':
				$titel = $inBieren->insert();
				break;
			case 'delete':
				$titel = $inBieren->delete();
				break;
			case 'update':
				$titel = $inBieren->update();
				break;
			
			default:
				$titel = 'Titel';
				break;
		}

		if ( isset( $hookExp[2] ) ) 
		{
			
			$id = $hookExp[2];

		}


	}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>single point of entry</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">

	<h1>Index</h1>
	<h2><?= (isset($hookExp[1] ) ) ? $titel : '' ?></h2>
	

	</section>

</body>
</html>