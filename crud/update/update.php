<?php

	session_start();
	
	$currentPage = basename( $_SERVER['PHP_SELF'] );

	if (isset($_GET['session']))
	{
		if($_GET['session'] === 'destroy')
		{
			session_destroy();
			header('Location: update.php'); // staat in voor refresh
		}
	}

	$message = '';

	$edit = false;

	$todelete = false;


try {


	$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '');


	if ( isset( $_GET['delete'] ) ) {

		$todelete = true;

		$confirm = 'Bent u zeker dat u deze brouwerij wil verwijderen?';

		$deleteBrouwernr = $_GET['delete'];

		$_SESSION['deleteBrouwernr'] = $deleteBrouwernr;

		$deleteBrouwernrSess = $_SESSION['deleteBrouwernr'];

		#var_dump($deleteBrouwernrSess);

	}


	if ( isset( $_GET['confirm'] ) ) {

		$confirm = 'Bent u zeker dat u deze brouwerij wil verwijderen?';

		if ( $_GET['confirm'] === 'JA') {

		$deleteBrouwernrSess = $_SESSION['deleteBrouwernr'];

		$queryStringDel = 'DELETE 
							FROM `brouwers` 
							WHERE brouwers.brouwernr = :brouwernr
							LIMIT 1';

		$statementDel = $db->prepare($queryStringDel);

		$statementDel->bindValue( ':brouwernr', $deleteBrouwernrSess );

		$isDeleted = $statementDel->execute();

			if ( $isDeleted )
			{
				$message['type']	=	'success';
				$message['text']	=	'Brouwerij succesvol verwijderd.';
			}
			else
			{
				$message['type']	=	'error';
				$message['text']	=	'Er ging iets mis met het verwijderen, probeer opnieuw.';
			}

		}	elseif ( $_GET['confirm'] === 'NEE' ) {

		header($currentPage);

		}

	}	

	if ( isset( $_POST['submit'] ) ) {

		$wijzig = $_POST['submit'];

		if ( $wijzig == 'wijzigen' ) {

			var_dump($_GET);
			var_dump($_SESSION);
			var_dump($_POST);


		/* 	
				Haal data en fieldnames op voor specifieke brouwer 
				dmv een zelfgeschreven functie query() 
		*/
		$brouwersEdit	=	query( $db, 'SELECT * FROM brouwers WHERE brouwernr = :brouwernr', array( ':brouwernr' => $_SESSION['brouwernr'] ) );

			$wijzigQuery = 'UPDATE brouwers
							SET brouwers.brnaam = :brnaam,
							brouwers.adres = :adres,
							brouwers.postcode = :postcode,
							brouwers.gemeente = :gemeente,
							brouwers.omzet = :omzet 
							WHERE brouwers.brouwernr = :brouwernr
							LIMIT 1';

			$statementWijz = $db->prepare($wijzigQuery);

			$statementWijz->bindValue( ':brnaam', $_POST['brnaam'] );
			$statementWijz->bindValue( ':adres', $_POST['adres'] );
			$statementWijz->bindValue( ':postcode', $_POST['postcode'] );
			$statementWijz->bindValue( ':gemeente', $_POST['gemeente'] );
			$statementWijz->bindValue( ':omzet', $_POST['omzet'] );
			$statementWijz->bindValue( ':brouwernr', $_SESSION['brouwernr'] );

			$isGewijzigd = $statementWijz->execute();

				if ( $isGewijzigd )
				{
					$message['type']	=	'success';
					$message['text']	=	'Brouwerij succesvol gewijzigd.';
				}
				else
				{
					$message['type']	=	'error';
					$message['text']	=	'Er ging iets mis met het wijzigen, probeer opnieuw of neem  <a>contact</a> op met de systeembeheerder wanneer deze fout blijft aanhouden.';
				} 

		}
	}


	$queryString = 'SELECT * FROM brouwers';

	$statement = $db->prepare($queryString);

	$isSelected = $statement->execute();

	$fetchAssoc = array();

	while ( $row = $statement->fetch(PDO::FETCH_ASSOC) ) {
		
		$fetchAssoc[]	=	$row;

	}

	if ( isset( $_GET['edit'] ) ) {

		if ( $_GET['edit'] != 'wijzigen' ) {
			
			$edit = $_GET['edit'];

			$editSplit = explode('+', $edit);

			#var_dump($editSplit);
			#echo 'split';

			$editNr = $editSplit[0];

			$_SESSION['brouwernr'] = $editNr;

			$editNrSess = $_SESSION['brouwernr'];

			#var_dump($editNrSess);

			$editNaam = $editSplit[1];

			$_SESSION['brnaam'] = $editNaam;

			$editNaamSess = $_SESSION['brnaam'];

			$arrayPk = array();

			for ($keyFetch=0; $keyFetch < count($fetchAssoc); ++$keyFetch) { 
				
				$arrayPk[] = $fetchAssoc[$keyFetch]['brouwernr']; 
			}

			#var_dump($editNr);
			#var_dump($arrayPk);

			$countPk = array_search($editNr, $arrayPk);

			#var_dump($countPk);  /* voorlopig 0 ... !!! */

			if ( $countPk === false ) {

				$message['type']	=	'error';
				$message['text'] = 'Deze brouwerij werd niet gevonden.';
				#var_dump($message);
			
			}

		}

		/* 	
				Haal data en fieldnames op voor specifieke brouwer 
				dmv een zelfgeschreven functie query() 
		*/
		$brouwersEdit	=	query( $db, 'SELECT * FROM brouwers WHERE brouwernr = :brouwernr', array( ':brouwernr' => $_SESSION['brouwernr'] ) );
		

	}



}

