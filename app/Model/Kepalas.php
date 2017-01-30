<?php
class Kepalas extends AppModel {
  public $useTable = 'jemaats';

  public $belongsTo = array(
        'Job' => array(
            'className' => 'Job',
            'foreignKey' => 'job_id'
        ));
}