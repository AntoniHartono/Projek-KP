<?php
 
App::import('Vendor', 'xtcpdf');

$pdf = new XTCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
 
$pdf->AddPage();
 
$html = '<br><br><br><br><br><br><br>
<table class="table" border="10px" alignment = "center">
  <thead>
    <tr>
      <th>Nama</th>
      <th>No Induk</th>
      <th>Jenis Kelamin</th>
      <th>Hubungan Keluarga</th>
      <th>Tempat Lahir</th>
      <th>Tanggal Lahir</th>
      <th>Golongan Darah</th>
      <th>Pendidikan Terakhir</th>
      <th>Profesi</th>
      <th>Tempat Baptis</th>
      <th>Tanggal Baptis</th>
      <th>Tempat Sidhi</th>
      <th>Tanggal Sidhi</th>
      <th>Tata Cara Pernikahan</th>
    </tr>
  </thead>
    <tbody>';

    foreach ($datas as $data) {
    	$html1 .='<tr>
      <td>'.$data['Kepalas']['nama'].'</td>
      <td>'.$data['Kepalas']['no_induk'].'</td>
      <td>'.$data['Kepalas']['jenis_kelamin'].'</td>
      <td>'.$data['Kepalas']['hubungan_keluarga'].'</td>
      <td>'.$data['Kepalas']['tempat_lahir'].'</td>
      <td>'.date('d-m-Y', strtotime($data['Kepalas']['tanggal_lahir'])).'</td>
      <td>'.$data['Kepalas']['goldar'].'</td>
      <td>'.$data['Kepalas']['pendidikan_terakhir'].'</td>
      <td>'.$data['Job']['nama'].'</td>
      <td>'.$data['Kepalas']['tpt_baptis'].'</td>
      <td>'.date('d-m-Y', strtotime($data['Kepalas']['tgl_baptis'])).'</td>
      <td>'.$data['Kepalas']['tpt_sidhi'].'</td>
      <td>'.date('d-m-Y', strtotime($data['Kepalas']['tgl_sidhi'])).'</td>
      <td>'.$data['Kepalas']['tata_cara_pernikahan'].'</td>
    </tr></tbody>';
    };

$html2 = $html.' '.$html1;
$pdf->writeHTML($html2, true, false, true, false, '');
 
$pdf->lastPage();
ob_end_clean();
$pdf->Output('KartuKeluarga.pdf','I'); 
//echo $pdf->Output('files/pdf'.DS.'test.pdf','F');
?>