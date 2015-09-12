<?php

	

	$currentPage = basename( $_SERVER['PHP_SELF'] );

if ( isset( $_POST['toevoegen'] ) ) 
{
	if ( ( ($_FILES["foto"]["type"] == "image/gif")
		|| ($_FILES["foto"]["type"] == "image/jpeg")
		|| ($_FILES["foto"]["type"] == "image/jpg")
		|| ($_FILES["foto"]["type"] == "image/png") )
		&& ($_FILES["foto"]["size"] < 5000000)) 
		{
			if ( $_FILES['foto']['error'] > 0 ) 
			{	
				
				$_SESSION['notification']['type'] = 'error';
				$_SESSION['notification']['message'] = 'Het bestand heeft niet de juiste extensie of is groter dan 2mb. Probeer opnieuw.';

			} else 
			{	

				$timeStamp = time();
				$extension = explode('/', $_FILES["foto"]["type"]);
				
				$fileName = $timeStamp.'_foto.'.$extension[1];

				define('ROOT', dirname(__FILE__) );

				if ( file_exists( ROOT.'/img/'.$fileName ) ) 
				{
					
					$timeStamp = time();
				
					$fileName = $timeStamp.'_foto.jpg';

				}

				move_uploaded_file( $_FILES['foto']['tmp_name'], ( ROOT . "/img/" . $fileName ) );

				$thumbDimensions['w']	=	100;
				$thumbDimensions['h']	=	100;

				list($width, $height)	=	getimagesize('img/'.$fileName);


				$source 	= 	imagecreatefromjpeg('img/'.$fileName);
			

				var_dump($source);


				$thumb 	=	imagecreatetruecolor($thumbDimensions['w'], $thumbDimensions['h']);

				if ($width > $height) 
				{
					
					$sourceX = ($width/2) - ($height/2);
					$sourceY = 0;
					$width = $height;

				} elseif ($height > $width) 
				{

					$sourceY = ($height/2) - ($width/2);
					$sourceX = 0;
					$height = $width;

				} else 
				{

					$sourceY = 0;
					$sourceX = 0;

				}

				// Resize het origineel naar de gewenste dimensies en plaats het de verkleinde versie in het nieuwe canvas.
				// nieuwe canvas = destination, oude canvas = source, destination x, destination y, source x, source y, destination width, destination height, source width, source height
				imagecopyresized($thumb, $source, 0,0,$sourceX,$sourceY, $thumbDimensions['w'],$thumbDimensions['h'], $width, $height);

				var_dump($fileName);

		
				$resized 	= 	imagejpeg($thumb, ('img/thumb_'.$fileName), 100);
					
				
			}

			//var_dump($_GET);

			//var_dump($_SESSION);

			//var_dump($_POST);

			//var_dump($_FILES);

			//unset($_FILES);	

			//unset($_POST);


		} else 
		{

			$_SESSION['notification']['type'] = 'error';
			$_SESSION['notification']['message'] = 'Het bestand heeft niet de juiste extensie of is groter dan 2mb. Probeer opnieuw.';

		}	

}	

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Image manipulation</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">

		<h1>Thumbnail genereren</h1>

		<form action="index.php" method="POST" enctype="multipart/form-data">
		<ul>
			<li><label for="foto">Foto kiezen</label><input  class="formArtikels" type="file" name="foto" value="upload"></li>
			<li><input type="submit" name="toevoegen" value="Voeg foto toe"></li>
		</ul>
		</form>

		<img src="<?= ( isset( $fileName ) ) ? 'img/thumb_'.$fileName : '' ?>" alt="hier komt de thumb afbeelding"></br>
		<img src="<?= ( isset( $fileName ) ) ? 'img/'.$fileName : '' ?>" alt="hier komt de grote afbeelding">
	</section>

</body>
</html>