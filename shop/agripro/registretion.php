<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
	<title>AMS</title>

	<link rel="stylesheet" type="text/css" href="stylee.css">
	
</head>
<body>

	<?php 
	session_start();
	$nida="";
	$simu="";
	$errors=array();

	$conn=mysqli_connect("localhost","root","","dalali");

	if (isset($_POST['submit'])){
		$kwanza = mysqli_real_escape_string($conn, $_POST['kwanza']);
		$pili = mysqli_real_escape_string($conn, $_POST['kati']);
		$ukoo = mysqli_real_escape_string($conn, $_POST['ukoo']);
		$simu = mysqli_real_escape_string($conn, $_POST['simu']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$nida = mysqli_real_escape_string($conn, $_POST['nida']);
		$wilaya = mysqli_real_escape_string($conn, $_POST['wilaya']);
		$kata = mysqli_real_escape_string($conn, $_POST['kata']);
		$mtaa = mysqli_real_escape_string($conn, $_POST['mtaa']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$password2 = mysqli_real_escape_string($conn, $_POST['password2']);
		$jinsia= mysqli_real_escape_string($conn, $_POST['jinsia']);
		$cheo = mysqli_real_escape_string($conn, $_POST['cheo']);


		 if ($password != $password2) {
		 	array_push($errors, "Neno siri hazifanani");
		 	}

		 $user_check_query = "SELECT * FROM user WHERE nida='$nida' OR simu='$simu'";
		 $result = mysqli_query($conn, $user_check_query);
		 if (mysqli_num_rows($result)>0) {
		 	array_push($errors, "Hii number ya nida au ya simu imeshatumika");
		 }

          if (count($errors) == 0) {
          	 $password1 = md5($password);
          	$query = "INSERT INTO user (first_name,second_name, last_name,simu, Nida, email, wilaya, kata, mtaa, jinsia, password, cheo) 
          	VALUES('$kwanza', '$pili', '$ukoo','$simu', '$nida', '$email','$wilaya', '$kata', '$mtaa','$jinsia', '".md5($password)."', '$cheo')";
          $majibu=mysqli_query($conn, $query);
          	$_SESSION['first_name'] = $kwanza;
          	$_SESSION['second_name'] = $pili;
          	$_SESSION['last_name'] = $ukoo;
          	$_SESSION['simu'] = $simu;
          	$_SESSION['nida'] = $nida;
          	$_SESSION['email'] = $email;
          	$_SESSION['wilaya'] = $wilaya;
          	$_SESSION['kata'] = $kata;
          	$_SESSION['cheo'] = $cheo;
          	$_SESSION['jinsia'] = $jinsia;
          	$_SESSION['mtaa'] = $mtaa;

          	 if ($cheo=="mpangaji") {
  	        	    	header('location:mpangaji.php');
  	        	    }else{
  	        	    	header('location:mwenyenyumba.php');
  	        	    }
          }

	}





	?>
	<div class="nav">
		<a href="#">
			<p id="logo">AMS</p>
		</a>
		<div class="menu-bar">
			<ul class="menu-item">
				<li><a href="home.php">Home <i class="fa fa fa-home" aria-hidden="true"></i></a></li>
			
				
			</ul>
			
		</div>
		
	</div>

		<div class="containeri">
			<div class="title">Customer's Entry Form</div>
			<div style="color: white; margin: 20px; font-weight: 500;background: #535CF1;text-align: center;" > <?php include('errors.php'); ?></div>
			
			<form action="registretion.php" method="post">
				<div class="user-details">
					<div class="input-box">
						<span class="details">Jina kamili</span>
						<input type="text" pattern="[A-Za-z]{2,}" title="Zinaitajika herufi tuu!!" name="kwanza" placeholder="eg Asha" required="required">
					</div>
					<div class="input-box">
						<span class="details">Customer's Contact</span>
						<input type="text" pattern="[0-9]{10}" title="ingiza number sahihi" name="simu" placeholder="eg 0656788456" required="required">
					</div>
					<div class="input-box">
						<span class="details">Email</span>
						<input type="email" name="email" placeholder="eg Asha@gmail.com">
					</div>
					<div class="input-box">
						<span class="details">No ya NIDA</span>
						<input type="text" name="nida" placeholder="eg 2000030467300459" required="required">
					</div>
					<div class="input-box">
						<span class="details">Customer's Address</span>
						<input type="text" pattern="[A-Za-z]{2,}" title="Zinaitajika herufi tuu!!" name="wilaya" placeholder="eg Mvomero" required="required">
					</div>
					<div class="input-box">
						<span class="details">Apartment Number</span>
						<input type="text"  pattern="[A-Za-z]{2,}" title="Zinaitajika herufi tuu!!"name="kata" placeholder="eg Mzumbe" required="required">
					</div>
					<div class="input-box">
						<span class="details">Password</span>
						<input type="password"  title="Neno siri lazima liwe na herufi na number na ziwe zaidi ya nane" name="password"  required="required">
					</div>
					<div class="input-box">
						<span class="details">Confirm Password</span>
						<input type="password" name="password2" placeholder="eg Asha" required="required">
					</div>

					<div class="jinsii">
						<span class="gender-title">Gender</span>
						<div class="category">
						<input type="radio" id="rad1" name="jinsia" value="Me" required="required"checked="checked">
						<label for="rad1">Male</label>
						<input type="radio" id="rad2" name="jinsia" value="ke" required="required">
						<label for="rad2">Female</label>
						</div>
					</div>
				
				</div>
					 
					<div class="Cheoo">
						<span class="gender-title">Wewe ni Nani</span>
						<div class="category">
						<input type="radio" id="rad1" name="cheo" value="Mwenye_nyumba" required="required" checked="checked">
						<label for="rad1">Mwenye nyumba</label>
						<input type="radio" id="rad2" name="cheo" value="mpangaji" required="required">
						<label for="rad2">Mpangaji</label>
						</div>
					</div>
				<div class="button">
					<input type="submit" name="submit" value="Jisajiri">
					<div class="signup_link2">
					Usha jisajiri? <a href="login.php">Ingia</a>
					
				    </div>
				</div>
			</form>
		</div>

</body>
</html>