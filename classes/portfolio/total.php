<?php

	function __autoload($class_name) {
	    include_once ( 'classes/' . $class_name . '.php' );
	}

	$instantieHTMLB = new HTMLBuilder();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LONT design</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/global.css">
</head>
<body>
<header>

	<h1>LONT design // web - brand - product</h1>
	<nav>
		<ul>
			<li><a href="#">HOME//WORK</a></li>
			<li><a href="#">CONTACT</a></li>
			<li><a href="#">ABOUT</a></li>
		</ul>
	</nav>

</header>
<main>

	<section>
		<article>
			<h2>Dit is de titel van een section:</h2>
			<p>The background-image property sets one or more background images for an element. The <a href="#">background of an element</a>	 is the total size of the element, including padding and border (but not the margin).
			By default, a background-image is placed at the top-left corner of an element, and repeated both vertically and horizontally.
			Tip: Always set a background-color to be used if the image is unavailable.</p>
		</article>
		<article>
			<h2>Dit is de titel van een section:</h2>
				<p>The background-image property sets one or more background images for an element. The <a href="#">background of an element</a>	 is the total size of the element, including padding and border (but not the margin).
			By default, a background-image is placed at the top-left corner of an element, and repeated both vertically and horizontally.
			Tip: Always set a background-color to be used if the image is unavailable.</p>
		</article>	
		<article>
			<h2>Dit is de titel van een section:</h2>
				<p>The background-image property sets one or more background images for an element. The <a href="#">background of an element</a>	 is the total size of the element, including padding and border (but not the margin).
			By default, a background-image is placed at the top-left corner of an element, and repeated both vertically and horizontally.
			Tip: Always set a background-color to be used if the image is unavailable.</p>
			<p>The background-image property sets one or more background images for an element. The <a href="#">background of an element</a>	 is the total size of the element, including padding and border (but not the margin).
			By default, a background-image is placed at the top-left corner of an element, and repeated both vertically and horizontally.
			Tip: Always set a background-color to be used if the image is unavailable.</p>
			<p>The background-image property sets one or more background images for an element. The <a href="#">background of an element</a>	 is the total size of the element, including padding and border (but not the margin).
			By default, a background-image is placed at the top-left corner of an element, and repeated both vertically and horizontally.
			Tip: Always set a background-color to be used if the image is unavailable.</p>
		</article>		
	</section>


</main>

<aside>
	<article>
		<h3>Dit is de titel van aside:</h3>
			<p>The background-image property sets one or more background images for an element. The <a href="#">background of an element</a>	 is the total size of the element, including padding and border (but not the margin).
			By default, a background-image is placed at the top-left corner of an element, and repeated both vertically and horizontally.
			Tip: Always set a background-color to be used if the image is unavailable.</p>
			<p>The background-image property sets one or more background images for an element. The <a href="#">background of an element</a>	 is the total size of the element, including padding and border (but not the margin).
			By default, a background-image is placed at the top-left corner of an element, and repeated both vertically and horizontally.
			Tip: Always set a background-color to be used if the image is unavailable.</p>
	</article>
	<article>
		<h3>Dit is de titel van aside:</h3>
			<p>The background-image property sets one or more background images for an element. The <a href="#">background of an element</a>	 is the total size of the element, including padding and border (but not the margin).
			By default, a background-image is placed at the top-left corner of an element, and repeated both vertically and horizontally.
			Tip: Always set a background-color to be used if the image is unavailable.</p>
	</article>		
</aside>

<footer>
	<p>LONT design</p>
</footer>
<script src="js/script.js"></script>
</body>
</html>