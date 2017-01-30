<?php 
	class Kodepos_domisili extends AppModel{
		public $useTable = 'kodepos';

	    public $hasMany = array(
	        'Jemaat' => array(
	            'className' => 'Jemaat',
	            'foreignKey' => 'kodepos_domisili'
	        )
	    );
	}

 ?>