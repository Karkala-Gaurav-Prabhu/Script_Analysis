<?php
require_once 'dbconfig.php';
	$stmt = $DB_con->prepare('SELECT * FROM result');
	$stmt->execute();	
	$rowc	= 0;
	$tot = $stmt->rowCount();
	
$c1 = 0;
$c2 = 0;
$c3 = 0;
$c4 = 0;
$c5 = 0;

	while($row=$stmt->fetch(PDO::FETCH_ASSOC))		{
		$rowc++;	
	if($rowc==$tot) {
$c1 = $row['CO1'];
$c2 = $row['CO2'];
$c3 = $row['CO3'];
$c4 = $row['CO4'];
$c5 = $row['CO5'];
	}
	}

	$total_s = 0;
	$total_a = 0;
	$total_b = 0;
	$total_c = 0;
	$total_d = 0;
	$total_e = 0;
	$total_f = 0;
	$total_x = 0;
	$stmt1 = $DB_con->prepare('SELECT * FROM co3');
	$stmt1->execute();	
	while($row=$stmt1->fetch(PDO::FETCH_ASSOC))		{

	if($row['GRADE']=="S" || $row['GRADE']=="s") {
	$total_s++; 
	}
	
	if($row['GRADE']=="A" || $row['GRADE']=="a") {
	$total_a++; 
	}
	
	if($row['GRADE']=="B" || $row['GRADE']=="b") {
	$total_b++; 
	}
	
	if($row['GRADE']=="C" || $row['GRADE']=="c") {
	$total_c++; 
	}

	if($row['GRADE']=="D" || $row['GRADE']=="d") {
	$total_d++; 
	}
	
	if($row['GRADE']=="E" || $row['GRADE']=="e") {
	$total_e++; 
	}

	if($row['GRADE']=="F" || $row['GRADE']=="f") {
	$total_f++; 
	}
	
	if($row['GRADE']=="X" || $row['GRADE']=="x") {
	$total_x++; 
	}

	}

	
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
	text: "CO Attainment =CIE-80% + SEE-10% + CES-10%"
	},
	axisY: {
		title: "Marks"
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "",
		dataPoints: [      
			{ y: <?php echo $c1;?>, label: "CO1" },
			{ y: <?php echo $c2;?>,  label: "CO2" },
			{ y: <?php echo $c3;?>,  label: "CO3" },
			{ y: <?php echo $c4;?>,  label: "CO4" },
			{ y: <?php echo $c5;?>,  label: "CO5" }			
		]
	}]
});
chart.render();

var chart1 = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
	text: "SEE Grade distribution"
	},
	axisY: {
		title: "Count"
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "",
		dataPoints: [      
			{ y: <?php echo $total_s;?>, label: "S" },					{ y: <?php echo $total_a;?>, label: "A" },		
			{ y: <?php echo $total_b;?>, label: "B" },		
{ y: <?php echo $total_c;?>, label: "C" },		
{ y: <?php echo $total_d;?>, label: "D" },		
{ y: <?php echo $total_e;?>, label: "E" },		
{ y: <?php echo $total_f;?>, label: "F" },		
			{ y: <?php echo $total_x;?>, label: "X" }
			
		]
	}]
});
chart1.render();

}
</script>
<link rel="stylesheet" href="css/style.css" type="text/css">

</head>
<body >
	<div id="background">
		<div id="page">
			<div id="header">
				<div id="logo">
					<table>
					<tr>
				<td> <a href="index.html"><img src="images/Logofinal.png" alt="LOGO" height="112" width="150"></a> </td>
				<td><font style="color:white;font-size:53px;font-family:courier;">
						SCRIPT ANALYSIS SYSTEM
					</font> </td>
				</tr>

					</table>

				</div>
				<div id="navigation">
				<ul>
				<li>
				<a href="login.php">Home </a>
				</li>

				<li>
				<a href="view.php">View</a>
				</li>
						
				<li>
				<a href="bargraph.php">Graph</a>
				</li>
						
				<li>
				<a href="index.html">Logout</a>
				</li>
				</ul>
				</div>
			</div>

<div id="chartContainer" style="margin-left:15%;height: 300px; width: 70%;"></div>

<div id="chartContainer1" style="margin-top:25px;margin-left:15%;height: 300px;margin-bottom:35px; width: 70%;"></div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>