<?php
  /**
   * Export all member records in .xls format
   * with the help of the xlsHelper
   */
 
  //pendeklarasian xls helper
  $xls= new xlsHelper();
 
  //pemberian nama file untuk excel saat di export
  $xls->setHeader('Data Jemaat');
 
  $xls->addXmlHeader();
  $xls->setWorkSheetName('Xls');

  $xls->openRow();
  //membuat judul pada excel pada baris pertama
  $xls->writeString('Data Jemaat GKJ Sawokembar Gondokusuman');
  $xls->closeRow();

  $xls->openRow();
  $xls->closeRow();

  //memberi nama pertama kali untuk kolom
  $xls->openRow();
    $xls->writeString('Nama');
    $xls->writeString('No Induk');
    $xls->writeString('Jenis Kelamin');
    $xls->writeString('Hubungan Keluarga');
    $xls->writeString('Tempat Lahir');
    $xls->writeString('Tanggal Lahir');
    $xls->writeString('Golongan Darah');
    $xls->writeString('Pendidikan Terakhir');
    $xls->writeString('Pekerjaan');
    $xls->writeString('Status Penikahan');
    $xls->writeString('Nama Ayah');
    $xls->writeString('Nama Ibu');
    $xls->writeString('Alamat Domisili');
    $xls->writeString('Alamat Sekarang');
    $xls->writeString('Nomor Telepon');
    $xls->writeString('Status Tempat Tinggal');
    $xls->writeString('Penghasilan');
    $xls->writeString('Status Warga Gereja');
    $xls->writeString('Tempat Kebaktian');
    $xls->writeString('Tata Cara Pernikahan');
    $xls->writeString('Jumlah Anak');
    $xls->writeString('Tempat Baptis');
    $xls->writeString('Tanggal Baptis');
    $xls->writeString('Tempat Sidhi');
    $xls->writeString('Tanggal Sidhi');
    $xls->writeString('Peran Gereja');
    $xls->writeString('Lama Jabatan Majelis');
    $xls->writeString('Lama Jabatan Pengurus');
    $xls->writeString('Kepanitiaan');
    $xls->writeString('Gangguan Kesehatan');
    $xls->writeString('Wilayah');
    $xls->writeString('Kode Pos Domisili');
    $xls->writeString('Kode Pos Sekarang');
    $xls->writeString('Minat Umum');
    $xls->writeString('Minat Gereja');
  $xls->closeRow();
   
  //menampilkan data jemaat yang ada
  foreach ($datas as $data):
    $xls->openRow();
      $xls->writeString($data['Xls']['nama']);
      $xls->writeString($data['Xls']['no_induk']);
      $xls->writeString($data['Xls']['jenis_kelamin']);
      $xls->writeString($data['Xls']['hubungan_keluarga']);
      $xls->writeString($data['Xls']['tempat_lahir']);
      $xls->writeString(date('d-m-Y', strtotime($data['Xls']['tanggal_lahir']))); // agar tanggal berformat tanggal-bulan-tahun
      $xls->writeString($data['Xls']['goldar']);
      $xls->writeString($data['Xls']['pendidikan_terakhir']);
      $xls->writeString($data['Job']['nama']); 
      $xls->writeString($data['Xls']['status_pernikahan']);
      $xls->writeString($data['Xls']['nama_ayah']);
      $xls->writeString($data['Xls']['nama_ibu']);
      $xls->writeString($data['Xls']['alamat_domisili']);
      $xls->writeString($data['Xls']['alamat_sekarang']);
      $xls->writeString($data['Xls']['no_telepon']);
      $xls->writeString($data['Xls']['status_tmpt_tggl']);
      $xls->writeString($data['Xls']['penghasilan']);
      $xls->writeString($data['Xls']['status_warga_grj']);
      $xls->writeString($data['Xls']['tpt_kebaktian']);
      $xls->writeString($data['Xls']['tata_cara_pernikahan']);
      $xls->writeString($data['Xls']['jml_ank']);
      $xls->writeString($data['Xls']['tpt_baptis']);
      $xls->writeString(date('d-m-Y', strtotime($data['Xls']['tgl_baptis'])));
      $xls->writeString($data['Xls']['tpt_sidhi']);
      $xls->writeString(date('d-m-Y', strtotime($data['Xls']['tgl_sidhi'])));
      $xls->writeString($data['Xls']['peran_grj']);
      $xls->writeString($data['Xls']['lama_jabatan_majelis']);
      $xls->writeString($data['Xls']['lama_jabatan_pengurus']);
      $xls->writeString($data['Xls']['kepanitiaan']);
      $xls->writeString($data['Xls']['gangguan_kesehatan']);
      $xls->writeString($data['Wilayah']['nama']);
      $xls->writeString($data['Kodepos_domisili']['kodepos']);
      $xls->writeString($data['Kodepos_sekarang']['kodepos']);
      
      //untuk menampilkan minat umum apa saja yang dimiliki oleh jemaat (many to many)
      $strau = "";
      foreach($data['Minatumum'] as $row){
        $strau = $strau.$row['nama'].'; '; //agar data dapat gabung di satu kolom saja
      }
      $xls->writeString($strau);

      //untuk menampilkan minat gereja apa saja yang dimiliki oleh jemaat (many to many)
      $strau = "";
      foreach($data['Minatgereja'] as $row){
        $strau = $strau.$row['nama'].'; ';
      }
      $xls->writeString($strau);

    $xls->closeRow();
  endforeach;
  
  $xls->addXmlFooter();
  exit();
?>