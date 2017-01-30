<?php
class LaporansController extends AppController {
    public $uses = array('Laporan','Job','Wilayah');

    public function beforeFilter() {
  		parent::beforeFilter();
  	}
    
  	public function isAuthorized($user) {
  		return parent::isAuthorized($user);
  	}

    public function index() {
      $datas = $this->Laporan->find('all');
      $this->set('datas', $datas);
      $jobs = $this->Job->find('all'); //select *
      $this->set('jobs', $jobs);
      $jumlahs = $this->Job->query("SELECT a.nama, b.jumlah FROM jobs a LEFT OUTER JOIN (SELECT j.nama AS nama, COUNT(je.job_id) as jumlah FROM jobs j, jemaats je WHERE j.id = je.job_id GROUP BY j.nama) b ON a.nama= b.nama ORDER BY a.id"); //select count
      $this->set('jumlahs', $jumlahs);
      $wilayah = $this->Wilayah->find('all'); //select *
      $this->set('wilayah', $wilayah);
      $jum = $this->Wilayah->query("SELECT a.nama, b.jumlah FROM wilayah a LEFT OUTER JOIN (SELECT j.nama AS nama, COUNT(je.wilayah_id) as jumlah FROM wilayah j, jemaats je WHERE j.id = je.wilayah_id GROUP BY j.nama) b ON a.nama= b.nama ORDER BY a.id"); //select count
      $this->set('jum', $jum);
      $juml = $this->Laporan->query("SELECT CASE WHEN umur < 6 THEN '... - 6' WHEN umur BETWEEN 7 and 15 THEN '7 - 15' WHEN umur BETWEEN 16 and 22 THEN '16 - 22' WHEN umur BETWEEN 23 and 50 THEN '23 - 50' WHEN umur >= 51 THEN '51 - ...' WHEN umur IS NULL THEN '(NULL)' END as range_umur, COUNT(*) AS jumlah FROM (select nama, TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS umur from jemaats) c GROUP BY range_umur ORDER BY range_umur");
      $this->set('juml', $juml);
    }

   public function laporan() {
      $datas = $this->Laporan->find('all');
      $this->set('datas', $datas);
    }

    public function laporanb() {
      $this->loadModel('Job');
      $this->loadModel('Laporan');
      $datas = $this->Laporan->find('all');
      $this->set('datas', $datas);
      $jobs = $this->Job->find('all'); //select *
      $this->set('jobs', $jobs);
      $jumlahs = $this->Job->query("SELECT a.nama, b.jumlah FROM jobs a LEFT OUTER JOIN (SELECT j.nama AS nama, COUNT(je.job_id) as jumlah FROM jobs j, jemaats je WHERE j.id = je.job_id GROUP BY j.nama) b ON a.nama= b.nama ORDER BY a.id"); //select count
      $this->set('jumlahs', $jumlahs);  
    }

    public function laporanc(){
      $this->loadModel('Wilayah');
      $this->loadModel('Laporan');
      $datas = $this->Laporan->find('all');
      $this->set('datas', $datas);
      $wilayah = $this->Wilayah->find('all'); //select *
      $this->set('wilayah', $wilayah);
      $jumlahs = $this->Wilayah->query("SELECT a.nama, b.jumlah FROM wilayah a LEFT OUTER JOIN (SELECT j.nama AS nama, COUNT(je.wilayah_id) as jumlah FROM wilayah j, jemaats je WHERE j.id = je.wilayah_id GROUP BY j.nama) b ON a.nama= b.nama ORDER BY a.id"); //select count
      $this->set('jumlahs', $jumlahs); 
    }

    public function laporand(){
      $this->loadModel('Laporan');
      $datas = $this->Laporan->find('all');
      $this->set('datas', $datas);
      $jumlahs = $this->Laporan->query("SELECT CASE WHEN umur < 6 THEN '... - 6' WHEN umur BETWEEN 7 and 15 THEN '7 - 15' WHEN umur BETWEEN 16 and 22 THEN '16 - 22' WHEN umur BETWEEN 23 and 50 THEN '23 - 50' WHEN umur >= 51 THEN '51 - ...' WHEN umur IS NULL THEN '(NULL)' END as range_umur, COUNT(*) AS jumlah FROM (select nama, TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS umur from jemaats) c GROUP BY range_umur ORDER BY range_umur");
      $this->set('jumlahs', $jumlahs);
      $umurs = $this->Laporan->query("SELECT * FROM (select nama, TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS umur from jemaats) N");
      $this->set('umurs', $umurs);
    }

}
 