catch ( PDOException $e ) {

	$message['type'] = 'error';
	$message['text'] = 'Er kon geen verbinding gemaakt worden met de database. Probeer opnieuw.';

}

function query( $db, $query, $tokens = false )
	{
		$statement = $db->prepare( $query );
		
		if ( $tokens )
		{
			foreach ( $tokens as $token => $tokenValue )
			{
				$statement->bindValue( $token, $tokenValue );
			}
		}

		$statement->execute();

		/*  Veldnamen ophalen*/
		$fieldnames	=	array();

		for ( $fieldNumber = 0; $fieldNumber < $statement->columnCount(); ++$fieldNumber )
		{
			$fieldnames[]	=	$statement->getColumnMeta( $fieldNumber )['name'];
		}

		/*De brouwer-data ophalen*/
		$data	=	array();

		while( $row = $statement->fetch( PDO::FETCH_ASSOC ) )
		{
			$data[]	=	$row;
		}

		$returnArray['fieldnames']	=	$fieldnames;
		$returnArray['data']		=	$data;

		#var_dump($returnArray);

		return $returnArray;
	}

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD update</title>
    <link rel="stylesheet" href="http://web-backend.local/css/global.css">
    <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
    <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
</head>

<body class="web-backend-voorbeeld">

	<section class="body">

	<h1>CRUD update (PDO)</h1>

		<?php if ( $edit ): ?>
			<h2>Brouwerij <?= $editNaamSess ?> (# <?= $editNrSess ?>) wijzigen</h2>
			<?php if($countPk === false): ?>
				<?= $message['text'] ?>
			<?php else: ?>
				<form action="<?= $currentPage ?>" method="POST">
					<ul>
						<?php foreach ($brouwersEdit['data'][0] as $fieldname => $value): ?>
							
							<?php if ( $fieldname != "brouwernr" ): ?>
								<li>
									<label for="<?= $fieldname ?>"><?= $fieldname ?></label>
									<input type="text" id="<?= $fieldname ?>" name="<?= $fieldname ?>" value="<?= $value ?>">
								</li>
							<?php endif ?>
							
						<?php endforeach ?>
					</ul>
					<input type="submit" name="submit" value="wijzigen">
				</form>
			<?php endif ?>
		<?php endif ?>	

		<?php if ( isset( $_POST['submit'] ) ): ?>
			<p><strong><?= $message['text'] ?></strong></p>
		<?php endif ?> 

		<?php if ( isset( $_GET['delete'] ) ): ?>
			<form action="<?= $currentPage ?>" method="get">
				<p><strong><?= $confirm ?></strong></p>
				<input type="submit" name="confirm" value="JA">
				<input type="submit" name="confirm" value="NEE">
			</form>

			<?php if ( $message ): ?>
			<p><strong><?= $message['text'] ?></strong></p>
			<?php endif ?> 
		<?php endif ?>

		


	<p><a href="update.php?session=destroy"><button>verwijder sessie</button></a></p>
	<h2>Overzicht van de brouwerijen:</h2>	
	<form action="<?= $currentPage ?>" method="get">
		<table>
			<thead>
				<tr>
						<th>#</th>
					<?php foreach ($fetchAssoc[0] as $key => $value): ?>
						<th><?= $key ?></th>
				    <?php endforeach ?>
				    	<th></th>
				    	<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($fetchAssoc as $key => $value): ?>
						<tr class="<?= ($todelete && $fetchAssoc[$key]['brouwernr'] === $_GET['delete']) ? 'todelete' : '' ?>">
							<td><?= $key+1 ?></td>	
							<?php foreach ($fetchAssoc[$key] as $value): ?>
							<td><?= $value ?></td>
							<?php endforeach ?>
							<td><button type="submit" name="delete" value="<?= $fetchAssoc[$key]['brouwernr'] ?>"><img src="images/icon-delete.png"></button></td>
							<td><button type="submit" name="edit" value="<?= $fetchAssoc[$key]['brouwernr'].'+'.$fetchAssoc[$key]['brnaam'] ?>"><img src="images/icon-edit.png"></button></td>
						</tr>
				<?php endforeach ?>	
			</tbody>
		</table>
	</form>
		

	</section>
		
</body>
</html>