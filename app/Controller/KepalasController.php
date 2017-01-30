<?php
App::uses('AppController', 'Controller');
App::uses('CakePdf', 'CakePdf.Pdf');

class KepalasController extends AppController {
  public $uses = array('Kepalas','Jobs');

  public $components = array('Paginator');

  public $paginate = array(
    'limit' => 25,
    'order' => array('Kepalas.nama' => 'asc')
  );

  public function beforeFilter() {
		parent::beforeFilter();
	}
  
  public function isAuthorized($user) {
  	return parent::isAuthorized($user);
  }

  public function index() {

    $this->loadModel('Kepalas');
    $this->Kepalas->recursive=0;
    $this->Paginator->settings = array('conditions' => array('hubungan_keluarga'=>'Kepala Keluarga'),'limit' => 10);
    $this -> set('datas',$this->Paginator->paginate('Kepalas'));
  }

  public function show($id) {
    $this->loadModel('Kepalas');
    $this->loadModel('Jobs');
    //$datas = $this->Kepalas->query("SELECT * FROM jemaats a, jobs b
        //WHERE 'a.id' = 'a.kepala_id' AND 'a.job_id' = 'b.id' AND 'a.kepala_id' = $id OR 'a.id' = $id;");
    $datas = $this->Kepalas->find('all', array('conditions'=>array('OR' => array(array('Kepalas.id'=>$id),array('Kepalas.kepala_id' => $id)))));
    //debug($datas);
    $this->set('datas', $datas);
  }

  public function view_pdf($id) {
    if (!$id) {
      $this->Session->setFlash('Sorry, there was no PDF selected.');
      $this->redirect(array('action'=>'index'), null, true);
    }
    else{
      $this->loadModel('Kepalas');
      $this->loadModel('Jobs');
      $datas = $this->Kepalas->find('all', array('conditions'=>array('OR' => array(array('Kepalas.id'=>$id),array('Kepalas.kepala_id' => $id)))));
      //$this->set('datas', $datas);
      $jobs = $this->Jobs->find('all');
      //$this->set('jobs', $jobs);
      $this->set(compact('jobs', 'datas'));
      //debug($jobs);
      $this->layout = '/pdf/default'; //this will use the pdf.ctp layout
      $this->render('/Pdf/my_pdf_view');
    }
  }

  public function download_pdf() {
 
    $this->viewClass = 'Media';
 
    $params = array(
 
        'id' => 'test.pdf',
        'name' => 'your_test',
        'download' => true,
        'extension' => 'pdf',
        'path' => 'Downloads'
    );
    $this->set($params);
  }
}
