<?php
$this->assign('title', 'KARTU KELUARGA');
?>
<h3>KARTU KELUARGA</h3>
<table class="table">
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
    <tbody>
    <?php 
    foreach ($datas as $data) {
      # code...
     ?>
    <tr>
      <td><?php echo $data['Kepalas']['nama']; ?></td>
      <td><?php echo $data['Kepalas']['no_induk']; ?></td>
      <td><?php echo $data['Kepalas']['jenis_kelamin']; ?></td>
      <td><?php echo $data['Kepalas']['hubungan_keluarga']; ?></td>
      <td><?php echo $data['Kepalas']['tempat_lahir']; ?></td>
      <td><?php echo date('d-m-Y', strtotime($data['Kepalas']['tanggal_lahir'])); ?></td>
      <td><?php echo $data['Kepalas']['goldar']; ?></td>
      <td><?php echo $data['Kepalas']['pendidikan_terakhir']; ?></td>
      <td><?php echo $data['Job']['nama']; ?></td>
      <td><?php echo $data['Kepalas']['tpt_baptis']; ?></td>
      <td><?php echo date('d-m-Y', strtotime($data['Kepalas']['tgl_baptis'])); ?></td>
      <td><?php echo $data['Kepalas']['tpt_sidhi']; ?></td>
      <td><?php echo date('d-m-Y', strtotime($data['Kepalas']['tgl_sidhi'])); ?></td>
      <td><?php echo $data['Kepalas']['tata_cara_pernikahan']; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<?php echo $this->Html->link('Convert PDF',array('controller'=>'kepalas','action' => 'view_pdf', $data['Kepalas']['kepala_id'])); ?>
<!-- <button class="btn btn-default btn-default" type="button" id="convert"><span class="fa fa-print"></span> <?php //echo $this->Html->link('Convert PDF',array('controller'=>'kepalas','action' => 'view_pdf', $data['Kepalas']['kepala_id'])); ?></button> -->