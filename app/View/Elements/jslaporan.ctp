<?php
if (strtolower($ctrl) === 'laporans') {
if ($urole === 'admin') { ?>


$('#button2id').click(function(e){
    e.preventDefault();
    location.href="<?php echo $this->Html->url(array('controller'=>'laporans', 'action'=>'index')) ?>";
});

<?php
  }
}
?>
