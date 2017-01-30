<?php
$this->assign('title', 'Halaman Laporan Jemaat');
$laki = 0;
	$perempuan = 0; 
?>
<?php foreach ($datas as $data) {
		if ($data['Laporan']['jenis_kelamin'] == "L"){
			$laki += 1;
		} else{
			$perempuan += 1;
		}
?>
<?php } ?>

<?php echo $this->Html->css(array('stylelaporan.css'));?>
<h3>Laporan Jemaat</h3>
	<ol class="rectangle-list">
		<li class="orange"><?php echo $this->Html->link( 'Seluruh Jemaat Gkj Gondokusuman', '/laporans/laporan/');?></li>
		<li class="blue"><?php echo $this->Html->link( 'Laporan Data Pekerjaan Jemaat', '/laporans/laporanb/');?></li>
		<li class="green"><?php echo $this->Html->link( 'Laporan Wilayah Jemaat', '/laporans/laporanc/');?></li>
		<li class="purple"><?php echo $this->Html->link( 'Laporan Umur Jemaat ', '/laporans/laporand/');?></li>
	</ol>

<table class="tablelaporan">
		<thead>
			<th>1. Seluruh Jemaat Gkj Gondokusuman</th>
			<th>3. Laporan Wilayah Jemaat</th>
		</thead>
		<tbody>
			<tr></tr>
			<tr>
				<td>
					<?php echo $this->Html->script(array('jquery.min.js', 'bootstrap.min.js', 'jquery.backstretch.min.js', 'Chart.js','Chart.min.js')); ?>

				    <!-- <canvas id="skills" width="300" height="300"></canvas> -->
				   
				    <canvas id="clients" width="350" height="200"></canvas>
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
				        var ctx = document.getElementById("clients").getContext("2d");
				        var myLineChart = new Chart(ctx).Bar(data);
				    </script>
				</td>
				<td>
					<?php echo $this->Html->script(array('jquery.min.js', 'bootstrap.min.js', 'jquery.backstretch.min.js', 'Chart.js','Chart.min.js')); ?>

				    <!-- <canvas id="skills" width="300" height="300"></canvas>--> 
					<canvas id="clients3" width="350" height="200"></canvas>
					<script type="text/javascript">
					    var data = {
					    labels: [<?php foreach($wilayah as $wilayah){
					    	echo '"'.$wilayah['Wilayah']['nama'].'",';}
					    	?>],
					    datasets: [
					        {
					            label: "My First dataset",
					            fillColor: "rgba(82,139,139,0.5)",
						        strokeColor: "rgba(255,255,255,1)",
						        pointColor: "rgba(220,220,220,1)",
						        pointStrokeColor: "#fff",
					            data: [<?php 
					             foreach ($jum as $value) {
					             	# code...
					             	if(isset($value['b']['jumlah']))
					             	{
					             	echo $value['b']['jumlah'].','; }
					             	 else{
					             	echo 0;
					             	echo ',';}
					             }
					    	?>]
					    	
					        }
					    ]
					};
					    var ctx = document.getElementById("clients3").getContext("2d");
					    var myLineChart = new Chart(ctx).Bar(data);
					</script>
				</td>
			</tr>
			
		</tbody>
	</table>

	<table class="tablelaporan">
		<thead>
			<th>2. Laporan Data Pekerjaan Jemaat</th>
			<th>4. Laporan Umur Jemaat</th>
		</thead>
		<tbody>
			<tr></tr>
			<tr>
				<td>
					<?php echo $this->Html->script(array('jquery.min.js', 'bootstrap.min.js', 'jquery.backstretch.min.js', 'Chart.js','Chart.min.js')); ?>

				     <!-- <canvas id="skills" width="300" height="300"></canvas>--> 
				    <canvas id="clients2" width="350" height="330"></canvas>
				    <script type="text/javascript">
			        var data = {
			        labels: [<?php foreach($jobs as $job){
			        	echo '"'.$job['Job']['nama'].'",';}
			        	?>],
			        datasets: [
			            {
			                label: "My First dataset",
			                fillColor: "rgba(139,35,35,0.5)",
					        strokeColor: "rgba(255,255,255,1)",
					        pointColor: "rgba(220,220,220,1)",
					        pointStrokeColor: "#fff",
			                data: [<?php 
			                 foreach ($jumlahs as $value) {
			                 	# code...
			                 	if(isset($value['b']['jumlah']))
			                 	{
			                 	echo $value['b']['jumlah'].','; }
			                 	 else{
			                 	echo 0;
			                 	echo ',';}
			                 }
			        	?>]
			        	
			            }
			        ]
			    };
			        var ctx = document.getElementById("clients2").getContext("2d");
			        var myLineChart = new Chart(ctx).Bar(data);
			    </script>	
				</td>	
				<td>
					<?php echo $this->Html->script(array('jquery.min.js', 'bootstrap.min.js', 'jquery.backstretch.min.js', 'Chart.js','Chart.min.js')); ?>

				    <!-- <canvas id="skills" width="300" height="300"></canvas>--> 
					<canvas id="clients4" width="350" height="200"></canvas>
					<script type="text/javascript">
					    var data = {
					    labels: [<?php 
					             foreach ($juml as $value) {
					             	echo '"'.$value[0]['range_umur'].'",';}
					    		?>],
					    datasets: [
					        {
					            label: "My First dataset",  
					            fillColor: "rgba(127,255,212,0.5)",
						        strokeColor: "rgba(255,255,255,1)",
						        pointColor: "rgba(220,220,220,1)",
						        pointStrokeColor: "#fff",
					            data: [<?php 
					             foreach ($juml as $value) {
					             	echo $value[0]['jumlah'].',';}
					    		?>]
					        }
					    ]
					};
					    var ctx = document.getElementById("clients4").getContext("2d");
					    var myLineChart = new Chart(ctx).Bar(data);
					</script>	

				</td>
			</tr>
		</tbody>
	</table>
