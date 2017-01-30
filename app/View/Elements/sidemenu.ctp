<?php
$overview = '';
$jemaat = '';
$laporan = '';
$user = '';
$setup = '';
$excel = '';
$daftarkepala = '';

if ($ctl === 'jemaats') {
  $jemaat = 'class="active"';
} else if ($ctl === 'laporans') {
  $laporan = 'class="active"';
} else if ($ctl === 'users') {
  $user = 'class="active"';
} else if ($ctl === 'setup') {
  $setup = 'class="active"';
} else if($ctl === 'kepalas'){
  $daftarkepala = 'class = "active"';}
else {
  $overview = 'class="active"';
}
?>
<div class="col-sm-3 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">
<ul class="nav nav-sidebar">
  <li <?php echo $overview; ?>><a href="#">Overview</a></li>
  <li <?php echo $jemaat; ?>>
      <?php echo $this->Html->link('Data Jemaat',
                        array('controller'=>'jemaat')); ?>
  </li>
  <li <?php echo $setup; ?>>
      <?php echo $this->Html->link('Setup Sistem',
                      array('controller'=>'setup')); ?>
  </li>
  <li <?php echo $excel; ?>>
      <?php echo $this->Html->link('Export Import to Excel',
                      array('controller'=>'xls')); ?>
  </li>
  <li <?php echo $daftarkepala; ?>>
      <?php echo $this->Html->link('Daftar Kepala Keluarga',
                      array('controller'=>'kepalas','action'=>'index')); ?>
  </li>
  <li <?php echo $laporan; ?>>
      <?php echo $this->Html->link('Laporan',
                      array('controller'=>'laporans','action'=>'index')); ?>
  </li>
</ul>
<?php if ($urole === 'admin') { ?>
<ul class="nav nav-sidebar">
  <li <?php echo $user; ?>><?php echo $this->Html->link('Akun Pengguna', array('controller'=>'users')); ?></li>
</ul>
<?php } ?>
</div><!--/span-->
