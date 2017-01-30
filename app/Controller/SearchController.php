<?php
class SearchController extends AppController{
	
  public $helpers = array('Xls', 'MyTools');
  public $conditi = array();
  
	public function index(){
			

		$conditions = array();


			
		

			for ($i=0; $i < 50  ; $i++) { 
			if(!empty($this->params['url']['mytext'][$i]) ){

				if($this->params['url']['andor'][$i] == 'or')
				{

						

					if ($this->params['url']['kategori'][$i] == 'nama')
					$conditions['or']['Search.nama like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'tempat_lahir')
					$conditions['or']['Search.tempat_lahir like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'alamat_sekarang')
					$conditions['or']['Search.alamat_sekarang like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'alamat_domisili')
					$conditions['or']['Search.alamat_domisili like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'pendidikan_terakhir')
					$conditions['or']['Search.pendidikan_terakhir like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'goldar')
					$conditions['or']['Search.goldar like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'nama_ayah')
					$conditions['or']['Search.nama_ayah like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'nama_ibu')
					$conditions['or']['Search.nama_ibu like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'status_pernikahan')
					$conditions['or']['Search.status_pernikahan like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'hubungan_keluarga')
					$conditions['or']['Search.hubungan_keluarga like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'peran_grj')
					$conditions['or']['Search.peran_grj like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'ganguan_kesehatan')
					$conditions['or']['Search.ganguan_kesehatan like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'jenis_kelamin')
					$conditions['or']['Search.jenis_kelamin like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'no_telepon')
					$conditions['or']['Search.no_telepon like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif($this->params['url']['kategori'][$i] == 'pekerjaan'){
						
							$this->loadModel('Job');
	    	
	        				$results = $this->Job->find('all',
             					array(
                					'conditions'=> array( 'OR' => array(
                								'Job.nama LIKE' =>'%'.$this->params['url']['mytext'][$i].'%'
                					)),
               
            				));
            		$jobid='';
        			foreach($results as $result){
	            		$jobid = $result['Job']['id'];
	            
        			}
        
        	
	        				$conditions['or']['Search.job_id like'] = '%' . $jobid . '%';
					

					}
					elseif($this->params['url']['kategori'][$i] == 'wilayah'){
						
							$this->loadModel('Wilayah');
	    	
	        				$results = $this->Wilayah->find('all',
             					array(
                					'conditions'=> array( 'OR' => array(
                								'Wilayah.nama LIKE' =>'%'.$this->params['url']['mytext'][$i].'%'
                					)),
               
            				));
            		$wil='';
        			foreach($results as $result){
	            		$wil = $result['Wilayah']['id'];
	            
        			}
        
        	
	        				$conditions['or']['Search.wilayah_id like'] = '%' . $wil . '%';
					

					}
					elseif ($this->params['url']['kategori'][$i] == 'tgllahir')
					$conditions['or']['Search.tanggal_lahir like'] = '%' . $this->params['url']['mytext'][$i] . '%';
				
					elseif ($this->params['url']['kategori'][$i] == 'tglbaptis')
					$conditions['or']['Search.tgl_baptis like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					
					elseif ($this->params['url']['kategori'][$i] == 'jmlanak')
					$conditions['or']['Search.jml_ank like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					
					elseif ($this->params['url']['kategori'][$i] == 'status')
					$conditions['or']['Search.status_warga_grj like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					
					elseif ($this->params['url']['kategori'][$i] == 'noinduk')
					$conditions['or']['Search.no_induk like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					
					elseif ($this->params['url']['kategori'][$i] == 'tptkebaktian')
					$conditions['or']['Search.tpt_kebaktian like'] = '%' . $this->params['url']['mytext'][$i] . '%';
							
				}
				elseif($this->params['url']['andor'][$i] == 'and')
				{
					if($this->params['url']['kategori'][$i] == 'nama')
					$conditions['and']['Search.nama like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'tempat_lahir')
					$conditions['and']['Search.tempat_lahir like'] = '%' . $this->params['url']['mytext'][$i] . '%';	
					elseif ($this->params['url']['kategori'][$i] == 'alamat_sekarang')
					$conditions['and']['Search.alamat_sekarang like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'alamat_domisili')
					$conditions['and']['Search.alamat_domisili like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'pendidikan_terakhir')
					$conditions['and']['Search.pendidikan_terakhir like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'goldar')
					$conditions['and']['Search.goldar like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'nama_ayah')
					$conditions['and']['Search.nama_ayah like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'nama_ibu')
					$conditions['and']['Search.nama_ibu like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'status_pernikahan')
					$conditions['and']['Search.status_pernikahan like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'hubungan_keluarga')
					$conditions['and']['Search.hubungan_keluarga like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'peran_grj')
					$conditions['and']['Search.peran_grj like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'ganguan_kesehatan')
					$conditions['and']['Search.ganguan_kesehatan like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'jenis_kelamin')
					$conditions['and']['Search.jenis_kelamin like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'no_telepon')
					$conditions['and']['Search.no_telepon like'] = '%' . $this->params['url']['mytext'][$i] . '%';
						elseif($this->params['url']['kategori'][$i] == 'pekerjaan'){
						
							$this->loadModel('Job');
	    	
	        				$results = $this->Job->find('all',
             					array(
                					'conditions'=> array( 'OR' => array(
                								'Job.nama LIKE' =>'%'.$this->params['url']['mytext'][$i].'%'
                					)),
               
            				));
            		$jobid='';
        			foreach($results as $result){
	            		$jobid = $result['Job']['id'];
	            
        			}
        
        	
	        				$conditions['and']['Search.job_id like'] = '%' . $jobid . '%';
					

					}
					elseif($this->params['url']['kategori'][$i] == 'wilayah'){
						
							$this->loadModel('Wilayah');
	    	
	        				$results = $this->Wilayah->find('all',
             					array(
                					'conditions'=> array( 'OR' => array(
                								'Wilayah.nama LIKE' =>'%'.$this->params['url']['mytext'][$i].'%'
                					)),
               
            				));
            		$wil='';
        			foreach($results as $result){
	            		$wil = $result['Wilayah']['id'];
	            
        			}
        
        	
	        				$conditions['and']['Search.wilayah_id like'] = '%' . $wil . '%';
					

					}
					elseif ($this->params['url']['kategori'][$i] == 'tgllahir')
					$conditions['and']['Search.tanggal_lahir like'] = '%' . $this->params['url']['mytext'][$i] . '%';
				
					elseif ($this->params['url']['kategori'][$i] == 'tglbaptis')
					$conditions['and']['Search.tgl_baptis like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					
					elseif ($this->params['url']['kategori'][$i] == 'jmlanak')
					$conditions['and']['Search.jml_ank like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					
					elseif ($this->params['url']['kategori'][$i] == 'status')
					$conditions['and']['Search.status_warga_grj like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					
					elseif ($this->params['url']['kategori'][$i] == 'noinduk')
					$conditions['and']['Search.no_induk like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					
					elseif ($this->params['url']['kategori'][$i] == 'tptkebaktian')
					$conditions['and']['Search.tpt_kebaktian like'] = '%' . $this->params['url']['mytext'][$i] . '%';
				
				}

			}
		}

		$this->paginate = array(
				    'limit' => 6,
				    'conditions' => $conditions
		);
		$search = $this->paginate('Search');
		$this->set('search', $search);
		

	}

  public function xls() {        
    		$conditions = array();

for ($i=0; $i < 50  ; $i++) { 
			if(!empty($this->params['url']['mytext'][$i]) ){

				if($this->params['url']['andor'][$i] == 'or')
				{

						

					if ($this->params['url']['kategori'][$i] == 'nama')
					$conditions['or']['Xls.nama like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'tempat_lahir')
					$conditions['or']['Xls.tempat_lahir like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'alamat_sekarang')
					$conditions['or']['Xls.alamat_sekarang like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'alamat_domisili')
					$conditions['or']['Xls.alamat_domisili like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'pendidikan_terakhir')
					$conditions['or']['Xls.pendidikan_terakhir like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'goldar')
					$conditions['or']['Xls.goldar like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'nama_ayah')
					$conditions['or']['Xls.nama_ayah like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'nama_ibu')
					$conditions['or']['Xls.nama_ibu like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'status_pernikahan')
					$conditions['or']['Xls.status_pernikahan like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'hubungan_keluarga')
					$conditions['or']['Xls.hubungan_keluarga like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'peran_grj')
					$conditions['or']['Xls.peran_grj like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'ganguan_kesehatan')
					$conditions['or']['Xls.ganguan_kesehatan like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'jenis_kelamin')
					$conditions['or']['Xls.jenis_kelamin like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'no_telepon')
					$conditions['or']['Xls.no_telepon like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif($this->params['url']['kategori'][$i] == 'pekerjaan'){
						
							$this->loadModel('Job');
	    	
	        				$results = $this->Job->find('all',
             					array(
                					'conditions'=> array( 'OR' => array(
                								'Job.nama LIKE' =>'%'.$this->params['url']['mytext'][$i].'%'
                					)),
               
            				));
            		$jobid='';
        			foreach($results as $result){
	            		$jobid = $result['Job']['id'];
	            
        			}
        
        	
	        				$conditions['or']['Xls.job_id like'] = '%' . $jobid . '%';
					

					}
					elseif($this->params['url']['kategori'][$i] == 'wilayah'){
						
							$this->loadModel('Wilayah');
	    	
	        				$results = $this->Wilayah->find('all',
             					array(
                					'conditions'=> array( 'OR' => array(
                								'Wilayah.nama LIKE' =>'%'.$this->params['url']['mytext'][$i].'%'
                					)),
               
            				));
            		$wil='';
        			foreach($results as $result){
	            		$wil = $result['Wilayah']['id'];
	            
        			}
        
        	
	        				$conditions['or']['Xls.wilayah_id like'] = '%' . $wil . '%';
					

					}
					elseif ($this->params['url']['kategori'][$i] == 'tgllahir')
					$conditions['or']['Xls.tanggal_lahir like'] = '%' . $this->params['url']['mytext'][$i] . '%';
				
					elseif ($this->params['url']['kategori'][$i] == 'tglbaptis')
					$conditions['or']['Xls.tgl_baptis like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					
					elseif ($this->params['url']['kategori'][$i] == 'jmlanak')
					$conditions['or']['Xls.jml_ank like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					
					elseif ($this->params['url']['kategori'][$i] == 'status')
					$conditions['or']['Xls.status_warga_grj like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					
					elseif ($this->params['url']['kategori'][$i] == 'noinduk')
					$conditions['or']['Xls.no_induk like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					
					elseif ($this->params['url']['kategori'][$i] == 'tptkebaktian')
					$conditions['or']['Xls.tpt_kebaktian like'] = '%' . $this->params['url']['mytext'][$i] . '%';
							
				}
				elseif($this->params['url']['andor'][$i] == 'and')
				{
					if($this->params['url']['kategori'][$i] == 'nama')
					$conditions['and']['Xls.nama like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'tempat_lahir')
					$conditions['and']['Xls.tempat_lahir like'] = '%' . $this->params['url']['mytext'][$i] . '%';	
					elseif ($this->params['url']['kategori'][$i] == 'alamat_sekarang')
					$conditions['and']['Xls.alamat_sekarang like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'alamat_domisili')
					$conditions['and']['Xls.alamat_domisili like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'pendidikan_terakhir')
					$conditions['and']['Xls.pendidikan_terakhir like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'goldar')
					$conditions['and']['Xls.goldar like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'nama_ayah')
					$conditions['and']['Xls.nama_ayah like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'nama_ibu')
					$conditions['and']['Xls.nama_ibu like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'status_pernikahan')
					$conditions['and']['Xls.status_pernikahan like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'hubungan_keluarga')
					$conditions['and']['Xls.hubungan_keluarga like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'peran_grj')
					$conditions['and']['Xls.peran_grj like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'ganguan_kesehatan')
					$conditions['and']['Xls.ganguan_kesehatan like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'jenis_kelamin')
					$conditions['and']['Xls.jenis_kelamin like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					elseif ($this->params['url']['kategori'][$i] == 'no_telepon')
					$conditions['and']['Xls.no_telepon like'] = '%' . $this->params['url']['mytext'][$i] . '%';
						elseif($this->params['url']['kategori'][$i] == 'pekerjaan'){
						
							$this->loadModel('Job');
	    	
	        				$results = $this->Job->find('all',
             					array(
                					'conditions'=> array( 'OR' => array(
                								'Job.nama LIKE' =>'%'.$this->params['url']['mytext'][$i].'%'
                					)),
               
            				));
            		$jobid='';
        			foreach($results as $result){
	            		$jobid = $result['Job']['id'];
	            
        			}
        
        	
	        				$conditions['and']['Xls.job_id like'] = '%' . $jobid . '%';
					

					}
					elseif($this->params['url']['kategori'][$i] == 'wilayah'){
						
							$this->loadModel('Wilayah');
	    	
	        				$results = $this->Wilayah->find('all',
             					array(
                					'conditions'=> array( 'OR' => array(
                								'Wilayah.nama LIKE' =>'%'.$this->params['url']['mytext'][$i].'%'
                					)),
               
            				));
            		$wil='';
        			foreach($results as $result){
	            		$wil = $result['Wilayah']['id'];
	            
        			}
        
        	
	        				$conditions['and']['Xls.wilayah_id like'] = '%' . $wil . '%';
					

					}
					elseif ($this->params['url']['kategori'][$i] == 'tgllahir')
					$conditions['and']['Xls.tanggal_lahir like'] = '%' . $this->params['url']['mytext'][$i] . '%';
				
					elseif ($this->params['url']['kategori'][$i] == 'tglbaptis')
					$conditions['and']['Xls.tgl_baptis like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					
					elseif ($this->params['url']['kategori'][$i] == 'jmlanak')
					$conditions['and']['Xls.jml_ank like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					
					elseif ($this->params['url']['kategori'][$i] == 'status')
					$conditions['and']['Xls.status_warga_grj like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					
					elseif ($this->params['url']['kategori'][$i] == 'noinduk')
					$conditions['and']['Xls.no_induk like'] = '%' . $this->params['url']['mytext'][$i] . '%';
					
					elseif ($this->params['url']['kategori'][$i] == 'tptkebaktian')
					$conditions['and']['Xls.tpt_kebaktian like'] = '%' . $this->params['url']['mytext'][$i] . '%';
				
				}

			}
		}


	$this->loadModel('Xls');
    $search = $this->Xls->find('all',array('conditions'=>$conditions));
    $this->set('search', $search);

   
  }

	public function isAuthorized($user) {
		return parent::isAuthorized($user);
	}
}
?>