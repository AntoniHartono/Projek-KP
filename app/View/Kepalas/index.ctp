<?php
$this->assign('title', 'Daftar Kepala Keluarga');
?>
<h3>Daftar Kepala Keluarga</h3>
<table class="table">
  <thead>
    <tr>
      <th>No Induk</th>
      <th>Nama</th>
    </tr>
  </thead>
    <tbody>
    <?php 
    foreach ($datas as $data) {
      # code...
     ?>
    <tr>
      <td><?php echo $data['Kepalas']['no_induk']; ?></td>
      <td><?php echo $data['Kepalas']['nama']; ?></td>
      <td><?php echo $this->Html->link('Kartu Keluarga',array('controller'=>'kepalas','action' => 'show', $data['Kepalas']['id'])); ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<div class="pagination pagination-large">
    <ul class="pagination">
            <?php
                echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                echo $this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
            ?>
        </ul>
    </div>