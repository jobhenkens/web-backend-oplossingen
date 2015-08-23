<?php

class HTMLBuilder {

	public function __construct($headerFile, $bodyFile, $footerFile){

		$this->buildHeader($headerFile);
		$this->buildBody($bodyFile);
		$this->buildFooter($footerFile);

	}

	public function buildHeader($headerFile){

		include_once $headerFile;
		/*'html/header-partial.php'*/


	}

	public function buildBody($bodyFile){

		include_once $bodyFile;
		/*'html/body-partial.php'*/

	} 

	public function buildFooter($footerFile){

		include_once $footerFile;
		/*'html/footer-partial.php'*/

	}

}

?>

