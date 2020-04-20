 <?php $this->load->view('admin/header') ?>
 <div class="data table-responsive">
      <canvas id="barChart"></canvas>
 </div>

 <div class="data table-responsive" style="margin-top: 100px;">
      <canvas id="piechart"></canvas>
 </div>
 <?php $this->load->view('admin/footer') ?>

  <?php 
    $base_url_js_graphe = base_url("assets/js/page/graphe/");
  ?>

 <script src="<?php echo $base_url_js_graphe; ?>3.2.1/jquery.min.js"></script>
<script src="<?php echo $base_url_js_graphe; ?>Chart.min.js"></script>
 <script type="text/javascript">
 	//bar
var ctxB = document.getElementById("barChart").getContext('2d');
var myBarChart = new Chart(ctxB, {
type: 'bar',
data: {
labels: <?php echo $jsonSroom; ?>,
datasets: [{
label: 'Votes',
data: <?php echo $nombreVote; ?>,
backgroundColor: [
'rgba(255, 99, 132, 0.2)',
'rgba(54, 162, 235, 0.2)',
'rgba(255, 206, 86, 0.2)',
'rgba(75, 192, 192, 0.2)',
'rgba(153, 102, 255, 0.2)',
'rgba(255, 159, 64, 0.2)'
],
borderColor: [
'rgba(255,99,132,1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 206, 86, 1)',
'rgba(75, 192, 192, 1)',
'rgba(153, 102, 255, 1)',
'rgba(255, 159, 64, 1)'
],
borderWidth: 1
}]
},
options: {
scales: {
yAxes: [{
ticks: {
beginAtZero: true
}
}]
}
}
});

 </script>

 <script type="text/javascript">
 	var ctxP = document.getElementById("piechart").getContext('2d');
var myPieChart = new Chart(ctxP, {
type: 'pie',
data: {
labels: <?php echo $jsonSroom; ?>,
datasets: [{
data: <?php echo $nombreVote; ?>,
backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
}]
},
options: {
responsive: true
}
});

 </script>