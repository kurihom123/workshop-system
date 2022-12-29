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
	$errors=array();

	$conn=mysqli_connect("localhost","root","","dalali");

	if (isset($_POST['submit'])){
		$nida = mysqli_real_escape_string($conn, $_POST['nida']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);


        if (count($errors) == 0) {
        	$password = md5($password);
  	        $query = "SELECT * FROM user WHERE nida='$nida' AND password='$password'";
  	        $results=mysqli_query($conn, $query);
  	        $rows = mysqli_fetch_array($results);

  	        if (mysqli_num_rows($results) == 1){
  	        	

  	        	$_SESSION['first_name'] = $rows['first_name'];
          	        $_SESSION['second_name'] = $rows['second_name'];
          	        $_SESSION['last_name'] = $rows['last_name'];
          	        $_SESSION['simu'] = $rows['simu'];
          	        $_SESSION['nida'] = $rows['nida'];
          	        $_SESSION['email'] = $rows['email'];
          	        $_SESSION['wilaya'] = $rows['wilaya'];
          	        $_SESSION['kata'] =$rows['kata'];
          	        $_SESSION['cheo'] = $rows['cheo'];
                    $_SESSION['jinsia'] = $rows['jinsia'];
          	        $_SESSION['mtaa'] = $rows['mtaa'];
          	        $_SESSION['user_id'] = $rows['user_id'];
          	        $_SESSION['status'] = $rows['status'];
  	        	    $_SESSION['nida'] = $nida;
  	        	    $cheo2=$rows['cheo'];

  	        	    switch ($cheo2) {
           	case 'mpangaji':
           		header('location:mpangaji.php');
           		break;

           		// 	case '2':
           		// header('location:index.php');
           		// break;
           	
           	  default:
           		header('location:mwenyenyumba.php');
           		break;
             }

  	        	 // if ($cheo2 ="mpangaji") {
  	        	 //    	header('location:mpangaji.php');
  	        	 //    }

  	        	 // if ($cheo2 ="Mwenye_nyumba"){
  	        	 //    	header('location:mwenyenyumba.php');
  	        	 //    }

          	        

  	        }else{
  	        	array_push($errors, "umekosea no ya nida/neno siri");
  	        }
        }

	}


	  ?>
	<div class="nav">
		<a href="#">
			<p id="logo">AMS</p>
		</a>
		<div class="navbar-toggler" type="button" id="bar">
			<span class="toggler-icon"></span>
			<span class="toggler-icon"></span>
			<span class="toggler-icon"></span>
		</div>
		<div class="menu-bar">
			<ul class="menu-item">
				<li><a href="home.php">Home <i class="fa fa fa-home" aria-hidden="true"></i></a></li>
			
				
			</ul>
			
		</div>
		
	</div>
	<div class="login">
		<div class="center">
			<h1 style="font-size: 20px">Log In to start your session</h1>
			<div style="color: white; margin: 20px; font-weight: 500;background: #535CF1;text-align: center;" > <?php include('errors.php'); ?></div>
			<form method="post" action="login.php">
				<div class="txt_field">
					<input type="text" name="nida" required="required">
					<span></span>
					<label>Number ya nida</label>
						
				</div>
				<div class="txt_field">
					<input type="password" name="password" required="required">
					<span></span>
					<label>Neno Siri</label>

				</div>
				<input type="submit" name="submit" value="Ingia" id="sub">
				<div class="signup_link">
				<div class="pss"><a href="forgotpass.php"> I forget my password</a></div>
					Hauna account? <a href="registretion.php">Jisajiri</a>
					
				</div>
				
			</form>
			
		</div>
	
		
	</div>
	

</body>
</html>