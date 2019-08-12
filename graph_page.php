<?php
$con = mysqli_connect("localhost", "root", "", "polls");
$query = "SELECT count(*) as for_against, opinions,
	case
		when opinions = 'Yes' then 'Yes'
		when opinions = 'No' then 'No'
		when opinions = 'None' then 'None'
	end as opinions FROM proj_opinion GROUP BY opinions"; 

$result = mysqli_query($con, $query);
$i=0;
while($row=mysqli_fetch_assoc($result))
{
	$label[$i]=$row["opinions"];
	$count[$i]=$row["for_against"];
	$i++;
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial scale=1">
	<title>Poll Results!</title>
</head>

<style>
	body {
		width: 660px;
		margin: 0 auto;
	}
</style>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {packages: ['corechart']});
  google.charts.setOnLoadCallback(drawPieChart);
  
  function drawPieChart()
  {
  	var pie = google.visualization.arrayToDataTable([
  		['opinions','Numbers'],
  		['<?php echo $label[0]; ?>', <?php echo $count[0]; ?>],
  		['<?php echo $label[1]; ?>', <?php echo $count[1]; ?>],
  		['<?php echo $label[2]; ?>', <?php echo $count[2]; ?>],
  		]);

  	var header = {
  		title: 'People against Act 370',
  		slices: {0: {color: '#666666'}, 1: {color: '#006EFF'}, 2: {color: '#fc9403'}}
  	};

  	var piechart = new google.visualization.PieChart(document.getElementById('piechart'));
  	piechart.draw(pie, header);
  }

  google.charts.load('current', {packages: ['corechart', 'bar']});
  google.charts.setOnLoadCallback(drawColumnChart);

  function drawColumnChart() {
  	var bar = google.visualization.arrayToDataTable([
  		['opinions','Numbers',{role: "style"}],
  		['<?php echo $label[0]; ?>', <?php echo $count[0]; ?>, 'color: #666666'],
  		['<?php echo $label[1]; ?>', <?php echo $count[1]; ?>, 'color: #006EFF'],
  		['<?php echo $label[2]; ?>', <?php echo $count[2]; ?>, 'color: #fc9403'],
  		]);

  	var columnview = new google.visualization.DataView(bar);

  	var header = {
  		title: 'People against Act 370',
  		bar: {groupWidth: "50%"}
  	};

  	var barchart = new google.visualization.ColumnChart (document.getElementById("columnchart"));
  	barchart.draw(columnview, header);
  }

</script>

<body>
		<h1>Poll results!</h1>
		<div id="piechart"></div>
		<div id="columnchart" style="width: 660px; height: 300px;"></div>
</body>

</html>