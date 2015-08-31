<?php

class HTMLBuilder {

	public function __construct($headerFile, $bodyFile, $footerFile){

		$header = 'html/' . $headerFile . '-partial.php';
		$body = 'html/' . $bodyFile . '-partial.php';
		$footer = 'html/' . $footerFile . '-partial.php';

		$this->buildHeader($header);
		$this->buildBody($body);
		$this->buildFooter($footer);

	}

	public function buildHeader($headerFile){

		/*$cssFiles = 
		$cssHtmlLinks = 'test';
		include_once ($file); --- check klassikale oplossingen !!! */

		$jsDir	=	 dirname(dirname(__FILE__)) . '/css/';
		#var_dump($jsDir);
		$filesArray	=	$this->findFiles($jsDir, 'css');
			
		$cssLinks	=	$this->buildCssLinks($filesArray);


		include_once $headerFile;
		/*'html/header-partial.php'*/


	}

	/*private function buildCssLinks($file){


	}*/

	public function buildBody($bodyFile){

		include_once $bodyFile;
		/*'html/body-partial.php'*/

	} 

	public function buildFooter($footerFile){

		$jsDir	=	 dirname(dirname(__FILE__)) . '/js/';
		#var_dump($jsDir);
		$filesArray	=	$this->findFiles($jsDir, 'js');
			
		$jsScripts	=	$this->buildJsScripts($filesArray);

		include_once $footerFile;
		/*'html/footer-partial.php'*/

	}

	public function findFiles($dir, $file){

		return glob($dir . '/*' . $file);
	}

	private function buildJsScripts($filesArray){

		$dumpArray = array();

		foreach ($filesArray as $file) {

			$fileInfo = pathinfo($file);
			#var_dump($fileInfo);
			$fileName = $fileInfo['basename'];
				
			$dumpArray[] = '<script src="js/' . $fileName . '" ></script>';

		}
			return implode('', $dumpArray);

	}


	private function buildCssLinks($filesArray){

		$dumpArray = array();

		foreach ($filesArray as $file) {

			$fileInfo = pathinfo($file);
			#var_dump($fileInfo);
			$fileName = $fileInfo['basename'];
				
			$dumpArray[] = '<link rel="stylesheet" type="text/css" href="css/' . $fileName . '">';

		}
			return implode('', $dumpArray);

	}

}

?>

