<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Batman's World</title>
	<link rel="stylesheet" type="text/css" href="resources/bootstrap.min.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<script src="resources/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" href="resources/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="resources/css_form.css">
</head>
<body>

	<?php 

		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$gender=$_POST['gender'];
		$dob=$_POST['dob'];
		$city=$_POST['city'];


		$errors=[];
		$values=[];

		//Firstname
	if (empty($_POST['fname'])) {
		$errors['fname']="*Required";
	}
	if (preg_match("/^[a-zA-Z ]*$/",$_POST['fname'])) {
		$values['fname']=$_POST['fname'];
	}
	else{
		$errors['fname']="Invalid Firstname";
	}

		//Lastname
	if (empty($_POST['lname'])) {
		$errors['lname']="*Required";
	}
	if (preg_match("/^[a-zA-Z ]*$/",$_POST['lname'])) {
		$values['lname']=$_POST['lname'];
	}
	else{
		$errors['lname']="Invalid Lastname";
	}

		//Gender
	if (empty($_POST['gender'])) {
		$errors['gender']="*Required";
	}else{
		$values['gender']=$_POST['gender'];
	}

		//Date of Birth
	if (empty($_POST['dob'])) {
		$errors['dob']="*Required";
	}else{
		$values['dob']=$_POST['dob'];
	}

		//City
	if (empty($_POST['city'])) {
		$errors['city']="*Required";
	}
	if (preg_match("/^[a-zA-Z ]*$/",$_POST['city'])) {
		$values['city']=$_POST['city'];
	}
	else{
		$errors['city']="Invalid City name";
	}
	

	if (count($errors)>0)
	{
		session_start();
		$_SESSION['$errors']=$errors;
		$_SESSION['$values']=$values;
		header("location:Registration_batman.php");
	}else
	{ 				//connecting and adding values to database
			$servername="localhost";
			$username="root";
			$password="";
			$database_name="merchandise_data";
			try
			{
				$conn = new PDO("mysql:host=".$servername.";dbname=".$database_name,$username,$password);
				$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			}			
			catch(Exception $e)
			{
				echo "Connection Failed". $e->getmessage();
			}
					//inserting values in database table
			{
				$sql = "INSERT INTO Batman_users values(:fname, :lname, :gender, :dob, :city )";
				$stmt = $conn->prepare($sql);	//Prepared Statement 
				$stmt->execute(['fname'=>$fname, 'lname'=>$lname, 'gender'=>$gender, 'dob'=>$dob, 'city'=>$city]);
			}
		$conn=null;
	}

	?>
<section>
<nav class="navbar navbar-inverse">
	<div class="container">
		<div class="navbar-logo">
			<img src="resources/batmanlogo.png" class="img-responsive headerlogo" >
		</div>
	</div>		
</nav>	

		<div class="container">

				<div class="col-md-12">	
					<h1><p>Welcome to the World of Batman</p></h1>
						
							<h3><b>Verify your details</b></h3>
							<h4>Firstname : <?php echo $fname; ?><br>

							Lastname : <?php echo $lname; ?><br>

							Gender : <?php echo $gender; ?><br>

							Date of Birth : <?php echo $dob; ?><br>

							City &nbsp : <?php echo $city; ?><br><br>

							*Just check your details you mentioned.<br><br> 
							<a href="webpages/Home-Page.html">
							<button type="button" class="btn btn-primary">Ok</button></a>
						</h4>
				</div>
	
		</div>		

	<footer>
			<img src="resources/batmanlogo.png" class="img-responsive footerimg" width="100px">
			<h4>Copyright Batman Corp.</h4>
	</footer>
</section>	
</body>
</html>