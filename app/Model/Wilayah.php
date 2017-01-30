<?php
	class Wilayah extends AppModel {
	  public $useTable = 'wilayah';
	  
	  public $hasMany = array(
	        'Jemaats' => array(
	            'className' => 'Jemaats',
	            'foreignKey' => 'wilayah_id'
	        ),
	    );
	}
?>