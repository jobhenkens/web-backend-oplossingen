<?php
	
	#var_dump($_GET);

	$pathVb = '/Users/jobhenkens/Documents/allwork etc/webdesign etc/opleiding-php-drupal/web-backend/cursus/public/cursus/voorbeelden';
	$pathOpd = '/Users/jobhenkens/Documents/allwork etc/webdesign etc/opleiding-php-drupal/web-backend/cursus/public/cursus/opdrachten';

	$listVb = scandir($pathVb);

	$listOpd = scandir($pathOpd);

	#var_dump($listVb);

	$list = array_merge($listVb, $listOpd);

	#var_dump($list);

	
	function showList($list){

		$result = array();

		foreach ($list as $value) {
			$result[] = $value;
		}

		return $result;
		
	}

	$resultaatVb = showList($listVb);
	$resultaatOpd = showList($listOpd);

	function searchFiles($list, $needle){

		$result = array();
		
		foreach ($list as $key => $value) {

			if ( strpos($value, $needle) ){

				$result[] = $value;
			} 
		
		}

		return $result;
		
	}

	if ( isset( $_GET['link'] ) ) {

		$link = $_GET['link'];

	} elseif ( isset( $_GET['zoeken'] ) ) {

		$getZoek = $_GET['zoeken'];
		$link = 'zoeken';
		$zoekresultaat = searchFiles($list, $getZoek);
	
	} else {

		$link = '';
		$getZoek = '';
	}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Herhalingsoefening</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">
		<h2>Indexpagina</h2>
			<nav>
				<ul>
					<li><a href="index.php">Indexpagina</a></li>
					<li><a href="index.php?link=cursus">Cursus</a></li>
					<li><a href="index.php?link=voorbeelden">Voorbeelden</a></li>
					<li><a href="index.php?link=opdrachten">Opdrachten</a></li>
				</ul>
			</nav>
			<form action="index.php" method="get">
				<label for="zoeken">Zoeken naar: </label><input type="search" name="zoeken" id="zoeken" placeholder="vul een zoekterm in">
				<input type="submit">
			</form>
	</section>
	<section class="body">

		<?php switch ( $link ): ?><?php case 'cursus': ?>
		<h2>Cursus</h2><iframe src="http://web-backend.local/cursus/web-backend-cursus.pdf"></iframe>
		<?php break; ?>

		<?php case 'voorbeelden': ?>
			<h2>Voorbeelden</h2>
			<ul>
			<?php foreach($resultaatVb as $value): ?>
					<li><a href="http://web-backend.local/cursus/voorbeelden/<?= $value ?>"><?= $value ?></a></li>
			<?php endforeach ?>
			</ul>
		<?php break; ?>

		<?php case 'opdrachten': ?>
		<h2>Opdrachten</h2>
			<ul>
			<?php foreach($resultaatOpd as $value): ?>
					<li><a href="http://web-backend.local/cursus/opdrachten/<?= $value ?>"><?= $value ?></a></li>
			<?php endforeach ?>
			</ul>
		<?php break; ?>

		<?php case 'zoeken': ?>
			<h2>Zoekresultaten voor: '<?= $_GET['zoeken'] ?>'</h2>
			<?php if($zoekresultaat): ?>
				<?php foreach($zoekresultaat as $value): ?>
							<li><?= $value ?></li>
				<?php endforeach ?>
			<?php else: ?>
				<p>Spijtig, geen zoekresultaten gevonden voor "<?= $_GET['zoeken'] ?>".</p>
			<?php endif ?>
		<?php break; ?>

		<?php case '': ?>

		<?php endswitch ?>
					


	</section>

</body>
</html>