<?php

	$rijen = 10;
	$kolommen = 10;
	$data = 'test';
	$output = '';
	$rij = '';

	for ($kol=0; $kol <10 ; ++$kol) { 
		
		$output .= '<td>'. $data .'</td>';
	}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>looping statements for</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">
		
		<table>
			<?php while ($rij < 10): ?>
				<?php 
				echo '<tr>' . $output . '</tr>';
				++$rij
				?>
			<?php endwhile ?>
		</table>

	</section>

</body>
</html>