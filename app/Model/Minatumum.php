<?php
	class Minatumum extends AppModel{
			public $useTable = 'minatumum';
			public $name = 'Minatumum';

			public $hasAndBelongsToMany = array(
		        'Jemaat' => array(
		            'className' => 'Jemaat',
		            'joinTable'=>'jemaats_minatumum',
		            'foreignKey' => 'idminatumum',
		            'associationForeignKey'=> 'idjemaat'
		        )
		    );
	}
?>