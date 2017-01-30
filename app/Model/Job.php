<?php 
	class Job extends AppModel{
		public $name = 'Job';
	    public $hasMany = array(
	        'Jemaat' => array(
	            'className' => 'Jemaat',
	            'foreignKey' => 'job_id'
	        ),
	    );
	}

 ?>