<?php
session_start();
$logged_in = $_SESSION["loggedin"];
require_once 'dbconfig.php';


if(isset($_POST['upload'])) {

$stmt = $DB_con->prepare("truncate table co1");$stmt->execute();
$stmt = $DB_con->prepare("truncate table co2");$stmt->execute();
$stmt = $DB_con->prepare("truncate table co3");$stmt->execute();
$stmt = $DB_con->prepare("truncate table lab");$stmt->execute();
$stmt = $DB_con->prepare("truncate table mapping");
$stmt->execute();
$stmt = $DB_con->prepare("truncate table result");
$stmt->execute();


		
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

$s4=$worksheet->getCell('E'.$row)->getValue();
$s5=$worksheet->getCell('J'.$row)->getValue();
$s6=$worksheet->getCell('N'.$row)->getValue();
$s7=$worksheet->getCell('Q'.$row)->getValue();
$s8=$worksheet->getCell('U'.$row)->getValue();
$s9=$worksheet->getCell('Y'.$row)->getValue();
$s10=$worksheet->getCell('AB'.$row)->getValue();
$s11=$worksheet->getCell('AF'.$row)->getValue();
$s12=$worksheet->getCell('AJ'.$row)->getValue();
$s13=$worksheet->getCell('AN'.$row)->getValue();
$sql="INSERT INTO co1(Sl_No,USN,Names,Q1a,Q1b,Q1c,Q1d,Q2a,Q2b,Q2c,Q2d,Q3a,Q3b) VALUES('".$s1."','".$s2."', '".$s3."', '".$s4."','".$s5."','".$s6."', '".$s7."','".$s8."', '".$s9."', '".$s10."', '".$s11."', '".$s12."', '".$s13."')";
$stmt = $DB_con->prepare($sql);		
if($stmt->execute())
			{
				$errMSG = "uploaded Successfully";				
			}	

		    }		
			for ($row = 14; $row <= 71; $row++) {
			$s1=$worksheet->getCell('A'.$row)->getValue();
			$s2=$worksheet->getCell('B'.$row)->getValue();
			$s3=$worksheet->getCell('C'.$row)->getValue();
			$s4=$worksheet->getCell('F'.$row)->getValue();
			$s5=$worksheet->getCell('I'.$row)->getValue();
			$s6=$worksheet->getCell('M'.$row)->getValue();
			$s7=$worksheet->getCell('AC'.$row)->getValue();
			$s8=$worksheet->getCell('AG'.$row)->getValue();
			$s9=$worksheet->getCell('AK'.$row)->getValue();
			$s10=$worksheet->getCell('AN'.$row)->getValue();
			
			$sql="INSERT INTO co2(Sl_No,USN,Names,Q1a,Q1b,Q1c,Q1d,Q2a,Q2b,Q2c) VALUES('".$s1."','".$s2."', '".$s3."', '".$s4."','".$s5."','".$s6."', '".$s7."','".$s8."', '".$s9."', '".$s10."')";
			$stmt = $DB_con->prepare($sql);

           if($stmt->execute())
			{
				$errMSG = "uploaded Successfully";			
			}	

		    }
			
			for ($row = 14; $row <= 71; $row++) {

			$s1=$worksheet->getCell('A'.$row)->getValue();
			$s2=$worksheet->getCell('B'.$row)->getValue();
			$s3=$worksheet->getCell('C'.$row)->getValue();
			$s4=$worksheet->getCell('R'.$row)->getValue();
			$s5=$worksheet->getCell('V'.$row)->getValue();
			$s6=$worksheet->getCell('Z'.$row)->getValue();
			$s7=$worksheet->getCell('AD'.$row)->getValue();
			$s8=$worksheet->getCell('AH'.$row)->getValue();
			$s9=$worksheet->getCell('AL'.$row)->getValue();
			$s10=$worksheet->getCell('AN'.$row)->getValue();
			$s11=$worksheet->getCell('AU'.$row)->getValue();
			
			
			$sql="INSERT INTO co3(Sl_No,USN,Names,Q1a,Q1b,Q1c,Q1d,Q2a,Q2b,Q2c,GRADE) VALUES('".$s1."','".$s2."', '".$s3."', '".$s4."','".$s5."','".$s6."', '".$s7."','".$s8."', '".$s9."', '".$s10."', '".$s11."')";
			$stmt = $DB_con->prepare($sql);		
			if($stmt->execute())
			{
				$errMSG = "uploaded Successfully";			
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
				$errMSG = "uploaded Successfully";			
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
				$errMSG = "uploaded Successfully";		
			}	
			
			
			}
	
	}

}
if(isset($_POST['calculate'])) {


$total1=0;
$total2=0;
$total3=0;
$total4=0;
$total5=0;
$total6=0;
$total7=0;
$total8=0;
$total9=0;
$total10=0;
$total11=0;
$total12=0;



$sql="SELECT * FROM test1";
$stmt1 = $DB_con->prepare('SELECT * FROM co1');
$stmt1->execute();	
while($row1=$stmt1->fetch(PDO::FETCH_ASSOC))
{
if(($row1['Q1a']!="NA")||($row1['Q1a']!="AB"))
{									
if(($row1['Q1b']!="NA")||($row1['Q1b']!="AB"))
{
if(($row1['Q1c']!="NA")||($row1['Q1c']!="AB"))
{
if(($row1['Q1d']!="NA")||($row1['Q1d']!="AB"))
{
if(($row1['Q2a']!="NA")||($row1['Q2a']!="AB"))
{									
if(($row1['Q2b']!="NA")||($row1['Q2b']!="AB"))
{
if(($row1['Q2c']!="NA")||($row1['Q2c']!="AB"))
{
if(($row1['Q2d']!="NA")||($row1['Q2d']!="AB"))
{
if(($row1['Q3a']!="NA")||($row1['Q3a']!="AB"))
{
if(($row1['Q3b']!="NA")||($row1['Q3b']!="AB"))
{
if($row1['Q1a']>2)
{
$total1+=$row1['Q1a'] ;	
}

if($row1['Q1b']>3.5)
{
$total2+=$row1['Q1b'] ;	
}

if($row1['Q1c']>2)
{
$total3+=$row1['Q1c'] ;	
}

if($row1['Q1d']>3.9)
{
$total4+=$row1['Q1d'] ;	
}

if($row1['Q2a']>3.5)
{
$total5+=$row1['Q2a'] ;	
}

if($row1['Q2b']>3.5)
{
$total6+=$row1['Q2b'] ;	
}

if($row1['Q2c']>3.5)
{
$total7+=$row1['Q2c'] ;	
}
if($row1['Q2d']>3.9)
{
$total8+=$row1['Q2d'] ;	
}

if($row1['Q3a']>3.9)
{
$total9+=$row1['Q3a'] ;	
}
if($row1['Q3b']>2)
{
$total10+=$row1['Q3b'] ;	
}

}
}
}
}
}
}
}
}
}
}
}





$stotal1=((($total1/35)/5)*100);
$stotal2=((($total2/29)/6)*100);
$stotal3=((($total3/40)/5)*100);

$stotal4=((($total4/34)/6)*100);

$stotal5=((($total5/35)/6)*100);

$stotal6=((($total6/14)/6)*100);

$stotal7=((($total7/16)/6)*100);


$stotal8=((($total8/28)/6)*100);
$stotal9=((($total9/11)/6)*100);
$stotal10=((($total10/58)/5)*100);

$m=10;
$final=$stotal1+$stotal2+$stotal3+$stotal4+$stotal5+$stotal6+$stotal7+$stotal8+$stotal9+$stotal10;
$co1=$final/$m;

$ctotal1=0;
$ctotal2=0;
$ctotal3=0;
$ctotal4=0;
$ctotal5=0;
$ctotal6=0;
$ctotal7=0;
$stmt1 = $DB_con->prepare('SELECT * FROM co2');
$stmt1->execute();
while($row1=$stmt1->fetch(PDO::FETCH_ASSOC))
{
if(($row1['Q1a']!="NA")||($row1['Q1a']!="AB"))
{									
if(($row1['Q1b']!="NA")||($row1['Q1b']!="AB"))
{
if(($row1['Q1c']!="NA")||($row1['Q1c']!="AB"))
{
if(($row1['Q1d']!="NA")||($row1['Q1d']!="AB"))
{
if(($row1['Q2a']!="NA")||($row1['Q2a']!="AB"))
{									
if(($row1['Q2b']!="NA")||($row1['Q2b']!="AB"))
{
if(($row1['Q2c']!="NA")||($row1['Q2c']!="AB"))
{

if($row1['Q1a']>5)
{
$ctotal1+=$row1['Q1a'] ;	
}

if($row1['Q1b']>4.7)
{
$ctotal2+=$row1['Q1b'] ;	
}

if($row1['Q1c']>5)
{
$ctotal3+=$row1['Q1c'] ;	
}

if($row1['Q1d']>3.9)
{
$ctotal4+=$row1['Q1d'] ;	
}

if($row1['Q2a']>3.9)
{
$ctotal5+=$row1['Q2a'] ;	
}

if($row1['Q2b']>3.5)
{
$ctotal6+=$row1['Q2b'] ;	
}

if($row1['Q2c']>2.9)
{
$ctotal7+=$row1['Q2c'] ;	
}
}
}
}
}
}
}
}
}
$sstotal1=((($ctotal1/35)/10)*100);
$sstotal2=((($ctotal2/29)/8)*100);
$sstotal3=((($ctotal3/38)/10)*100);

$sstotal4=((($ctotal4/19)/6)*100);

$sstotal5=((($ctotal5/28)/6)*100);

$sstotal6=((($ctotal6/13)/6)*100);

$sstotal7=((($ctotal7/58)/5)*100);

$m1=7;
$final1=$sstotal1+$sstotal2+$sstotal3+$sstotal4+$sstotal5+$sstotal6+$sstotal7;
$co2=$final1/$m1;

$cstotal1=0;
$cstotal2=0;
$cstotal3=0;
$cstotal4=0;
$cstotal5=0;
$cstotal6=0;
$cstotal7=0;
$stmt1 = $DB_con->prepare('SELECT * FROM co3');
$stmt1->execute();
while($row1=$stmt1->fetch(PDO::FETCH_ASSOC))
{
if(($row1['Q1a']!="NA")||($row1['Q1a']!="AB"))
{									
if(($row1['Q1b']!="NA")||($row1['Q1b']!="AB"))
{
if(($row1['Q1c']!="NA")||($row1['Q1c']!="AB"))
{
if(($row1['Q1d']!="NA")||($row1['Q1d']!="AB"))
{
if(($row1['Q2a']!="NA")||($row1['Q2a']!="AB"))
{									
if(($row1['Q2b']!="NA")||($row1['Q2b']!="AB"))
{
if(($row1['Q2c']!="NA")||($row1['Q2c']!="AB"))
{

if($row1['Q1a']>5.9)
{
$cstotal1+=$row1['Q1a'] ;	
}

if($row1['Q1b']>5.9)
{
$cstotal2+=$row1['Q1b'] ;	
}

if($row1['Q1c']>5.9)
{
$cstotal3+=$row1['Q1c'] ;	
}

if($row1['Q1d']>4.9)
{
$cstotal4+=$row1['Q1d'] ;	
}

if($row1['Q2a']>4.9)
{
$cstotal5+=$row1['Q2a'] ;	
}

if($row1['Q2b']>4.7)
{
$cstotal6+=$row1['Q2b'] ;	
}

if($row1['Q2c']>2.9)
{
$cstotal7+=$row1['Q2c'] ;	
}
}
}
}
}
}
}
}
}
$ssstotal1=((($cstotal1/32)/10)*100);
$ssstotal2=((($cstotal2/34)/10)*100);
$ssstotal3=((($cstotal3/14)/10)*100);

$ssstotal4=((($cstotal4/16)/8)*100);

$ssstotal5=((($cstotal5/23)/8)*100);

$ssstotal6=((($cstotal6/11)/8)*100);

$ssstotal7=((($cstotal7/58)/5)*100);

$m11=7;
$final11=$ssstotal1+$ssstotal2+$ssstotal3+$ssstotal4+$ssstotal5+$ssstotal6+$ssstotal7;
$co3=$final11/$m11;

$ltotal1=0;
$ltotal2=0;
$ltotal3=0;
$stmt1 = $DB_con->prepare('SELECT * FROM lab');
$stmt1->execute();
while($row1=$stmt1->fetch(PDO::FETCH_ASSOC))
{
if($row1['COMPONENT1']>4.9)
{
$ltotal1+=$row1['COMPONENT1'] ;	
}

if($row1['COMPONENT2']>2.4)
{
$ltotal2+=$row1['COMPONENT2'] ;	
}

if($row1['COMPONENT3']>4.9)
{
$ltotal3+=$row1['COMPONENT3'] ;	
}

}
$lstotal1=((($ltotal1/58)/10)*100);
$lstotal2=((($ltotal2/58)/5)*100);
$lstotal3=((($ltotal3/58)/10)*100);

$co4=(($lstotal1+$lstotal2)/2);

$sql="INSERT INTO result(co1,co2,co3,co4,co5) VALUES('".$co1."','".$co2."', '".$co3."', '".$co4."','".$lstotal3."')";
			$stmt = $DB_con->prepare($sql);		
			if($stmt->execute())
			{
                 $errMSG = "calculated Successfully";		
                }
$grade=86.37931034;
       $sql="INSERT INTO result(co1,co2,co3,co4,co5) VALUES('".$grade."','".$grade."', '".$grade."', '".$grade."','".$grade."')";
			$stmt = $DB_con->prepare($sql);		
			if($stmt->execute())
			{
                 $errMSG = "calculated Successfully";		
                }

$MCO1=0;
$MCO2=O;
$MCO3=0;

$i=0;
$data = array();
$stmt1 = $DB_con->prepare('SELECT * FROM mapping');
$stmt1->execute();
while($row1=$stmt1->fetch(PDO::FETCH_ASSOC))
{

$MCO1=(($row1['Excellent']*4)+($row1['Good']*3)+($row1['Average']*2))/($row1['Excellent']+$row1['Good']+$row1['Average']);
//echo "OP:".round(($MCO1/4)*100);
$data[$i]=round(($MCO1/4)*100);
$i++;
}

$sql="INSERT INTO result(co1,co2,co3,co4,co5) VALUES('".$data[0]."','".$data[1]."', '".$data[2]."', '".$data[3]."','".$data[4]."')";
			$stmt = $DB_con->prepare($sql);		
			if($stmt->execute())
			    {
                 $errMSG = "calculated Successfully";		
                }
				$c1=($co1+$grade)/2;
				$c2=($co2+$grade)/2;
				$c3=($co3+$grade)/2;
				$c4=($co4+$grade)/2;
				$c5=($lstotal3+$grade)/2;
				
$sql="INSERT INTO result(co1,co2,co3,co4,co5) VALUES('".$c1."','".$c2."', '".$c3."', '".$c4."','".$c5."')";
			$stmt = $DB_con->prepare($sql);		
			if($stmt->execute())
			{
                 $errMSG = "calculated Successful";		
                }

                     $c11=(($co1*0.8)+($grade*0.1)+($data[0]*0.1));
				$c12=(($co2*0.8)+($grade*0.1)+($data[1]*0.1));

				$c13=(($co3*0.8)+($grade*0.1)+($data[2]*0.1));

				$c14=(($co4*0.8)+($grade*0.1)+($data[3]*0.1));

				$c15=(($lstotal3*0.8)+($grade*0.1)+($data[4]*0.1));

$sql="INSERT INTO result(co1,co2,co3,co4,co5) VALUES('".$c11."','".$c12."', '".$c13."', '".$c14."','".$c15."')";
			$stmt = $DB_con->prepare($sql);		
			if($stmt->execute())
			{
                 $errMSG = "calculated Successfully";		
                }


}

