<?php

	#var_dump($GLOBALS);


	$artikels = array(	

		array('titel' => 'San Francisco verbiedt verkoop plastic waterflessen', 
			'datum' => '13 maart 2014', 
			'inleiding' => 'San Francisco heeft zojuist de verkoop van plastic waterflessen verboden in gebouwen, terreinen en evenementen van de gemeente. Het is de eerste Amerikaanse stad met deze fantastische nieuwe regelgeving! ', 
			'afbeelding' => 'src="images/sf-plasticflessen.jpg"', 
			'afbeeldingBeschrijving' => 'San Francisco zegt no tegen plastic waterflessen',
			'artikel' => 'San Francisco heeft zojuist de verkoop van plastic waterflessen verboden in gebouwen, terreinen en evenementen van de gemeente. Het is de eerste Amerikaanse stad met deze fantastische nieuwe regelgeving! Het verbod geldt voor alle plastic waterflesjes tot 0,6 liter in gebouwen van de gemeente, parken, festivals, buurtfeesten, etc. Alleen als er geen goede watervoorzieningen aanwezig zijn kan een uitzondering op de regel worden aangevraagd. “Het is kort geleden dat onze wereld nog niet verslaafd was aan plastic waterflessen,” zegt Board of Supervisors President David Chiu. “Pas vanaf de jaren negentig is de plastic waterflessen industrie enorm gaan groeien tot de business van 45 miljard euro die het nu is gesteund door een gigantische marketing en distributie machine.” De Verenigde Staten consumeren meer verpakt water dan enig ander land. In totaal wordt daar het ongelofelijke aantal van 29 miljard plastic flesjes per jaar verkocht. Het kost, alleen al om deze flessen te maken, al 17 miljoen vaten ruwe olie. Meer dan genoeg om 1 miljoen auto’s een jaar lang op de weg te houden! En van al deze flessen wordt slechts een schamele 13 procent gerecycled. Het duurt honderden jaren voordat de overige 87% door de natuur afgebroken is. We weten niet hoe het moet jullie zit, maar wij zijn grote fans van San Francisco’s BYOWB (bring your own water bottle) beleid!' ),
		
		array('titel' => 'Schildpad verlost van vreemd voorwerp',
			'datum' => '17 juni 2015 ',
			'inleiding' => 'Wat de duizenden kilo’s plastic afval die ronddrijven op de oceaan kunnen aanrichten, wordt nog maar een keer aangetoond met deze video. Onderzoekers vonden deze schildpad in de buurt van Costa Rica en zagen een vreemd voorwerp in een van de neusgaten zitten. ',
			'afbeelding' => 'src="images/schildpad.jpg"',
			'afbeeldingBeschrijving' => 'Schildpad',
			'artikel' => 'Wat de duizenden kilo’s plastic afval die ronddrijven op de oceaan kunnen aanrichten, wordt nog maar een keer aangetoond met deze video. Onderzoekers vonden deze schildpad in de buurt van Costa Rica en zagen een vreemd voorwerp in een van de neusgaten zitten. De onderzoekers dachten eerst dat het om een worm of een andere parasiet ging, maar nadat ze er in slaagden het voorwerp te verwijderen bleek het om een plastic rietje te gaan. De schildpad had duidelijk pijn tijdens het verwijderen en begint ook te bloeden. Nadat het rietje was weggehaald, werd de wonde ontsmet en de schildpad opnieuw vrijgelaten.' ),
		
		array('titel' => '27.000 euro voor "aangespoelde takken"',
			'datum' => '16 augustus 2015',
			'inleiding' => 'Zowel in Bredene als in De Haan rezen er problemen bij projecten van Beaufort, de driejaarlijkse tentoonstelling van hedendaagse kunst aan de Belgische kust. De nieuwe aanpak van de organisatoren roept vragen op. ',
			'afbeelding' => 'src="images/bredene.jpg"',
			'afbeeldingBeschrijving' => 'Beaufort in Bredene',
			'artikel' => 'Zowel in Bredene als in De Haan rezen er problemen bij projecten van Beaufort, de driejaarlijkse tentoonstelling van hedendaagse kunst aan de Belgische kust. De nieuwe aanpak van de organisatoren roept vragen op.
Op het strand van Bredene liggen houten takken. Vanop een zekere afstand zien ze eruit als een abstracte lijntekening in het zand, maar voor de wandelaar kunnen het evengoed aangespoelde takken zijn. Mettertijd zullen ze door het opkomende tij worden meegenomen.
Steve Vandenberghe, de burgemeester van Bredene, kan er niet mee lachen. ‘Wij hebben aan Beaufort 27.400 euro betaald’, zegt hij. ‘Op de begroting van een kleine gemeente is dat een serieus bedrag.’
‘Waar zijn de kunstwerken?’
Gisteren was er een crisisoverleg. ‘We stelden vast dat er een groot probleem is met de communicatie’, zei Myriam Vanlerberghe, gedeputeerde voor Cultuur. ‘We gaan zo snel mogelijk een nieuwe brochure publiceren waarin op een toegankelijke manier de aanpak van deze Beaufort en het verhaal van A Dog Republic (dat volgens de burgemeesters van de kuststeden erg op ‘aangespoelde takken’ lijkt, red.) wordt verteld.
Dat het ‘communicatieprobleem’ reëel is, ondervindt men dagelijks in Bredene. Aan de balie van de Dienst voor Toerisme komen daar geregeld mensen vragen naar het aangekondigde kunstwerk van Beaufort dat ze nergens zien.' ),
			array('titel' => 'tititititit',
				'datum' => '7756789',
				'inleiding' => 'fjdksofjvndjvknvdjvkdnvnjjdjvkdkjdkkv',
				'afbeelding' => '',
				'afbeeldingBeschrijving' => 'fjkvkddfkjbeijgbpiugnrgekjngldskjfbnsdlkjgblkbgjkd',
				'artikel' => 'ekjgnmgkndmkjnk skjvndmnfmgndkjngkdjngdkjkdkdkdkddddddddddddd')

			);

		/* CHECK ook hoe het gaat met toevoeging van een artikel!! */

	$indArtikel = FALSE;

	$indArtikelData = array();

	if( isset( $_GET[ 'id' ] ) && is_numeric( $_GET['id'] ) && ($_GET['id'] <= count($artikels)) ) {

		$indArtikel = 'true';

		$id = $_GET['id'];

		$indArtikelData = $artikels[$id];

		/* check if id bestaat array_key_exists() */
 
	} elseif ( isset( $_GET['id'] ) ) {

		$indArtikel = 'false';

	} 

 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php if ($indArtikel == FALSE): ?>
				<?= 'KRANT' ?>
		<?php elseif ($indArtikel == 'true'): ?>
				<?= $indArtikelData['titel'] ?>
		<?php else: ?>
				<?= 'KRANT' ?>
		<?php endif ?>
	</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body class="web-backend-inleiding">

	<section class="body">

		<?php if ($indArtikel == FALSE): ?>

			<h2>De krant van vandaag (en andere dagen)</h2>

			<?php foreach ($artikels as $key => $value): ?>

				<article>
						<h3><?= $value['titel'] ?></h3>
						<p><?= $value['datum'] ?></p>
						<p><img <?= $value['afbeelding'] ?>></p>
						<p><?= $value['inleiding'] ?><a href="index2.php?id=<?= $key ?>">Lees meer...</a></p>
				</article>

			<?php endforeach ?>

		<?php endif ?>


		<?php if ($indArtikel == 'true'): ?>

				<article class="indiv">
						<h2><?= $indArtikelData['titel'] ?></h2>
						<p><?= $indArtikelData['datum'] ?></p>
						<p><img <?= $indArtikelData['afbeelding'] ?>></p>
						<p><?= $indArtikelData['artikel'] ?></p>
				</article>

			<?php elseif ($indArtikel == 'false'): ?>

				<h3>Helaas...</h3>

				<p>Dit artikel bestaat niet</p>

		<?php endif ?>
	
	</section>

</body>
</html>