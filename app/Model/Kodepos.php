<?php 
	class Kodepos extends AppModel{
		public $useTable = 'kodepos';
		public $name = 'Kodepos';

	    public $hasMany = array(
	        'Jemaat' => array(
	            'className' => 'Jemaat',
	            'foreignKey' => 'kodepos_sekarang'
	        )
	    );

	  
	}

 ?>