<?php
  App::import("Vendor","parsecsv");
  $csv = new parseCSV();
  $filepath = TMP. DS . "uploads" . DS ."data.csv";
  $csv->auto($filepath);
  $this->set('orders',$csv->data);
  //$this->layout = null;
  //$this->autoLayout = false;
  Configure::write('debug', '0');
  echo $this->Session->flash();
?>
<h3><i class="fa fa-angle-right"></i>
<?php echo $this->Html->link('<i class="fa fa-user"></i> Export Import', array('action'=>'index'), array('escape'=>false)); ?> 
/ <i class="fa fa-user-plus"></i> Import From Excel </h3>
<h3><i class="fa fa-angle-right"></i> <i class="fa fa-user"></i> Import From Excel</h3>
<div class="table-responsive">
<table border="0" cellspacing="1" cellpadding="3" class="table">
  <tr>
    <?php foreach ($csv->titles as $value): ?>
    <th><?php echo $value; ?></th>
    <?php endforeach; ?>
  </tr>
  <?php foreach ($csv->data as $key => $row): ?>
  <tr>
    <?php foreach ($row as $value): ?>
    <td><?php echo $value; ?></td>
    <?php endforeach; ?>
  </tr>
  <?php endforeach; ?>
</table>
</div>
<?php 
// foreach ($csv->data as $key => $row): 
//   foreach ($row as $value): 
//     echo $value;
//   endforeach;
// endforeach;
// foreach ($csv->data as $key => $row): 
//   $this->data['Xls']['nama'] = $row['nama'];
//   echo ($row['nama']);
// endforeach;

// $this->Post->set(array(
//     'title' => 'New title',
//     'published' => false
// ));
// $this->Post->save();

?>

<?php echo $this->Form->create('Import');?>
    <fieldset>
    <?php
      $i = 0;
        $cintong=serialize($csv->data);
        echo  $this->Form->input('data',array('value'=>$cintong, 'type'=>'hidden'));
        //echo $cintong;
        //var_dump(unserialize($cintong));
    ?>
    </fieldset>
<?php 
$options = array('label' => 'Save', 'class' => 'btn btn-default');
echo $this->Form->end($options);?>