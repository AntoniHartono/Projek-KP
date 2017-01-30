<?php

class Minatgereja extends AppModel {
	public $useTable = 'minatgereja';
	public $name = 'Minatgereja';
 	
	public $hasAndBelongsToMany = array(
        'Jemaat' => array(
            'className' => 'Jemaat',
            'joinTable'=>'jemaats_minatgereja',
            'foreignKey' => 'idminatgereja',
            'associationForeignKey'=> 'idjemaat'
        )
    );

}
?>