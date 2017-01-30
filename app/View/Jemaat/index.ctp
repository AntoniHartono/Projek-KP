<?php $this->assign('title', 'Manajemen Jemaat'); ?>

<h3><i class="fa fa-angle-right"></i> <i class="fa fa-user"></i> Manajemen Data Jemaat</h3>
			<p>&nbsp</p>

			<a href="http://localhost/gkjsawokembar/search">Peneluuran lanjutan</a> 

			<?php
				$url=array('controller'=>'jemaat','action'=>'')+$this->request->params['pass'];
				echo $this->Form->create('', array('type' => 'get', 'url'=>$url));
				echo $this->Form->input('q' ,array('label'=> false, 'placeholder'=>'search...','class'=>'form-control', 'value' => (!empty($this->params['url']['q']) ? $this->params['url']['q'] : '')));
				?>
				&nbsp
			<?php  
				echo $this->Form->end('Search',array("class"=>"btn btn-default btn-success"));
			?>
				
				<p>&nbsp</p>
				
				<button class="btn btn-default btn-success" type="button" id="buttonadd"><span class="fa fa-user-plus"></span> Tambah Data</button>
				</span>


<br><br>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Nomor Induk</th>
			<th>Nama Lengkap</th>
			<th>Jenis Kelamin</th>
			<th>Hubungan Keluarga</th>
			<th>Tempat Lahir</th>
			<th>Aksi</th>
		</tr>
	</thead>
		<tbody>
		<?php foreach ($jemaats as $items) {
			# code...
		 ?>
		<tr>
			<?php 
			?>
			<td><?php echo $items['Jemaat']['no_induk']; ?></td>
			<td><?php echo $items['Jemaat']['nama']; ?></td>
			<td><?php echo $items['Jemaat']['jenis_kelamin']; ?></td>
			<td><?php echo $items['Jemaat']['hubungan_keluarga']; ?></td>
			<td><?php echo $items['Jemaat']['tempat_lahir'];?>
			</td>
			<td>
			<div class="btn-group">
			<button type="button" class="btn btn-default"><i class="fa fa-cog"></i></button>
	  			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    		<span class="caret"></span>
			    <span class="sr-only">Toggle Dropdown</span>
		  	</button>
				<ul class="dropdown-menu">
					<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $this->Html->url(array('controller'=>'jemaat', 'action'=>'ubah', $items['Jemaat']['id'])); ?>"><i class="fa fa-pencil"></i> Ubah Data</a></li>
					<li class="divider"></li>
					<li><?php echo $this->Form->postLink('<i class="fa fa-user-times"></i> Hapus Data', array('action'=>'hapus', $items['Jemaat']['id']), array('escape' => false, 'role' =>"menuitem", "tabindex"=>"-1",  'confirm'=>'Yakin Membuang?')
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


				