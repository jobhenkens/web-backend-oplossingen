<?php 

	session_start();

	var_dump($_POST);

	function __autoload($class_name) {
	    include_once ( 'classes/' . $class_name . '.php' );
	}

	function funHeader($page){

		header('Location: '.$page);
	}


if ( isset( $_POST['toevoegen'] ) && $_POST['toevoegen'] == 'artikel toevoegen' ) 
{
	$titel = $_POST['titel'];
	$artikel = $_POST['artikel'];
	$kernwoorden = $_POST['kernwoorden'];
	$datum = $_POST['datum'];

	try 
	{
		$db = new PDO('mysql:host=localhost;dbname=opdracht-crud-cms-file-upload', 'root', '');

		$addArtikel = DatabaseIm::query( $db, 'INSERT INTO artikels(artikels.titel, artikels.artikel, artikels.kernwoorden, artikels.datum) 
						    	 VALUES (:titel, 
						   		   :artikel, 
						   		   :kernwoorden, 
						   		   :datum)', array( ':titel' => $titel, 
													 ':artikel' => $artikel,
													 ':kernwoorden' => $kernwoorden,
													 ':datum' => $datum ) );


		if ($addArtikel)
		{
		
			$_SESSION[ 'notification' ]['type'] = 'added';
			$_SESSION[ 'notification' ]['message'] = 'Het artikel is succesvol toegevoegd.';

			var_dump($_SESSION);

			funHeader('artikel-overzicht.php');

		} else 
		{

			$_SESSION[ 'notification' ]['type'] = 'error';
			$_SESSION[ 'notification' ]['message'] = 'Het artikel kon niet toegevoegd worden.';

			funHeader('artikel-toevoegen-form.php');
		}

	}
	catch (PDOException $e) 
	{


	}

}

?>