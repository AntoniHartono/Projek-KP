<?php
$this->assign('title', 'Export to Excel');
?>


<h3><i class="fa fa-angle-right"></i> <i class="fa fa-user"></i> Import and Export Excel</h3>

<h5 class="text-muted">Import From Excel</h5>

<?php echo $this->Form->create('Document', array('enctype' => 'multipart/form-data'));?>
  
<fieldset>
  <?php
    echo $this->Form->file('Document.submittedfile');
  ?>
</fieldset>
<div class="btnimport">
    <button class="btn btn-success">
        <span class = "glyphicon glyphicon-cloud-upload"></span>
        Import
    </button>
</div>
<?php
  echo $this->Form->end();
?>

<hr/>

<h5 class="text-muted">Export To Excel</h5>
<button class="btn btn-success" type="button" id="btnexport">
  <span class = "glyphicon glyphicon-cloud-download"></span>
  Export
</button>


<hr/>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>No Induk</th>
      <th>Nama</th>
      <th>Jenis Kelamin</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($datas as $data) { ?>
    <tr>
      <td><?php echo $data['Xls']['no_induk'] ?></td>
      <td><?php echo $data['Xls']['nama'] ?></td>
      <td><?php echo $data['Xls']['jenis_kelamin'] ?></td>
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

<hr/>

