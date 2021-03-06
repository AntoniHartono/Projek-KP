<?php
$this->assign('title', 'Halaman Laporan Jemaat');
?>
<h3>Seluruh Jemaat Gkj Gondokusuman</h3>
<?php echo $this->Html->script(array('jquery.min.js', 'bootstrap.min.js', 'jquery.backstretch.min.js', 'Chart.js','Chart.min.js')); 
	$laki = 0;
	$perempuan = 0;?>
<?php foreach ($datas as $data) {
		if ($data['Laporan']['jenis_kelamin'] == "L"){
			$laki += 1;
		} else{
			$perempuan += 1;
		}
?>
<?php } ?>

<!-- <canvas id="skills" width="300" height="300"></canvas> -->
<canvas id="clients3" width="350" height="200"></canvas>
<script type="text/javascript">
    var data = {
    labels: ["Laki-laki", "Perempuan"],
    datasets: [
        {
            label: "My Second dataset",
            fillColor: "rgba(252,147,65,0.5)",
	        strokeColor: "rgba(255,255,255,1)",
	        pointColor: "rgba(173,173,173,1)",
	        pointStrokeColor: "#fff",
            data: [<?php echo $laki; ?>,<?php echo $perempuan; ?>]
        }
    ]
};
    var ctx = document.getElementById("clients3").getContext("2d");
    var myLineChart = new Chart(ctx).Bar(data);
</script>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No Induk</th>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
		</tr>
	</thead>
		<tbody>
		<?php foreach ($datas as $data) {
			# code...
		 ?>
		<tr>
			<?php 
			?>
			<td><?php echo $data['Laporan']['no_induk']; ?></td>
			<td><?php echo $data['Laporan']['nama']; ?></td>
			<td><?php echo $data['Laporan']['jenis_kelamin']; ?></td>
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
</table>