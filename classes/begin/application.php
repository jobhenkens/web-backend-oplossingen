<?php 


	function __autoload($class_name) {
	    include_once ( 'classes/' . $class_name . '.php' );
	}

	$getal = 3003;
	$getal2 = 66767;

	$obj  = new Percent($getal, $getal2);

	var_dump($obj);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Classes</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">

	<h2>Classes</h2>

	<table>

		<th colspan="2">Hoeveel procent is <?= $getal ?> van <?= $getal2 ?>?</th>
		<?php foreach($obj as $key => $value): ?> 
			<tr>
				<td><?= $key ?></td>
				<td><?= $value ?></td>
			</tr>
		<?php endforeach ?>

	</table>

	

	</section>

</body>
</html>