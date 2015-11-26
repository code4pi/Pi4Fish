<!-- <!DOCTYPE html> -->
<html>

	<head>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap-confirmation.js"></script>


		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/custom.css">
		<link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
			<style type="text/css">
					html {
						    background: url(images/wallpaper.jpg) no-repeat center center fixed; 
						    -webkit-background-size: cover;
						    -moz-background-size: cover;
						    -o-background-size: cover;
						    background-size: cover;

						}

			body { 
				background: transparent; !important;?>;
				color: white;
				}

			</style>
	</head>
	<body>
	<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img src="images/logo.png" width="40"></a>
    </div>
    </nav>

	
		<?php
		include "connection.php";

		print 
		'
		<div align="center">
		<table class="plaindark" >
		<div style="width:340px;margin-top:10%;"class="plaindark_header"><div class="customfont" align="center">Jay Fish Login</div></div>
		<td style="width:340px;margin-top:15%;">
		<div class="form-group">
		<form action="login-submit.php" method="post">
		<div align="center"><img src="images/logo.png" width="200"></div>
		<br>
		<div class="customfontsml">Passcode</div>
		<input placeholder="Please Enter Passcode" id="passcode" class="form-control" name="code">
		</div>
		<div align="right"><button class="btn btn-default" type="submit">Login</button></div>
		</form>
		</div>
		</td>
		</table>
		</div>
		';

		?>
	</body>
</html>