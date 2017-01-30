<?php
if (strtolower($ctrl) === 'jemaat' || strtolower($ctrl) === 'jemaatsminatgereja') {
if ($urole === 'admin') { ?>

$(function () { $('#collapseFour').collapse({
      toggle: false
})});
$(function () { $('#collapseTwo').collapse('toggle')});
$(function () { $('#collapseThree').collapse('hide')});


$('#buttonadd').click(function(e){
    e.preventDefault();
    location.href="<?php echo $this->Html->url(array('controller'=>'jemaat', 'action'=>'tambah')) ?>";
});

$('#index').click(function(e){
    e.preventDefault();
    location.href="<?php echo $this->Html->url(array('controller'=>'jemaat', 'action'=>'index')) ?>";
});

  $(function() {
            $( "#datepicker-1" ).datepicker({
                dateFormat: "d-m-Y"
            }).val()

         });
  $(function() {
            $( "#datepicker-2" ).datepicker();
             dateFormat: "yyyy-mm-dd"
 });
  $(function() {
            $( "#datepicker-3" ).datepicker();
             dateFormat: "yyyy-mm-dd"
 });




$(document).ready(function(){
    $("#input_autocomplete1").autocomplete({
        source: '/gkjsw/jemaat/getdata'
    });
});


$(document).ready(function(){
    $("#input_autocomplete2").autocomplete({
        source: '/gkjsw/jemaat/getdata'
    });
});

$("#input_autocomplete1").on('blur', function(){
      var $input = $('#input_autocomplete1').val();
      $( "#hasil1" ).val($input);
      $( "#input_autocomplete1" ).val(' ');

});

$("#input_autocomplete2").on('blur', function(){
      var $input = $('#input_autocomplete2').val();
      $( "#hasil2" ).val($input);
      $( "#input_autocomplete2" ).val(' ');

});

$(document).ready(function(){
    $("#kep").autocomplete({
        source: '/gkjsw/jemaat/getkepalakeluarga'
    });
});


$("#kepala").prop('readonly', true);
$("#hubungan").on('change', function(){
      var $hub = $('#hubungan').val();
      if($hub!="Kepala Keluarga")
      {
         $("#kepala").prop('readonly', false);
      }
     if($hub=="Kepala Keluarga")
      {
        $("#kepala").prop('readonly', true);
      }
});




$(function() {
      $( "#kepala" ).autocomplete({
      source: "/gkjsw/jemaat/getkepalakeluarga",
      minLength: 2,
      select: function( event, ui ) {
      var option = document.createElement('option');
        
        $('#hasilkk').val(ui.item.label);
        option.text = option.value = ui.item.id; 
        var select = document.getElementById("inputkepala");
        select.add(option, 0);
      }
    });
  });

$(function() {
    function log( message ) {
      $( "<div>" ).text( message ).prependTo( "#log2" );
      $( "#log2" ).scrollTop( 0 );
    }
 
    $( "#kodom" ).autocomplete({
      source: "/gkjsw/jemaat/getdata",
      minLength: 2,
      select: function( event, ui ) {
         $('#hasildom').val(ui.item.label);
         $('#kodedom').val(ui.item.id);
      }
    });
  });


$(function() {
    function log( message ) {
      $( "<div>" ).text( message ).prependTo( "#log3" );
      $( "#log3" ).scrollTop( 0 );
    }
 
    $( "#kosek" ).autocomplete({
      source: "/gkjsw/jemaat/getdata",
      minLength: 2,
      select: function( event, ui ) {
          $('#hasilsek').val(ui.item.label);
          $('#kodesek').val(ui.item.id);
      }
    });
  });

  
  

<?php  }}?>



