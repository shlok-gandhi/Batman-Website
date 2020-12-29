<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="resources/bootstrap.min.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<script src="resources/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" href="resources/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="resources/css_form.css">
</head>
<body>
	<?php 
		session_start();
		if (isset($_SESSION['$errors'])) {
			$errors=$_SESSION['$errors'];
		}
		if (isset($_SESSION['$values'])) {
			$values=$_SESSION['$values'];
		}

		session_unset();
		
	?>

	<img src="resources/bg_img.jpg" class="img-responsive bg-img" width="100%">

	<div class="container">
	<div class="box">
	<div class="col-md-5">
		<div class="border-3d">
		<div class="border">
		<div class="border_in">
			<form action="w_2nd.php" method="post">
				<div class="logo"><img src="resources/batmanlogo.png" class="img-responsive" width="200px"></div>
				<div class="form-group">
					<h1>Registration</h1><hr> 
					<input class="form-control" placeholder="First Name" type="text" name="fname" value="<?php if (isset($values['fname'])) { echo $values['fname']; } ?>">
					<span class="errmsg"><?php if (isset($errors['fname'])) { echo $errors['fname']; } ?></span><br>


					<input class="form-control" placeholder="Last Name" type="text" name="lname" value="<?php if (isset($values['lname'])) { echo $values['lname']; } ?>">
					<span class="error_msg"><?php if (isset($errors['lname'])) { echo $errors['lname']; } ?></span><br>


					<div class="gender"><label>Gender:</label> &nbsp 
							<input class="radio-inline" type="radio" name="gender" value="Male"> Male 
						 	<input class="radio-inline" type="radio" name="gender" value="Female"> Female
						 	<input class="radio-inline" type="radio" name="gender" value="Others"> Others</div>
					<span class="error_msg"><?php if (isset($errors['gender'])) { echo $errors['gender']; } ?></span><br>


					<input class="form-control" placeholder="Date of Birth" type="date" name="dob" value="<?php if (isset($values['dob'])) { echo $values['dob']; } ?>">
					<span class="error_msg"><?php if (isset($errors['dob'])) { echo $errors['dob']; } ?></span><br>


					<input class="form-control" placeholder="City" type="text" name="city" value="<?php if (isset($values['city'])) { echo $values['city']; } ?>">
					<span class="error_msg"><?php if (isset($errors['city'])) { echo $errors['city']; } ?></span><br>


					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
		</div>
		</div>
	</div>
	</div>
	</div>

</body>
</html>