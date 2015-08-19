<?php

	$text = file_get_contents('text-file.txt');
	$textChars = str_split($text);
	#var_dump($textChars);
	rsort($textChars);

	#var_dump($textChars);
	$textCharsRev = array_reverse($textChars);
	#var_dump($textCharsRev);

	$countUnique = '';

	foreach (count_chars($text, 1) as $key => $value) {
		++$countUnique;
   		echo "<p>There were " .$value. " instance(s) of \"" , chr($key) , "\" in the string.\n</p>";
	}

	echo 'Er komen ' .$countUnique. ' unieke karakters voor in de tekst.';


/*	foreach ($textCharsRev as $key => $value) {

		$charCount = 1;

		$newArr[] = $value . '=' . $charCount;


		if ($value == )
	} */
	
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>foreach</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>
<body class="web-backend-inleiding">

	<section class="body">

	

	</section>

</body>
</html>