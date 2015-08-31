<?php

	$messageContainer	=	'';

	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', ''); // Connectie maken
		$messageContainer = 'Connectie succesvol via PDO.';

		// Een query klaarmaken. 
		$queryString = 'SELECT * FROM bieren
						INNER JOIN brouwers ON bieren.brouwernr = brouwers.brouwernr
						WHERE bieren.naam LIKE "du%" 
						AND brouwers.brnaam LIKE "%a%"';

		$statement = $db->prepare($queryString);

		// Een query uitvoeren
		$statement->execute();

		$fetchAssoc = array();

		while ( $row = $statement->fetch(PDO::FETCH_ASSOC) )
		{
			$fetchAssoc[]	=	$row;
		}

		#var_dump($fetchAssoc);

	}
	catch ( PDOException $e )
	{
		$messageContainer	=	'Er ging iets mis: ' . $e->getMessage();
	}

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Query</title>
    <link rel="stylesheet" href="http://web-backend.local/css/global.css">
    <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
    <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
</head>

<body class="web-backend-voorbeeld">

	<section class="body">

		<h1>Query (PDO)</h1>	

		<p><?php echo $messageContainer ?></p>

		<table>
			<thead>
				<tr>
					<th>#</th>
					<?php foreach ($fetchAssoc[0] as $key => $value): ?>
						<th><?= $key ?></th>
					<?php endforeach ?>	
				</tr>
			</thead>
			<?php foreach ($fetchAssoc as $key => $value): ?>
				<tr class="<?= ($key%2 === 0) ? '' : 'even' ?>">
					<td><?= $key+1 ?></td>	
					<?php foreach ($fetchAssoc[$key] as $value): ?>
					<td><?= $value ?></td>
					<?php endforeach ?>
				</tr>
			<?php endforeach ?>			
		</table>

	</section>
		
</body>
</html>