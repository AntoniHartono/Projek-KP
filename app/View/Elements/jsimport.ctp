<?php
if (strtolower($ctrl) === 'setup') {
if ($urole === 'admin') { ?>
$('#btnedit').click(function(e){
    e.preventDefault();
    var idparam = $(this).attr('idparam');
    location.href="<?php echo $this->Html->url(array('controller'=>'import', 'action'=>'import')) ?>/" + idparam;
});

<?php } ?>
<?php
}
?>
