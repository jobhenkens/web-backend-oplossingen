<?php

	session_start();

	$currentPage = basename( $_SERVER['PHP_SELF'] );

try {

	$db = new PDO( 'mysql:host=localhost;dbname=bieren', 'root', '' );

	$richtingSess = ( isset( $_SESSION['richting'] ) ) ? $_SESSION['richting'] : 'ASC' ;

	#var_dump($richtingSess);

	if ( !(isset( $_GET['order_by'] ) ) ) {

		$order = orderBy($db, 'bieren.biernr', 'ASC');

		#var_dump($order);

	}

	if ( isset( $_GET['order_by'] ) ) {

		$orderBy = $_GET['order_by'];

	 	switch ($orderBy) {
	 			case 'biernr-desc':

	 				if ($richtingSess == 'ASC') {

	 					$order = orderBy($db, 'bieren.biernr', 'DESC');

	 					$_SESSION['richting'] = 'DESC';

	 				} elseif ($richtingSess == 'DESC') {

	 					$order = orderBy($db, 'bieren.biernr', 'ASC');

	 					$_SESSION['richting'] = 'ASC';

	 				}

	 				break;

	 			case 'naam-desc':

	 				if ($richtingSess == 'ASC') {

	 					$order = orderBy($db, 'bieren.naam', 'DESC');

	 					$_SESSION['richting'] = 'DESC';

	 				} elseif ($richtingSess == 'DESC') {

	 					$order = orderBy($db, 'bieren.naam', 'ASC');

	 					$_SESSION['richting'] = 'ASC';

	 				}
	 				
	 				break;

	 			case 'brnaam-desc':

	 				if ($richtingSess == 'ASC') {

	 					$order = orderBy($db, 'brouwers.brnaam', 'DESC');

	 					$_SESSION['richting'] = 'DESC';

	 				} elseif ($richtingSess == 'DESC') {

	 					$order = orderBy($db, 'brouwers.brnaam', 'ASC');

	 					$_SESSION['richting'] = 'ASC';

	 				}	

	 				break;

	 			case 'soort-desc':

	 				if ($richtingSess == 'ASC') {

	 					$order = orderBy($db, 'soorten.soort', 'DESC');

	 					$_SESSION['richting'] = 'DESC';

	 				} elseif ($richtingSess == 'DESC') {

	 					$order = orderBy($db, 'soorten.soort', 'ASC');

	 					$_SESSION['richting'] = 'ASC';

	 				}	

	 				break;

	 			case 'alcohol-desc':

	 				if ($richtingSess == 'ASC') {

	 					$order = orderBy($db, 'bieren.alcohol', 'DESC');

	 					$_SESSION['richting'] = 'DESC';

	 				} elseif ($richtingSess == 'DESC') {

	 					$order = orderBy($db, 'bieren.alcohol', 'ASC');

	 					$_SESSION['richting'] = 'ASC';

	 				}
	 				
	 				break;
	 			
	 			default:

	 				if ($richtingSess == 'ASC') {

	 					$order = orderBy($db, 'bieren.biernr', 'DESC');

	 					$_SESSION['richting'] = 'DESC';
	 					
	 				} elseif ($richtingSess == 'DESC') {

	 					$order = orderBy($db, 'bieren.biernr', 'ASC');

	 					$_SESSION['richting'] = 'ASC';

	 				}
	 				
	 				break;
	 		}	

	}

}

catch (PDOException $e) {

	$message['type'] = 'error';
	$message['text'] = 'Er kon geen verbinding gemaakt worden met de database. Probeer opnieuw.';

}

function orderBy($database, $kolom, $richting ) {

		$selectQuery = 'SELECT bieren.biernr, 
						bieren.naam, 
						brouwers.brnaam, 
						soorten.soort, 
						bieren.alcohol 
						FROM bieren 
						INNER JOIN brouwers ON bieren.brouwernr = brouwers.brouwernr 
						INNER JOIN soorten ON bieren.soortnr = soorten.soortnr 
						ORDER BY ' . $kolom . ' ' . $richting;

		$statementSel = $database->prepare($selectQuery);

		$statementSel->execute();

		$fetchAssoc = array();

		while ( $row = $statementSel->fetch(PDO::FETCH_ASSOC) )
		{

			$fetchAssoc[]	=	$row;
		
		}
		#var_dump($fetchAssoc);
		return $fetchAssoc;

}

?>

<!doctype <!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD query-order by</title>
    <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
    <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    <link rel="stylesheet" href="http://web-backend.local/css/global.css">
</head>
<body class="web-backend-voorbeeld">

	<section class="body">

	<h1>CRUD query-order by (PDO)</h1>	

	<table>
		<thead>
			<th class="order <?= ($richtingSess == 'ASC') ? 'ascending' : 'descending' ?>"><a href="query-orderby.php?order_by=biernr-desc">Biernummer</a></th>
			<th class="order <?= ($richtingSess == 'ASC') ? 'ascending' : 'descending' ?>"><a href="query-orderby.php?order_by=naam-desc">Bier</a></th>
			<th class="order <?= ($richtingSess == 'ASC') ? 'ascending' : 'descending' ?>"><a href="query-orderby.php?order_by=brnaam-desc">Brouwer</a></th>
			<th class="order <?= ($richtingSess == 'ASC') ? 'ascending' : 'descending' ?>"><a href="query-orderby.php?order_by=soort-desc">Soort</a></th>
			<th class="order <?= ($richtingSess == 'ASC') ? 'ascending' : 'descending' ?>"><a href="query-orderby.php?order_by=alcohol-desc">Alcoholpercentage</a></th>
			<th class="order"></th>
			<th class="order"></th>
		</thead>
		<tbody>
			<?php foreach ($order as $key => $value): ?>
				<tr>
				<?php foreach ($order[$key] as $value): ?>
					<td><?= $value ?></td>
				<?php endforeach ?>
					<td><button type="submit" name="delete" value="<?= $order[$key]['biernr'] ?>"><img src="images/icon-delete.png"></button></td>
					<td><button type="submit" name="edit" value="<?= $order[$key]['biernr'].'+'.$order[$key]['brnaam'] ?>"><img src="images/icon-edit.png"></button></td>
				</tr>
			<?php endforeach ?>	
		</tbody>
	</table>

		
</body>
</html>
</html>
