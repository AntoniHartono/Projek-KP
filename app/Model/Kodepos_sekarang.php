<?php 
	class Kodepos_sekarang extends AppModel{
		public $useTable = 'kodepos';

	    public $hasMany = array(
	        'Jemaat' => array(
	            'className' => 'Jemaat',
	            'foreignKey' => 'kodepos_sekarang'
	        )
	    );
	}

 ?>