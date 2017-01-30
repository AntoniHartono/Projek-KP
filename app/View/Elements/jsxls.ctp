<?php
if (strtolower($ctrl) === 'xls') {
if ($urole === 'admin') { ?>


$('#btnexport').click(function(e){
    e.preventDefault();
    location.href="<?php echo $this->Html->url(array('controller'=>'xls', 'action'=>'xls')) ?>";
});

$('#btnexport2').click(function(e){
    e.preventDefault();
    location.href="<?php echo $this->Html->url(array('controller'=>'search', 'action'=>'xls')) ?>";
});

$('#btnimport').click(function(e){
    e.preventDefault();
    location.href="<?php echo $this->Html->url(array('controller'=>'xls', 'action'=>'import')) ?>";
});

$('#btnimpdata').click(function(e){
    e.preventDefault();
    location.href="<?php echo $this->Html->url(array('controller'=>'xls', 'action'=>'impdata')) ?>";
});

<?php
  }
}
?>
