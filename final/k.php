<?php
session_start();
$logged_in = $_SESSION["loggedin"];
require_once 'dbconfig.php';
if(isset($_POST['upload'])) {
		
$fname = $_POST['qty']; 
if($fname=="") {
		$errMSG = "pls upload the file";
	}
	else{
	    require_once "Classes/PHPExcel.php";
		$tmpfname = "SKS_6A_MAD_Jan-May_2018_ScriptAnalysis_Updated.xlsx";
		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
	for ($row = 14; $row <= 71; $row++) {

$s1=$worksheet->getCell('A'.$row)->getValue();
$s2=$worksheet->getCell('B'.$row)->getValue();
$s3=$worksheet->getCell('C'.$row)->getValue();
$s4=$worksheet->getCell('D'.$row)->getValue();
$s5=$worksheet->getCell('E'.$row)->getValue();
$s6=$worksheet->getCell('F'.$row)->getValue();
$s7=$worksheet->getCell('G'.$row)->getValue();
$s8=$worksheet->getCell('H'.$row)->getValue();
$s9=$worksheet->getCell('I'.$row)->getValue();
$s10=$worksheet->getCell('J'.$row)->getValue();
$s11=$worksheet->getCell('K'.$row)->getValue();
$s12=$worksheet->getCell('L'.$row)->getValue();
$s13=$worksheet->getCell('M'.$row)->getValue();
$s14=$worksheet->getCell('N'.$row)->getValue();
$s15=$worksheet->getCell('O'.$row)->getValue();
$sql="INSERT INTO test1(Sl_No,USN,Names,Q1a,Q1b,Q1c,Q1d,Q2a,Q2b,Q2c,Q2d,Q3a,Q3b,Q3c,Q3d) VALUES('".$s1."','".$s2."', '".$s3."', '".$s4."','".$s5."','".$s6."', '".$s7."','".$s8."', '".$s9."', '".$s10."', '".$s11."', '".$s12."', '".$s13."','".$s14."', '".$s15."')";
$stmt = $DB_con->prepare($sql);		
if($stmt->execute())
			{
				$errMSG = "Registration Successful";				
			}	

		    }		
			for ($row = 14; $row <= 71; $row++) {
			$s1=$worksheet->getCell('A'.$row)->getValue();
			$s2=$worksheet->getCell('B'.$row)->getValue();
			$s3=$worksheet->getCell('C'.$row)->getValue();
			$s4=$worksheet->getCell('P'.$row)->getValue();
			$s5=$worksheet->getCell('Q'.$row)->getValue();
			$s6=$worksheet->getCell('R'.$row)->getValue();
			$s7=$worksheet->getCell('S'.$row)->getValue();
			$s8=$worksheet->getCell('T'.$row)->getValue();
			$s9=$worksheet->getCell('U'.$row)->getValue();
			$s10=$worksheet->getCell('V'.$row)->getValue();
			$s11=$worksheet->getCell('W'.$row)->getValue();
			$s12=$worksheet->getCell('X'.$row)->getValue();
			$s13=$worksheet->getCell('Y'.$row)->getValue();
			$s14=$worksheet->getCell('Z'.$row)->getValue();
			$s15=$worksheet->getCell('AA'.$row)->getValue();
			$sql="INSERT INTO test2(Sl_No,USN,Names,Q1a,Q1b,Q1c,Q1d,Q2a,Q2b,Q2c,Q2d,Q3a,Q3b,Q3c,Q3d) VALUES('".$s1."','".$s2."', '".$s3."', '".$s4."','".$s5."','".$s6."', '".$s7."','".$s8."', '".$s9."', '".$s10."', '".$s11."', '".$s12."', '".$s13."','".$s14."', '".$s15."')";
			$stmt = $DB_con->prepare($sql);

           if($stmt->execute())
			{
				$errMSG = "Registration Successful";				
			}	

		    }
			
			for ($row = 14; $row <= 71; $row++) {

			$s1=$worksheet->getCell('A'.$row)->getValue();
			$s2=$worksheet->getCell('B'.$row)->getValue();
			$s3=$worksheet->getCell('C'.$row)->getValue();
			$s4=$worksheet->getCell('AB'.$row)->getValue();
			$s5=$worksheet->getCell('AC'.$row)->getValue();
			$s6=$worksheet->getCell('AD'.$row)->getValue();
			$s7=$worksheet->getCell('AE'.$row)->getValue();
			$s8=$worksheet->getCell('AF'.$row)->getValue();
			$s9=$worksheet->getCell('AG'.$row)->getValue();
			$s10=$worksheet->getCell('AH'.$row)->getValue();
			$s11=$worksheet->getCell('AI'.$row)->getValue();
			$s12=$worksheet->getCell('AJ'.$row)->getValue();
			$s13=$worksheet->getCell('AK'.$row)->getValue();
			$s14=$worksheet->getCell('AL'.$row)->getValue();
			$s15=$worksheet->getCell('AM'.$row)->getValue();
			$s16=$worksheet->getCell('AU'.$row)->getValue();
			
			$sql="INSERT INTO test3(Sl_No,USN,Names,Q1a,Q1b,Q1c,Q1d,Q2a,Q2b,Q2c,Q2d,Q3a,Q3b,Q3c,Q3d,GRADE) VALUES('".$s1."','".$s2."', '".$s3."', '".$s4."','".$s5."','".$s6."', '".$s7."','".$s8."', '".$s9."', '".$s10."', '".$s11."', '".$s12."', '".$s13."','".$s14."', '".$s15."','".$s16."')";
			$stmt = $DB_con->prepare($sql);		
			if($stmt->execute())
			{
				$errMSG = "Registration Successful";				
			}	

		    }
			
			$worksheet1 = $excelObj->getSheet(3);
		    $lastRow1 = $worksheet1->getHighestRow();
			for ($row = 9; $row <= 66; $row++) {
			$s1=$worksheet1->getCell('A'.$row)->getValue();
			$s2=$worksheet1->getCell('B'.$row)->getValue();
			$s3=$worksheet1->getCell('C'.$row)->getValue();
			$s4=$worksheet1->getCell('D'.$row)->getValue();
			$s5=$worksheet1->getCell('G'.$row)->getValue();
			$s6=$worksheet1->getCell('J'.$row)->getValue();		
			$sql="INSERT INTO lab(Sl_No,USN,Names,COMPONENT1,COMPONENT2,COMPONENT3) VALUES('".$s1."','".$s2."', '".$s3."', '".$s4."','".$s5."','".$s6."')";
			$stmt = $DB_con->prepare($sql);		
			if($stmt->execute())
			{
				$errMSG = "Registration Successful";				
			}	
		    }
			$worksheet2 = $excelObj->getSheet(4);
		    $lastRow2 = $worksheet1->getHighestRow();
			for ($row = 18; $row <= 22; $row++) {
			$s1=$worksheet2->getCell('C'.$row)->getValue();
			$s2=$worksheet2->getCell('D'.$row)->getValue();
			$s3=$worksheet2->getCell('E'.$row)->getValue();
			$s4=$worksheet2->getCell('F'.$row)->getValue();
			$sql="INSERT INTO mapping(Excellent,Good,Average,Poor) VALUES('".$s1."','".$s2."', '".$s3."', '".$s4."')";
			$stmt = $DB_con->prepare($sql);		
			if($stmt->execute())
			{
				$errMSG = "Registration Successful";				
			}	
			
			
			}
	
	}

}
if(isset($_POST['calculate'])) {

$result = mysql_query('SELECT SUM(value)From test1'); 

 echo $result;





}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Add Stock Details</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
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
				<td> <a href="index.html"><img src="images/mr.jpg" alt="LOGO" height="112" width="150"></a> </td>
				<td><font style="color:yellow;font-size:40px;font-family: Comic Sans MS, cursive, sans-serif;">
						RESULT ANALYSIS SYSTEM
					</font> </td>
				</tr>

					</table>

				</div>
				<div id="navigation">
					<ul>
					<li class="selected">
							<a href="customer_home.php">Home </a>
						</li>
						
						<li>
							<a href="index.html">Logout</a>
						</li>
					</ul>
				</div>
			</div>
			<div id="contents">		
					

						<div style=" margin-bottom:100px;margin-left:50px;margin-right:50px;background-image: url('newimages/bg_st2.jpg'); background-size: cover;height:500px;padding-top: 100px;">
							<h1 style="margin-left: 150px">upload ur data</h1>
							<form method="post" style="float: left;	color: #5a4535;	height: auto;width: 400px;border: 1px solid #5a4535;padding: 19px 19px 6px;margin-left: 150px;">
								
									<?php
									if(isset($errMSG)){
											?>
											
											<script> alert('<?php echo $errMSG; ?>');</script>
											
									<?php
									}
									?> 
									

								
								<table style="border-collapse: collapse;margin-left:60px">
																		
										<tr style="height: 50px;">											
											<td>User Name:</td>
											<td><input type="text" name="pname" class="txtfield" value="<?php echo $logged_in ?> "></td>
										</tr> 
								
										
										<tr style="height: 50px;">											
											<td>filename:</td>
											<td><input type="file" value="" name="qty" class="txtfield"></td>
										</tr> 
										

										
										<tr style="height: 50px;">
											
											<td colspan=2>
											<input type="submit" name="upload" value="upload" style="background: url(images/bg-navigation.png) no-repeat;height: 36px;width: 100px;border: 0;padding: 0;margin: 0;color:white;"> &nbsp;&nbsp;
											<input type="submit" name="calculate" value="calculate" style="background: url(images/bg-navigation.png) no-repeat;height: 36px;width: 100px;border: 0;padding: 0;margin: 0;color:white;">

<input type="submit" name="result" value="result" style="background: url(images/bg-navigation.png) no-repeat;height: 36px;width: 100px;border: 0;padding: 0;margin: 0;color:white;">

											</td>
											
										</tr>
									
								</table>
							</form>

						</div>
					
				
			</div>
		</div>

	</div>
</body>
</html>