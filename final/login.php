<?php
require_once 'dbconfig.php';
	if(isset($_POST['login'])) {
	
	$un = $_POST['un'];
	$pwd = $_POST['pwd'];
	
	
	if($un=="") {
		$errMSG = "Please Enter Valid User Name";
	}
	else if($pwd=="") {
		$errMSG = "Please Enter Valid Password";
	}	
	else if($un=="" && $pwd=="") {
		$errMSG = "Please Enter Valid User Name & Password";
	}
	else {
		if($un=="admin" && $pwd=="admin" && $role=="admin" ) {
			header("Location: admin_home.php"); /* Redirect browser */
			exit();
		}		
		else {
		$existance = "NO";
				$stmt1 = $DB_con->prepare('SELECT * FROM user');
				$stmt1->execute();	
				
					while($row1=$stmt1->fetch(PDO::FETCH_ASSOC))		{
					if($un==$row1['userid'] && $pwd==$row1['pass']) {
					$existance = "YES";
						session_start();
						$_SESSION["loggedin"] = $un;
					}			
					}
					if($existance == "YES") {
						
							header("Location:upload.php"); /* Redirect browser */
							exit();
						}
						
					
					else {
						$errMSG = "Invalid User Credentials";
					}
		}
	}
	}
	
	if(isset($_POST['clear'])) {
		header("Location: login.php"); /* Redirect browser */
		exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Login Form</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<style>
	html { overflow-y: hidden; }
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
							<a href="index.html">Home</a>
						</li>

						<li class="selected">
							<a href="login.php">Login</a>
						</li>
						
						
					</ul>
				</div>
			</div>
							
<div id="contents">
						<div style="margin-left:50px;margin-right:50px;background-image: url('newimages/bg6.png');height:370px;padding-top: 100px;">
							<h1 style="margin-left: 350px">Sign In</h1>
							<form method="post"  style="float: left;color: #5a4535;	height: 200px; width: 400px;border: 1px solid #5a4535;padding: 19px 19px 6px;margin-left: 300px;">
								
									<?php
									if(isset($errMSG)){
											?>
											<script> alert('<?php echo $errMSG; ?>');</script>
											<?php
									}
									?> 
								
								<table style="border-collapse: collapse;margin-left:70px">
																		
										<tr style="height: 50px;">
											
											<td>User Name:</td>
											<td><input type="text" value="" name="un" class="txtfield"></td>
										</tr> 
										
										<tr style="height: 50px;">
											<td>Password:</td>
											<td><input type="password" value="" name="pwd" class="txtfield"></td>
										</tr> 
										
																		

										
										<tr style="height: 50px;">
											
											<td colspan=2>
											<input type="submit" name="login" value="Log in" style="background: url(images/bg-navigation.png) no-repeat;height: 36px;width: 120px;border: 0;padding: 0;margin: 0;color:white;"> &nbsp;&nbsp;
											<input type="submit" name="clear" value="Clear" style="background: url(images/bg-navigation.png) no-repeat;height: 36px;width: 120px;border: 0;padding: 0;margin: 0;color:white;">
											
											</td>
											
										</tr>
										
																				<tr style="height: 50px;">
	<td></td>										
											<td><a href="registration.php">Create Account</a></td>
											
											
										</tr>
										
										

									
								</table>
							</form>

						</div>
						</div>
		
		</div>

	</div>
</body>
</html>