<?php
session_start();
$logged_in = $_SESSION["loggedin"];
require_once 'dbconfig.php';

	
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Stock List</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
<style>
.table1 td, th {
    border: 1px solid black;
}

.table1 {
    border-collapse: collapse;
    width: 100%;
}

.table1 th {
	background: lightgrey;
	color: maroon;
    height: 50px;
	text-align: center;
}
.table1 td {  
	height: 30px;
	text-align: center;
color: maroon;
}
</style>

<style>

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #1E8449  ;
	/*background: url(../images/bg-navigation.png) no-repeat;*/
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/*
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;	
}
*/
.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>
	</head>
<body>
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

			<div id="contents">
				<div class="box">
					<div>
						<div class="body">
							<table>
							<tr>
								<td><h1>CIE - CO ASESSEMENT</h1></td>	
								<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
								<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
								<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
								<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
								<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
								<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
								<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
								<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
								<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>								
								</tr>
								</table>
							<table class="table1">
							<tr>
							<th>CO1</th>
							<th>CO2</th>
													
							<th>CO3</th>
							<th>CO4</th>																					
							<th>CO5</th>
							</tr>
<?php
	$stmt = $DB_con->prepare('SELECT * FROM result');
	$stmt->execute();	
	if($stmt->rowCount() > 0) {
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))		{
						
?>
	<tr>
													<td><?php echo $row['CO1']; ?></td>
	<td><?php echo $row['CO2']; ?> </td>	
	<td><?php echo $row['CO3']; ?> </td>
	<td><?php echo $row['CO4']; ?> </td>
	<td><?php echo $row['CO5']; ?> </td>

									
								<?php }}  ?>
							
							
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</body>
</html>