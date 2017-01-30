<h3><i class="fa fa-angle-right"></i><i class="fa fa-user"><a href="http://localhost/gkjsawokembar/jemaat">Manajemen Jemaat</a></i> <i class="fa fa-user-plus"></i> Penelusuran Lanjutan </h3>

<?php echo $this->Html->script(array('jquery.min'));
$url=array('controller'=>'search','action'=>'')+$this->request->params['pass'];
echo $this->Form->create('', array('type' => 'get', 'url'=>$url));?>
   
<div class="input_fields_wrap">
		<button class="btn btn-default btn-success" type="button" id="buttonadd"><span class="fa fa-user-plus"></span> Add More Fields</button>
     <p>&nbsp</p>
    <div class="form-inline">
    	<select class="form-control" name="kategori[]">
    		<option value="nama">Nama</option>
			<option value="tempat_lahir">Tempat lahir</option>
			<option value="alamat_sekarang">Alamat Sekarang</option>
			<option value="alamat_domisili">Alamat Domisili</option>
			<option value="pendidikan_terakhir">Pendidikan Terakhir</option>
			<option value="goldar">Golongan Darah</option>
			<option value="nama_ayah">Nama Ayah</option>
			<option value="nama_ibu">Nama Ibu</option>
			<option value="status_pernikahan">Status Pernikahan</option>
			<option value="hubungan_keluarga">Hubungan Keluarga</option>
			<option value="peran_grj">Peran Gereja</option>
			<option value="ganguan_kesehatan">Gangguan Kesehatan</option>
			<option value="jenis_kelamin">Jenis Kelamin</option>
			<option value="no_telepon">Nomor Telepon</option>
			<option value="pekerjaan">Pekerjaan</option>
			<option value="wilayah">Wilayah</option>
			<option value="tgllahir">Tanggal Lahir (2001-01-30)</option>
			<option value="tglbaptis">Tanggal Baptis (2001-01-30)</option>
			<option value="jmlanak">Jumlah Anak</option>
			<option value="status">Status warga gereja</option>
			<option value="noinduk">Nomer Induk</option>
			<option value="tptkebaktian">Tempat Kebaktian</option>
			
    	</select>

    	<input class="form-control" type="text" name="mytext[]">

    	<select class="form-control" name="andor[]">
    		
    		<option value="and">AND</option>
    		<option value="or">OR</option>

    	</select>
    	
    </div>
    &nbsp
</div>
&nbsp
<?php echo $this->Form->end('Search');?>
</form>

 
<script>
$(document).ready(function() {
    var max_fields      = 100; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $("#buttonadd"); //Add button ID
   
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="form-inline"><select class="form-control" name="kategori[]"><option value="nama">Nama</option><option value="tempat_lahir">Tempat lahir</option><option value="alamat_sekarang">Alamat Sekarang</option><option value="alamat_domisili">Alamat Domisili</option><option value="pendidikan_terakhir">Pendidikan Terakhir</option><option value="goldar">Golongan Darah</option><option value="nama_ayah">Nama Ayah</option><option value="nama_ibu">Nama Ibu</option><option value="status_pernikahan">Status Pernikahan</option><option value="hubungan_keluarga">Hubungan Keluarga</option><option value="peran_grj">Peran Gereja</option><option value="ganguan_kesehatan">Gangguan Kesehatan</option><option value="jenis_kelamin">Jenis Kelamin</option><option value="no_telepon">Nomor Telepon</option><option value="pekerjaan">Pekerjaan</option><option value="wilayah">Wilayah</option><option value="tgllahir">Tanggal Lahir (2001-01-30)</option><option value="tglbaptis">Tanggal Baptis (2001-01-30)</option><option value="jmlanak">Jumlah Anak</option><option value="status">Status warga gereja</option><option value="noinduk">Nomer Induk</option><option value="tptkebaktian">Tempat Kebaktian</option></select> <input class="form-control" type="text" name="mytext[]"/> <select class="form-control" name="andor[]"><option value="and">AND</option><option value="or">OR</option></select> <a href="#" class="remove_field">Remove</a></div>&nbsp'); //add input boxs
        }
    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>
 <a href="<?php echo $this->Html->url(array('controller'=>'search', 'action'=>'xls' , '?'=>$this->params['url'])); ?>">
<button class="btn btn-success" type="button">
  <span class = "glyphicon glyphicon-cloud-download"></span>
  Export
</button>

</a>


<table class="table table-bordered">
	<thead>
		<tr>
			<th>Nomor Induk</th>
			<th>Nama Lengkap</th>
			<th>Jenis Kelamin</th>
			<th>Hubungan Keluarga</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Tanggal Baptis</th>
			<th>Aksi</th>
		</tr>
	</thead>
		<tbody>
		<?php foreach ($search as $items) {
			# code...
			
		 ?>

		<tr>
			<?php 
			?>
			<td><?php echo $items['Search']['no_induk']; ?></td>
			<td><?php echo $items['Search']['nama']; ?></td>
			<td><?php echo $items['Search']['jenis_kelamin']; ?></td>
			<td><?php echo $items['Search']['hubungan_keluarga']; ?></td>
			<td><?php echo $items['Search']['tempat_lahir'];?>

			</td>
			<td><?php echo $items['Search']['tanggal_lahir'];?>
			
			</td>
			<td><?php echo $items['Search']['tgl_baptis'];?>
			
			</td>
						
			<td>
			<div class="btn-group">
			<button type="button" class="btn btn-default"><i class="fa fa-cog"></i></button>
	  			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    		<span class="caret"></span>
			    <span class="sr-only">Toggle Dropdown</span>
		  	</button>
				<ul class="dropdown-menu">
					<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $this->Html->url(array('controller'=>'jemaat', 'action'=>'ubah', $items['Search']['id'])); ?>"><i class="fa fa-pencil"></i> Ubah Data</a></li>
					<li class="divider"></li>
					<li><?php echo $this->Form->postLink('<i class="fa fa-user-times"></i> Hapus Data', array('action'=>'hapus', $items['Search']['id']), array('escape' => false, 'role' =>"menuitem", "tabindex"=>"-1",  'confirm'=>'Yakin Membuang?')
					) ?></li>
					


				</ul>
			</div>
			</td>
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


				

