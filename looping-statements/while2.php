<?php

	$boodschappenlijstje = array('boter', 'kaas', 'melk', 'soep', 'vlees', 'zout');

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>loop statements while2</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">

		<h2>Boodschappenlijstje:</h2>
			<ul>
				<?php foreach ($boodschappenlijstje as $boodschap): ?>
					<?= '<li>' . $boodschap . '</li>' ?>
				<?php endforeach ?>
			</ul>

	</section>

</body>
</html>