<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title><?php echo $this->fetch('title'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <?php echo $this->Html->css(array('cake.generic.css', 'bootstrap.min.css', 'style.css'));?>
</head>
<body>
    <?php echo $this->Html->script(array('jquery.min.js', 'bootstrap.min.js', 'jquery.backstretch.min.js', 'Chart.js','Chart.min.js')); ?>

    <!-- <canvas id="skills" width="300" height="300"></canvas> -->
    <canvas id="clients" width="350" height="200"></canvas>
    <script type="text/javascript">
        var data = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(151,249,190,0.5)",
        strokeColor: "rgba(255,255,255,1)",
        pointColor: "rgba(220,220,220,1)",
        pointStrokeColor: "#fff",
                data: [65, 59, 80, 81, 56, 55, 40]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(252,147,65,0.5)",
        strokeColor: "rgba(255,255,255,1)",
        pointColor: "rgba(173,173,173,1)",
        pointStrokeColor: "#fff",
                data: [28, 48, 40, 19, 86, 27, 90]
            }
        ]
    };
        var ctx = document.getElementById("clients").getContext("2d");
        var myLineChart = new Chart(ctx).Line(data);
    </script>
</body>
</html>