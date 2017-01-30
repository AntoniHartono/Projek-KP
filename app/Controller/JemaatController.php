<?php

class JemaatController extends AppController{
	public $components = array('Paginator','Session', 'Cookie', 'Flash', 'ImageCropResize.Image');


	public function index(){
		$conditions = array();


		if (!empty($this->params['url']['q']))
		{
			$conditions['or']['Jemaat.no_induk like'] = '%' . $this->params['url']['q'] . '%';
			$conditions['or']['Jemaat.nama like'] = '%' . $this->params['url']['q'] . '%';
			$conditions['or']['Jemaat.no_induk like'] = '%' . $this->params['url']['q'] . '%';
			$conditions['or']['Jemaat.jenis_kelamin like'] = '%' . $this->params['url']['q'] . '%';
			$conditions['or']['Jemaat.hubungan_keluarga like'] = '%' . $this->params['url']['q'] . '%';
			$conditions['or']['Jemaat.tempat_lahir like'] = '%' . $this->params['url']['q'] . '%';
					}
			$this->loadModel('Jemaat');
			$this->loadModel('Kodepos');
			$this->Jemaat->recursive=0;
			$this->Paginator->settings  = array('limit' => 4, 'conditions' => $conditions, 'order'=>array('Jemaat.id'=>'asc'));
			$this->set('jemaats',$this->Paginator->paginate('Jemaat'));
			$kodepos = $this->Kodepos->find('list', array('fields'=>array('id', 'kodepos')));
		    $this->set('kodepos', $kodepos);
	}
	public function tambah(){
			$this->loadModel('Jemaat');
	        $this->loadModel('Job');
	        $this->loadModel('Kodepos');
	        $this->loadModel('Minatumum');
	        $this->loadModel('Minatgereja');
	        $this->set('pendidikan', $this->Jemaat->pendidikan());
	        $this->set('jenskel', $this->Jemaat->jenskel());
	        $this->set('goldar', $this->Jemaat->goldar());
	        $this->set('penghasilan', $this->Jemaat->penghasilan());
	        $this->set('statustempat', $this->Jemaat->statustempat());
	        $this->set('hubkel', $this->Jemaat->hubkel());
	        $this->set('stpernikahan', $this->Jemaat->stpernikahan());
	        $this->set('ttcara', $this->Jemaat->ttcara());
	        $this->set('stwarga', $this->Jemaat->ttcara());
	        $this->set('tptkbkt', $this->Jemaat->tptkbkt());
	        $this->set('prngrj', $this->Jemaat->prngrj());
	         $this->set('kepanitiaan', $this->Jemaat->kepanitiaan());
			$kepala = $this->Jemaat->find('list', array(
				'conditions'=>array('hubungan_keluarga'=>'Kepala Keluarga'),
				'fields'=>array('id', 'no_induk')));
	  		 $this->set('kepala', $kepala); 	      
	        $jobs = $this->Job->find('list', array('fields'=>array('id', 'nama')));
	        $this->set('jobs', $jobs);

			if($this->request->is('post')){
				try {
					$this->Jemaat->create();
					$this->Jemaat->save($this->request->data);				
					return $this->redirect(array('action'=>'index'));
				} catch (PDOException $e) {
								
				}
			}
			$mntgrj= $this->Minatgereja->find('list',array('fields'=>array('id', 'nama')));
        	$this->set('mntgrj',$mntgrj);
        	$mntumm = $this->Minatumum->find('list', array('fields'=>array('id', 'nama')));
	        $this->set('mntumm', $mntumm);

		}

		
	public function ubah($id=null){
			$this->loadModel('Jemaat');
	        $this->loadModel('Job');
	        $this->loadModel('Kodepos');
	        $this->loadModel('Minatumum');
	        $this->loadModel('Minatgereja');
	        $this->set('pendidikan', $this->Jemaat->pendidikan());
	        $this->set('jenskel', $this->Jemaat->jenskel());
	        $this->set('goldar', $this->Jemaat->goldar());
	        $this->set('penghasilan', $this->Jemaat->penghasilan());
	        $this->set('statustempat', $this->Jemaat->statustempat());
	        $this->set('hubkel', $this->Jemaat->hubkel());
	        $this->set('stpernikahan', $this->Jemaat->stpernikahan());
	        $this->set('ttcara', $this->Jemaat->ttcara());
	        $this->set('stwarga', $this->Jemaat->ttcara());
	        $this->set('tptkbkt', $this->Jemaat->tptkbkt());
	        $this->set('prngrj', $this->Jemaat->prngrj());
	         $this->set('kepanitiaan', $this->Jemaat->kepanitiaan());
	        $jobs = $this->Job->find('list', array('fields'=>array('id', 'nama')));
	        $this->set('jobs', $jobs);
	        $kodepos = $this->Kodepos->find('list', array('fields'=>array('id', 'kodepos')));
	        $this->set('kodepos', $kodepos);
	        $kepala = $this->Jemaat->find('list', array(
	        			'conditions'=>array('hubungan_keluarga'=>'Kepala Keluarga'),
	        			'fields'=>array('id', 'no_induk')));
	        $this->set('kepala', $kepala);

	        $mntumm = $this->Minatumum->find('list', array('fields'=>array('id', 'nama')));
	        $this->set('mntumm', $mntumm);
			if($id){
				if(!empty($this->request->data)){
					try {
						$this->Jemaat->save($this->request->data);
					} catch (PDOException $e) {
						
					}
					$this->redirect(array('action'=>'index'));
				} else{
					$this->request->data= $this->Jemaat->read(null, $id);
				}
			} 	else{
					$this->redirect(array('action'=>'index'));
			}
			$mntgrj= $this->Minatgereja->find('list',array('fields'=>array('id', 'nama')));
        	$this->set('mntgrj',$mntgrj);

		}	