if(isset($_POST['result'])) {

header("Location: view.php"); /* Redirect browser */
		exit();

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
				<td> <a href="index.html"><img src="images/Logofinal.png" alt="LOGO" height="112" width="150"></a> </td>
				<td><font style="color:white;font-size:53px;font-family:courier;">
						SCRIPT ANALYSIS SYSTEM
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
					

						<div style=" margin-bottom:100px;margin-left:50px;margin-right:50px;background-image: url('newimages/bg_st2.jpg'); background-size: cover;height:400px;padding-top: 60px;">
							<h1 style="margin-left: 150px">Upload your Data</h1>
							<form method="post" style="float: left;	color: #5a4535;	height: auto;width: 400px;border: 1px solid #5a4535;padding: 20px ;margin-left: 150px;">
								
									<?php
									if(isset($errMSG)){
											?>
											
											<script> alert('<?php echo $errMSG; ?>');</script>
											
									<?php
									}
									?> 
									

								
								<table style="border-collapse: collapse;margin-left:60px">
																		
										<tr style="height: 50px;">											
											<td>User Name : </td>
											<td><input type="text" name="pname" class="txtfield" value="<?php echo $logged_in ?> "></td>
										</tr> 
								
										
										<tr style="height: 50px;">											
											<td>Filename : </td>
											<td><input type="file" value="" name="qty" class="txtfield"></td>
										</tr> 
										

										
										<tr style="height: 80px;">
											
											<td colspan=2>
											<input type="submit" name="upload" value="Upload" style="background: url(images/bg-navigation.png) no-repeat;height: 36px;width: 100px;border: 0;padding: 0;margin: 0;color:white;"> &nbsp;&nbsp;
											<input type="submit" name="calculate" value="Calculate" style="background: url(images/bg-navigation.png) no-repeat;height: 36px;width: 100px;border: 0;padding: 0;margin: 0;color:white;">

<input type="submit" name="result" value="Result" style="background: url(images/bg-navigation.png) no-repeat;height: 36px;width: 100px;border: 0;padding: 0;margin: 0;color:white;">

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