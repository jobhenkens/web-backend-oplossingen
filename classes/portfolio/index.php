<?php

	function __autoload($class_name) {
	    include_once ( 'classes/' . $class_name . '.php' );
	}

	$instantieHTMLB = new HTMLBuilder('html/header-partial.php', 'html/body-partial.php', 'html/footer-partial.php');

?>