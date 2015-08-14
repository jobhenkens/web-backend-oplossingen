<?php 

	$jaartal = 2000;

	if ( ($jaartal%4 !== 0 && $jaartal%400 !== 0) || $jaartal%100 === 0 ) {

		$sjaar = 'geen schrikkeljaar';

	}

	if ( $jaartal%4 === 0 || $jaartal%400 === 0 ) {

		$sjaar = 'een schrikkeljaar';

		}

?>

<!doctype <!DOCTYPE html>
<html>
<head>
	<title>statement if else</title>
</head>
<body>

	<p><?= $jaartal ?> is <?= $sjaar ?>.</p>

</body>
</html>