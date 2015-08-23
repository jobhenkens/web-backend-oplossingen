<?php 

	class Percent

	{

		public $absolute = '';
		public $relative = '';
		public $hundred = '';
		public $nominal = '';

		public function formatNumber($number){

			return number_format($number, 2, '.', ' ');

		}

		public function __construct($new, $unit){

			$this->absolute = $this->formatNumber($new/$unit);

			$this->relative = $this->formatNumber($this->absolute - 1);

			$this->hundred = $this->formatNumber($this->absolute * 100);

			if ($this->absolute > 1) {
				
				$this->nominal = 'positive';
			
			} elseif ($this->absolute === 0) {

				$this->nominal = 'status-quo';

				} else {

					$this->nominal = 'negative';

				}
		}
	}
?>