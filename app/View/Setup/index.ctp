<?php
$this->assign('title','Halaman Pengaturan');
?>

<h3>Pengaturan Sistem</h3>
<table class = 'table'>
	<thead>
		<tr>
			<td>Parameter</td>
			<td>Nilai</td>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach($datas as $data){?>
		<tr>
			<td>
				<button id = "btnedit" value = "<?php echo $data['Setup']['id']?>">
					<i class = "fa fa-pencil"></i>Sunting
				</button>
				<?php echo $data['Setup']['parameter']?></td>
			<td><?php echo $data['Setup']['nilai']?></td>
		</tr>
		<?php }
		?>
	</tbody>
</table>