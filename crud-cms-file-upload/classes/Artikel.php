<?php 

class Artikel 
{

	private $db;

	public function __construct ($database)
	{

		$this->db = $database;

	}

	public function add()
	{

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
} 

?>