<?php
class XlsController extends AppController{
  public $components = array('Paginator');
  //pendeklarasian penggunaan helper
  public $helpers = array('Xls', 'MyTools');

  public $uses = array('Xls');

  public $paginate = array(
        'limit' => 25,
        'order' => array(
            'Xls.nama' => 'asc'
        )
  );

  public function index() {
    $this->loadModel('Xls');

    $datas = $this->Xls->find('all');
    $this->set('datas', $datas);

    if ($this->request->is('post') || $this->request->is('put')) {
      $required = array('file');
      
      $error = false;
      foreach($required as $field) {
        if (empty($this->request->data['Document']['submittedfile']['name'])) {
          $error = true;
        }
      }
      if ($error) {
        $this->Session->setFlash("Masukkan File","error");
      } else {
        $file = $this->request->data['Document']['submittedfile'];
        move_uploaded_file($this->data['Document']['submittedfile']['tmp_name'], TMP. DS . "uploads" . DS ."data.csv");
        $this->redirect(array('controller' => 'Xls', 'action' => 'import'));
      }
    }

    $this->Xls->recursive=0;
    $this->Paginator->settings  = array('limit' => 5);
    $this->set('datas',$this->Paginator->paginate('Xls'));
  }
  
  public function xls() {        
    $this->loadModel('Xls');
    $this->loadModel('Job');
    $this->loadModel('Wilayah');
    $this->loadModel('Minatgereja');
    $this->loadModel('Minatumum');
    $this->loadModel('Kodepos_sekarang');
    $this->loadModel('Kodepos_domisili');
    
    $datas = $this->Xls->find('all');
    $this->set('datas', $datas);

    $job = $this->Job->find('all');
    $this->set('job', $job);

    $wilayah = $this->Wilayah->find('all');
    $this->set('wilayah', $wilayah);

    $kodepos_sekarang = $this->Kodepos_sekarang->find('list', array('fields'=>array('id', 'kodepos')));
    $this->set('kodepos_sekarang', $kodepos_sekarang);

    $kodepos_domisili = $this->Kodepos_domisili->find('list', array('fields'=>array('id', 'kodepos')));
    $this->set('kodepos_domisili', $kodepos_domisili);

    $minatgereja = $this->Xls->Minatgereja->find('all');
    $this->set('minatgereja', $minatgereja);

    $minatumum = $this->Xls->Minatumum->find('all');
    $this->set('minatumum', $minatumum);
  }

  public function import(){
    if ($this->request->is('post')) {
      $datassss=unserialize($this->request->data['Import']['data']);

      foreach ($datassss as $key => $value) {
        $conditions = array(
          'Xls.no_induk' => $value['no_induk']
        );
        if ($this->Xls->hasAny($conditions)){
          $this->Xls->updateAll(
            array(
              'Xls.nama'=>"'".$value['nama']."'",
              'Xls.no_induk'=>"'".$value['no_induk']."'",
              'Xls.jenis_kelamin'=>"'".$value['jenis_kelamin']."'",
              'Xls.hubungan_keluarga'=>"'".$value['hubungan_keluarga']."'",
              'Xls.tempat_lahir'=>"'".$value['tempat_lahir']."'",
              'Xls.tanggal_lahir'=>"'".$value['tanggal_lahir']."'",
              'Xls.goldar'=>"'".$value['goldar']."'",
              'Xls.pendidikan_terakhir'=>"'".$value['pendidikan_terakhir']."'",
              'Xls.job_id'=>"'".$value['job_id']."'",
              'Xls.status_pernikahan'=>"'".$value['status_pernikahan']."'",
              'Xls.nama_ayah'=>"'".$value['nama_ayah']."'",
              'Xls.nama_ibu'=>"'".$value['nama_ibu']."'",
              'Xls.alamat_domisili'=>"'".$value['alamat_domisili']."'",
              'Xls.alamat_sekarang'=>"'".$value['alamat_sekarang']."'",
              'Xls.no_telepon'=>"'".$value['no_telepon']."'",
              'Xls.status_tmpt_tggl'=>"'".$value['status_tmpt_tggl']."'",
              'Xls.penghasilan'=>"'".$value['penghasilan']."'",
              'Xls.status_warga_grj'=>"'".$value['status_warga_grj']."'",
              'Xls.tpt_kebaktian'=>"'".$value['tpt_kebaktian']."'",
              'Xls.tata_cara_pernikahan'=>"'".$value['tata_cara_pernikahan']."'",
              'Xls.jml_ank'=>"'".$value['jml_ank']."'",
              'Xls.tpt_baptis'=>"'".$value['tpt_baptis']."'",
              'Xls.tgl_baptis'=>"'".$value['tgl_baptis']."'",
              'Xls.tgl_sidhi'=>"'".$value['tgl_sidhi']."'",
              'Xls.peran_grj'=>"'".$value['peran_grj']."'",
              'Xls.lama_jabatan_majelis'=>"'".$value['lama_jabatan_majelis']."'",
              'Xls.lama_jabatan_pengurus'=>"'".$value['lama_jabatan_pengurus']."'",
              'Xls.kepanitiaan'=>"'".$value['kepanitiaan']."'",
              'Xls.gangguan_kesehatan'=>"'".$value['gangguan_kesehatan']."'",
              'Xls.wilayah_id'=>"'".$value['wilayah_id']."'",
              'Xls.kepala_id'=>"'".$value['kepala_id']."'",
              'Xls.kodepos_domisili'=>"'".$value['kodepos_domisili']."'",
              'Xls.kodepos_sekarang'=>"'".$value['kodepos_sekarang']."'",
              'Xls.minatumum_id'=>"'".$value['minatumum_id']."'",
              'Xls.minatgereja_id'=>"'".$value['minatgereja_id']."'",
              ),
            array('no_induk'=>$value['no_induk']));
        }else{
          $this->Xls->create();
          $ip=array('Xls'=>$value);
          $this->Xls->save($ip);
        }
        $this->Session->setFlash("Data Berhasil Disimpan","success");
        $this->redirect(array('controller' => 'Xls', 'action' => 'index'));
      }
    }
  }
  public function impdata(){
    if ($this->request->is('post')) {
      var_dump($this->request->data);
      $datassss=unserialize($this->request->data['Import']['data']);
      foreach ($datassss as $key => $value) {
        $this->Xls->create();
        $ip=array('Xls'=>$value);
        var_dump($ip);
        echo "<br/>";
        $this->Xls->save($ip);
      }
    }
  }
}
?>