<?php
class Laporan extends AppModel {
  public $useTable = 'jemaats';
  public $belongsTo = array(
  		'Job' => array(
  			'className' => 'Job',
  			'foreignKey' => 'job_id',
  		),

  		'Wilayah' => array(
  			'className' => 'Wilayah',
  			'foreignKey' => 'wilayah_id',
  		)
  );
}
?>
