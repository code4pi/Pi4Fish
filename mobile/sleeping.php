<!DOCTYPE html>
<html>
<head>
<title>JQuery Cycle Plugin - Basic Demo</title>
<style type="text/css">
html {background-color: #000;}
.slideshow { height: 100%; width: 100%; margin: auto }
.slideshow img { padding: 0px; border: 0px solid #ccc; background-color: #eee; }
</style>
<!-- include jQuery library -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<!-- include Cycle plugin -->
<script type="text/javascript" src="http://malsup.github.com/jquery.cycle.all.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.slideshow').cycle({
		fx: 'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
		delay:  4000 
	});
});
</script>
</head>
<body>
	<div class="slideshow">
	<a href="index.php"><img src="jayfishslide.jpg" width="100%" /></a>
	<a href="index.php"><img src="jayfishslide1.jpg" width="100%"  /></a>
	<a href="index.php"><img src="jayfishslide2.jpg" width="100%"  /></a>
	<a href="index.php"><img src="jayfishslide3.jpg" width="100%"  /></a>
	<a href="index.php"><img src="jayfishslide4.jpg" width="100%"  /></a>
	<a href="index.php"><img src="jayfishslide5.jpg" width="100%"  /></a>
	<a href="index.php"><img src="jayfishslide6.jpg" width="100%"  /></a>
	<a href="index.php"><img src="jayfishslide7.jpg" width="100%"  /></a>

	
	</div>
</body>
</html>