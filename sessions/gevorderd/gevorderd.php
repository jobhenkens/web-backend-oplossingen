<?php

	session_start();

	if (isset($_GET['session'] ) )
	{
		if($_GET['session'] === 'destroy')
		{
			session_destroy();
			header('Location: gevorderd.php'); // staat in voor refresh
		}
	}

	if ( isset($_POST['product'] ) ) {

		$product = $_POST['product'];

		$_SESSION['producten'][] = $product;
		
		#var_dump($_SESSION);

		$_SESSION['arrayCount'] =  array_count_values($_SESSION['producten']);

		#var_dump($_SESSION['arrayCount']);

	}

	if ( isset( $_POST['delete'] ) ) {
		
		$deleteProd = $_POST['delete'];
		#var_dump($deleteProd);
		#var_dump($_SESSION['arrayCount'][$deleteProd]);

		unset( $_SESSION['arrayCount'][$deleteProd] );

		foreach ( $_SESSION['producten'] as $key => $value) { 
			
			if ( isset( $_SESSION['producten'][$key] ) ) {

				if ( $_SESSION['producten'][$key] === $deleteProd ){

					unset( $_SESSION['producten'][$key] );

				}
			}	
		}

		
	}

	if ( isset( $_POST['min'] ) ) {

		$minProd = $_POST['min'];

		#var_dump($minProd);

		#var_dump($_SESSION['arrayCount'][$minProd]);

		if ( $_SESSION['arrayCount'][$minProd] === 1 ){

			unset( $_SESSION['arrayCount'][$minProd] );

			foreach ( $_SESSION['producten'] as $key => $value) { 
			
				if ( isset( $_SESSION['producten'][$key] ) ) {

					if ( $_SESSION['producten'][$key] === $minProd ){

						unset( $_SESSION['producten'][$key] );

					}
				}	
			}

		} else {

			#var_dump($minProd);

			#var_dump($_SESSION['producten']);

			$arrayMin = array();

			$arrayMin = array_search( $minProd, $_SESSION['producten'] );

			#var_dump($arrayMin);

			unset($_SESSION['producten'][$arrayMin]);

			$_SESSION['arrayCount'] =  array_count_values($_SESSION['producten']);

		}
	}

	if ( isset( $_POST['plus'] ) ) {

		$plusProd = $_POST['plus'];

		#var_dump($plusProd);
		
		$_SESSION['producten'][] = $plusProd;

		$_SESSION['arrayCount'] =  array_count_values($_SESSION['producten']);
	}


	#var_dump($_POST);
	#var_dump($_SESSION);


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sessions gevorderd</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">

		<h2>Winkelrek</h2>
		<p>Klik op een product om het aan het winkelmandje toe te voegen</p>
			<form action="gevorderd.php" method="POST">
				<input type="submit" name="product" value="bananen">
				<input type="submit" name="product" value="melk">
				<input type="submit" name="product" value="eieren">
				<input type="submit" name="product" value="vlees">
				<input type="submit" name="product" value="boter">
				<input type="submit" name="product" value="koeken">
				<input type="submit" name="product" value="sla">
				<input type="submit" name="product" value="vis">
				<input type="submit" name="product" value="fruit">
			</form>

		<h2>Winkelmandje</h2>
		<ul>
		<form action="gevorderd.php" method="POST">

			<?php if( isset( $_SESSION['arrayCount'] ) ): ?>
				<?php foreach($_SESSION['arrayCount'] as $prod => $aantal): ?>
				
						<li><button type="submit" name="delete" value="<?= $prod ?>">X</button><?= $prod ?><button type="submit" name="min" value="<?= $prod ?>">-</button>(<?= $aantal ?>)<button type="submit" name="plus" value="<?= $prod ?>">+</button></li>
				
				<?php endforeach ?>
			<?php endif ?>

		</form>
		</ul>

		<a href="gevorderd.php?session=destroy" name="session" value="destroy"><button>Verlaat de winkel</button></a>

	</section>

</body>
</html>