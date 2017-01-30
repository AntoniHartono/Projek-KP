<?php
if (strtolower($ctrl) === 'setup') {
if ($urole === 'admin') { ?>
$('#btnedit').click(function(e){
    e.preventDefault();
    var idparam = $(this).attr('idparam');
    location.href="<?php echo $this->Html->url(array('controller'=>'setup', 'action'=>'edit')) ?>/" + idparam;
});

$('#button2id').click(function(e){
    e.preventDefault();
    location.href="<?php echo $this->Html->url(array('controller'=>'setup', 'action'=>'index')) ?>";
});

<?php } ?>
<?php
}
?>
