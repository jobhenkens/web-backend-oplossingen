<?php

	function __autoload($class_name) {
	    include_once ( 'classes/' . $class_name . '.php' );
	}


	$nieuwDier1 = new Animal('Kermit', 'male', 100);
	#var_dump($nieuwDier1);
		
	$nieuwDier2 = new Animal('Dikkie', 'male', 90);
	#var_dump($nieuwDier2);
	
	$nieuwDier3 = new Animal('Flipper', 'female', 80);
	#var_dump($nieuwDier3);

	$nieuwDier2->changeHealth(-7);

	$move = $nieuwDier2->doSpecialMove();

	$nieuwDier3->changeHealth(30);



	$nieuweLeeuw1 = new Lion('Simba', 'male', 150, 'Congo lion');

	$nieuweLeeuw2 = new Lion('Scar', 'male', 70, 'Kenya lion');

	$nieuweZebra1 = new Zebra('Zeke', 'female', 55, 'Quagga');

	$nieuweZebra2 = new Zebra('Zana', 'male', 95, 'Selous');




?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Classes - Extends</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">
	<h2>Instanties van de Animal class</h2>

		<p><?= $nieuwDier1->getName() ?> is van het geslacht <?= $nieuwDier1->getGender() ?> en heeft momenteel <?= $nieuwDier1->getHealth() ?> levenspunten.</p>
		<p><?= $nieuwDier2->getName() ?> is van het geslacht <?= $nieuwDier2->getGender() ?> en heeft momenteel <?= $nieuwDier2->getHealth() ?> levenspunten.</p>
		<p><?= $nieuwDier3->getName() ?> is van het geslacht <?= $nieuwDier3->getGender() ?> en heeft momenteel <?= $nieuwDier3->getHealth() ?> levenspunten.</p>
		<p><?= $move ?></p>


	<h2>Specifieke dierenklassen die gebaseerd zijn op de Animal class</h2>
	<h3>Leeuwen</h3>
		<p>De speciale move van <?= $nieuweLeeuw1->getName() ?> (soort: <?= $nieuweLeeuw1->getSpecies() ?>): <?= $nieuweLeeuw1->doSpecialMove() ?></p>
		<p>De speciale move van <?= $nieuweLeeuw2->getName() ?> (soort: <?= $nieuweLeeuw2->getSpecies() ?>): <?= $nieuweLeeuw2->doSpecialMove() ?></p>
	<h3>Zebra's</h3>
		<p>De speciale move van <?= $nieuweZebra1->getName() ?> (soort: <?= $nieuweZebra1->getSpecies() ?>): <?= $nieuweZebra1->doSpecialMove() ?></p>
		<p>De speciale move van <?= $nieuweZebra2->getName() ?> (soort: <?= $nieuweZebra2->getSpecies() ?>): <?= $nieuweZebra2->doSpecialMove() ?></p>

	</section>

</body>
</html>