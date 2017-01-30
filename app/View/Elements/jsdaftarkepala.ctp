<?php
if (strtolower($ctrl) === 'daftarkepala') {
if ($urole === 'admin') { ?>

// Bagian javascript untuk controller setup
//

$('#button2id').click(function(e){
    e.preventDefault();
    location.href="<?php echo $this->Html->url(array('controller'=>'daftarkepala', 'action'=>'index')) ?>";
});

<?php
  }
}
?>
