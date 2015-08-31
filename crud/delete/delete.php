<?php

	session_start();

	$currentPage = basename( $_SERVER['PHP_SELF'] );

	$message = '';

	$todelete = false;



try {

	$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '');


	if ( isset( $_GET['delete'] ) ) {

		$todelete = true;

		$confirm = 'Bent u zeker dat u deze brouwerij wil verwijderen?';

		$deleteBrouwernr = $_GET['delete'];

		$_SESSION['deleteBrouwernr'] = $deleteBrouwernr;

		$deleteBrouwernrSess = $_SESSION['deleteBrouwernr'];

		var_dump($deleteBrouwernrSess);

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


	$queryString = 'SELECT * FROM brouwers';

	$statement = $db->prepare($queryString);

	$isSelected = $statement->execute();

	$fetchAssoc = array();

	while ( $row = $statement->fetch(PDO::FETCH_ASSOC) ) {
		
		$fetchAssoc[]	=	$row;

	}

	#var_dump($fetchAssoc);

}

catch ( PDOException $e ) {

	$message['type'] = 'error';
	$message['text'] = 'Er kon geen verbinding gemaakt worden met de database. Probeer opnieuw.';

}


var_dump($_GET);
var_dump($_SESSION);

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD delete</title>
    <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
    <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    <link rel="stylesheet" href="http://web-backend.local/css/global.css">
</head>

<body class="web-backend-voorbeeld">

	<section class="body">

	<h1>CRUD delete (PDO)</h1>	

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

		<!-- als je dingen moet deleten, gebruik POST !!! -->

	<form action="<?= $currentPage ?>" method="get">
		<table>
			<thead>
				<tr>
						<th>#</th>
					<?php foreach ($fetchAssoc[0] as $key => $value): ?>
						<th><?= $key ?></th>
				    <?php endforeach ?>
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
						</tr>
				<?php endforeach ?>	
			</tbody>
		</table>
	</form>
		

	</section>
		
</body>
</html>