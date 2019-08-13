<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NICHE</title>
     <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" href="css/main.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="login-box">
		<div class="image-box">
			<div class="login_heading">
				<p>DISCOVER YOUR NICHE new test</p>
			</div>
			<p class="login_desc">A simple step by step tool to help you narrow down on what you will teach, what will you be an expert on.</p>
		</div>
		<div class="text-box">
			<div class="sec-text">
				<div class="login">LOGIN</div>
				<form method="post" action="login.php" style="text-align: center;">
					
						<label for="fname"></label>
						<input class="logininput" type="text" placeholder="Username"  name="email" required="">
						<label for="lname"></label>
						<input class="logininput" type="password" placeholder="Password"  name="password">
						<input class="submit_button" name="login_user" type="submit" value="LOGIN">
						 <?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "<span style='font-size: 17px;    margin-top: 16px;    display: block;    color: #f30707;'>$error</span>";
                    }
                ?>  
				</form>
				
			</div>
		</div>
	</div>
</body>

</body>
</html>