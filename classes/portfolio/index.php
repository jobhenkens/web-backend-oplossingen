<?php

	function __autoload($class_name) {
	    include_once ( 'classes/' . $class_name . '.php' );
	}

	$instantieHTMLB = new HTMLBuilder('header', 'body', 'footer');

?>