<?php
  App::import("Vendor","parsecsv");
  $csv = new parseCSV();
  $filepath = TMP. DS . "uploads" . DS ."data.csv";
  $csv->auto($filepath);
  $this->set('orders',$csv->data);
  //$this->layout = null;
  //$this->autoLayout = false;
  Configure::write('debug', '0');
?>


<!-- 
<table border="0" cellspacing="1" cellpadding="3">
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
</table> -->

<?php
print_r($csv->data); 

//$this->set($data);
// foreach ($csv->data as $key => $row): 
  // $this->Xls->create();
  // $data['Xls']['nama'] =  $row['Nama'];
  // //echo $row['Nama'];
  // // $this->Xls->create();
  // // $this->Xls->save($data);
  // // $this->save($data);
  // // echo $row[];
  // $this->Xls->set($data);
  // $this->Xls->save();
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
        echo $cintong;
        var_dump(unserialize($cintong));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit'));?>