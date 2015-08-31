<?php

	$messageContainer	=	'';

	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', ''); // Connectie maken
		$messageContainer = 'Connectie succesvol via PDO.';

		// Een query klaarmaken. 
		$queryString = 'SELECT brnaam, brouwernr FROM brouwers';

		$statement = $db->prepare($queryString);

		// Een query uitvoeren
		$statement->execute();

		$fetchAssoc = array();

		while ( $row = $statement->fetch(PDO::FETCH_ASSOC) )
		{
			$fetchAssoc[]	=	$row;
		}

		#var_dump($fetchAssoc);

		if ( isset( $_GET['brouwerij'] ) ) {

			$brouwerNr = $_GET['brouwerij'];

			$queryStringBieren = 'SELECT bieren.naam FROM bieren WHERE bieren.brouwernr = :brouwerNr';

			$statementBieren = $db->prepare($queryStringBieren);

			$statementBieren->bindParam(':brouwerNr', $brouwerNr );

			$statementBieren->execute();

			$fetchAssocBieren = array();

			while ( $rowBieren = $statementBieren->fetch(PDO::FETCH_ASSOC) )
			{
			
				$fetchAssocBieren[]	=	$rowBieren;
			
			}

			#var_dump($fetchAssocBieren);

		}

	}
	catch ( PDOException $e )
	{
		$messageContainer	=	'Er ging iets mis: ' . $e->getMessage();
	}

	var_dump($_GET);

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Query 2</title>
    <link rel="stylesheet" href="http://web-backend.local/css/global.css">
    <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
    <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
</head>

<body class="web-backend-voorbeeld">

	<section class="body">

		<h1>Query 2 (PDO)</h1>	

		<p><?php echo $messageContainer ?></p>

		<form action="query2.php" method="get">
		<ul>
			<li><select name="brouwerij" >
					<option value="geen keuze" >kies een brouwerij...</option>
				<?php foreach ($fetchAssoc as $key => $value): ?>
					<option value="<?= $value['brouwernr'] ?>" name="brouwerij" <?= ( ( isset( $_GET['brouwerij'] ) ) && ( $_GET['brouwerij'] === $value['brouwernr'] ) ) ? 'selected' : '' ?> ><?= $value['brnaam'] ?></option>
				<?php endforeach ?>
			</select></li>
			<li><input type="submit" name="submit" value="geef mij alle bieren van deze brouwerij"></li>
		</ul>	
		</form>

		<?php if( isset( $_GET['brouwerij'] ) ): ?>

			<?php if( $_GET['brouwerij'] === 'geen keuze' ): ?>
				<p>Gelieve een brouwerij te kiezen!</p>
			<?php else: ?>
				<table>
					<thead>
						<tr>
							<th>Aantal</th>
							<?php foreach ($fetchAssocBieren[0] as $key => $value): ?>
								<th><?= $key ?></th>
							<?php endforeach ?>	
						</tr>
					</thead>
					<tbody>
					<?php foreach ($fetchAssocBieren as $key => $value): ?>
						<tr class="<?= ($key%2 === 0) ? '' : 'even' ?>">
							<td><?= $key+1 ?></td>	
							<?php foreach ($fetchAssocBieren[$key] as $value): ?>
							<td><?= $value ?></td>
							<?php endforeach ?>
						</tr>
					<?php endforeach ?>	
					</tbody>		
				</table>
			<?php endif ?>
		<?php endif ?>

	</section>
		
</body>
</html>