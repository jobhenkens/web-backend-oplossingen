<?php
	#var_dump($GLOBALS);

	$artikels = array(	

		array('San Francisco verbiedt verkoop plastic waterflessen', '13 maart 2014', 'San Francisco heeft zojuist de verkoop van plastic waterflessen verboden in gebouwen, terreinen en evenementen van de gemeente. Het is de eerste Amerikaanse stad met deze fantastische nieuwe regelgeving! ', 'src="images/sf-plasticflessen.jpg"', 'San Francisco zegt no tegen plastic waterflessen', 'San Francisco heeft zojuist de verkoop van plastic waterflessen verboden in gebouwen, terreinen en evenementen van de gemeente. Het is de eerste Amerikaanse stad met deze fantastische nieuwe regelgeving! Het verbod geldt voor alle plastic waterflesjes tot 0,6 liter in gebouwen van de gemeente, parken, festivals, buurtfeesten, etc. Alleen als er geen goede watervoorzieningen aanwezig zijn kan een uitzondering op de regel worden aangevraagd. “Het is kort geleden dat onze wereld nog niet verslaafd was aan plastic waterflessen,” zegt Board of Supervisors President David Chiu. “Pas vanaf de jaren negentig is de plastic waterflessen industrie enorm gaan groeien tot de business van 45 miljard euro die het nu is gesteund door een gigantische marketing en distributie machine.” De Verenigde Staten consumeren meer verpakt water dan enig ander land. In totaal wordt daar het ongelofelijke aantal van 29 miljard plastic flesjes per jaar verkocht. Het kost, alleen al om deze flessen te maken, al 17 miljoen vaten ruwe olie. Meer dan genoeg om 1 miljoen auto’s een jaar lang op de weg te houden! En van al deze flessen wordt slechts een schamele 13 procent gerecycled. Het duurt honderden jaren voordat de overige 87% door de natuur afgebroken is. We weten niet hoe het moet jullie zit, maar wij zijn grote fans van San Francisco’s BYOWB (bring your own water bottle) beleid!' ),
		array('Schildpad verlost van vreemd voorwerp', '17 juni 2015 ', 'Wat de duizenden kilo’s plastic afval die ronddrijven op de oceaan kunnen aanrichten, wordt nog maar een keer aangetoond met deze video. Onderzoekers vonden deze schildpad in de buurt van Costa Rica en zagen een vreemd voorwerp in een van de neusgaten zitten. ', 'src="images/schildpad.jpg"', 'Schildpad', 'Wat de duizenden kilo’s plastic afval die ronddrijven op de oceaan kunnen aanrichten, wordt nog maar een keer aangetoond met deze video. Onderzoekers vonden deze schildpad in de buurt van Costa Rica en zagen een vreemd voorwerp in een van de neusgaten zitten. De onderzoekers dachten eerst dat het om een worm of een andere parasiet ging, maar nadat ze er in slaagden het voorwerp te verwijderen bleek het om een plastic rietje te gaan. De schildpad had duidelijk pijn tijdens het verwijderen en begint ook te bloeden. Nadat het rietje was weggehaald, werd de wonde ontsmet en de schildpad opnieuw vrijgelaten.' ),
		array('27.000 euro voor "aangespoelde takken"', '16 augustus 2015', 'Zowel in Bredene als in De Haan rezen er problemen bij projecten van Beaufort, de driejaarlijkse tentoonstelling van hedendaagse kunst aan de Belgische kust. De nieuwe aanpak van de organisatoren roept vragen op. ', 'src="images/bredene.jpg"', 'Beaufort in Bredene', 'Zowel in Bredene als in De Haan rezen er problemen bij projecten van Beaufort, de driejaarlijkse tentoonstelling van hedendaagse kunst aan de Belgische kust. De nieuwe aanpak van de organisatoren roept vragen op.
Op het strand van Bredene liggen houten takken. Vanop een zekere afstand zien ze eruit als een abstracte lijntekening in het zand, maar voor de wandelaar kunnen het evengoed aangespoelde takken zijn. Mettertijd zullen ze door het opkomende tij worden meegenomen.
Steve Vandenberghe, de burgemeester van Bredene, kan er niet mee lachen. ‘Wij hebben aan Beaufort 27.400 euro betaald’, zegt hij. ‘Op de begroting van een kleine gemeente is dat een serieus bedrag.’
‘Waar zijn de kunstwerken?’
Gisteren was er een crisisoverleg. ‘We stelden vast dat er een groot probleem is met de communicatie’, zei Myriam Vanlerberghe, gedeputeerde voor Cultuur. ‘We gaan zo snel mogelijk een nieuwe brochure publiceren waarin op een toegankelijke manier de aanpak van deze Beaufort en het verhaal van A Dog Republic (dat volgens de burgemeesters van de kuststeden erg op ‘aangespoelde takken’ lijkt, red.) wordt verteld.
Dat het ‘communicatieprobleem’ reëel is, ondervindt men dagelijks in Bredene. Aan de balie van de Dienst voor Toerisme komen daar geregeld mensen vragen naar het aangekondigde kunstwerk van Beaufort dat ze nergens zien.' )
			);

	$indArtikel = FALSE;

	$indArtikelData = array();

	if( isset( $_GET['id'] ) && is_numeric( $_GET['id'] ) && ($_GET['id'] <= count($artikels)) ) {

		$indArtikel = TRUE;

		$id = $_GET['id'];

		$indArtikelData = $artikels[$id];
 
	} else {

		echo 'error';

	}

 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php 
		if ($indArtikel == FALSE) {

		echo 'KRANT';

		} else {

			echo $indArtikelData[0];

		}

	?></title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body class="web-backend-inleiding">

	<section class="body">

		<?php 

		if ($indArtikel == FALSE) {

		echo '<h2>De krant van vandaag (en andere dagen):</h2>';

			foreach ($artikels as $key => $value){

				echo '<article>
						<h3>'.$value[0].'</h3>
						<p>'.$value[1].'</p>
						<p><img '.$value[3].'></p>
						<p>'.$value[2].'<a href="index.php?id='.$key.'">Lees meer...</a></p>
					</article>';

			}

		} else {

				echo '<article class="indiv">
						<h2>'.$indArtikelData[0].'</h2>
						<p>'.$indArtikelData[1].'</p>
						<p><img '.$indArtikelData[3].'></p>
						<p>'.$indArtikelData[5].'</p>
					</article>';

			} 
		
		?>
	
	</section>

</body>
</html>