	public function hapus($id=null){
			$this->request->onlyAllow('post');
			try {
				$this->Jemaat->delete($id);
			} catch (PDOException $e) {
				
			}
			$this->redirect(array('action'=>'index'));
	}

	public function getdata(){
		$this->loadModel('Kodepos');
      	$this->autoRender = false;
      	$t=$_GET['term'];
  		$results = $this->Kodepos->find('all',
             array(
                'conditions'=> array( 'OR' => array(
                								'Kodepos.kelurahan LIKE' =>'%'.$t.'%',
                								'Kodepos.kecamatan LIKE' =>'%'.$t.'%',
                								'Kodepos.kabupaten LIKE' =>'%'.$t.'%',
                								'Kodepos.provinsi LIKE' =>'%'.$t.'%',
                								'Kodepos.kodepos LIKE' =>'%'.$t.'%'
                					)),
               
            ));
            $response = array();
        	$i = 0;
        	foreach($results as $result){
	            $response[$i]['id'] = $result['Kodepos']['id'];
	            $response[$i]['value'] = $result['Kodepos']['kodepos'];
	            $response[$i]['label'] = "KELURAHAN ".$result['Kodepos']['kelurahan'].",   KECAMATAN ".$result['Kodepos']['kecamatan'].",   KABUPATEN ".$result['Kodepos']['kabupaten'].",   PROVINSI ".$result['Kodepos']['provinsi'];
	            $i++;
        	}
        	echo json_encode($response);  
        	
    }

    public function getkepalakeluarga(){
		$this->loadModel('Jemaat');
      	$this->autoRender = false;
      	$t=$_GET['term'];
        $results = $this->Jemaat->find('all', 
        	 array(
        		'conditions'=> array( 'AND' => array(
                								'hubungan_keluarga'=>'Kepala Keluarga',
                								'Jemaat.no_induk LIKE' =>'%'.$t.'%'
                					)),     
            ));

            $response = array();
        	$i = 0;
        	foreach($results as $result){
	            $response[$i]['id'] = $result['Jemaat']['id'];
	            $response[$i]['value'] = $result['Jemaat']['no_induk'];
	            $response[$i]['label'] = "Nomor Induk: ".$result['Jemaat']['no_induk'].", Kepala Keluarga: ".$result['Jemaat']['nama'];
	            $i++;
        	}
        	echo json_encode($response);  
        	
    }

}
 
?>