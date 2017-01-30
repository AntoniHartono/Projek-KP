<?php
  class Search extends AppModel {

    public $useTable = 'jemaats';


    public $belongsTo = array(
    	'Job' => array(
    		'className' => 'Job',
    		'foreignKey' => 'job_id'
    	),
    	
    	'Wilayah' => array(
    		'className' => 'Wilayah',
    		'foreignKey' => 'wilayah_id'
    	),

      'Kodepos_domisili' => array(
          'className' => 'Kodepos_domisili',
          'foreignKey' => 'kodepos_domisili'
      ), 

      'Kodepos_sekarang' => array(
          'className' => 'Kodepos_sekarang',
          'foreignKey' => 'kodepos_sekarang'
      )
    );

    public $hasAndBelongsToMany = array(
      'Minatgereja' => array(
        'className' => 'Minatgereja',
        'joinTable'=>'jemaats_minatgereja',
        'foreignKey' => 'idjemaat',
        'associationForeignKey'=> 'idminatgereja'
      ),

      'Minatumum' => array(
        'className' => 'Minatumum',
        'joinTable'=>'jemaats_minatumum',
        'foreignKey' => 'idjemaat',
        'associationForeignKey'=> 'idminatumum'
      )
    );
  	
  }

?>