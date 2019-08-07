<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
	session_start();
    
?>
<!DOCTYPE HTML>
<html>
<head>
<title>TPhE</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="../css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="../css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="../css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="../css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->

<!-- webfonts -->
<link href='//fonts.googleapis.com/css?family=Nunito:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'>
<!--// webfonts --> 
 <!-- Meters graphs -->
<script src="../js/jquery-1.11.1.min.js"></script>
<!-- Placed js at the end of the document so the pages load faster -->
</head> 
   
 <body class="sticky-header left-side-collapsed">
    <section>
    <!-- left side start-->
		<div class="left-side sticky-left-side">

			<!--logo and iconic logo start-->
			<div class="logo">
				<a href="_aluno.php"><img src="../images/home.png" alt="" /><span>Home</span></a>
			</div>
			<div class="logo-icon text-center">
				<a href="_aluno.php"><img src="../images/home.png" alt="" /></a>
			</div>

			<?php include('_menu.php'); ?> 
		</div>
	<!-- left side end-->
	
		<!-- main content start-->
		<div class="main-content">
			<!-- header-starts -->
			<div class="header-section">
				<div class="move-button">
					<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
				</div>
				<div class="top-logo">
					<h1><a href="_aluno.php">TPhE</a></h1>
				</div>
				
				<div class="clearfix"> </div>
			</div>
			<div >
				<h4><?php echo '<br/>'.$_SESSION['UsuarioNome'].' ('.$_SESSION['UsuarioID'].')'.', bem vindo à página do Aluno!';  ?></h4>
			</div>
			<div id="page-wrapper">
				<div class="three-grids">
					<div class="three-grid">
						<div class="three-grid-info">
							<div class="three-grid-text">
								<div class="three-grid-text-heading">
									<h3>Faça a leitura do QRCode ou Digite os dados:</h3>
									<h5><br/>(Solicite ao seu professor)</h5>
								</div>
								<div>
									<form action="painelquiz.php" method="GET">
										<br/>
										<label>Identificador da turma:</label>
										<input type="number" name="turma" id="turma"><br/>
										<label>Identificador do quiz:</label>
										<input type="number" name="quiz" id="quiz">
										 
										<button type="submit" class="btn btn-default">Gravar</button>												
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
				
		</div>
			
			<!--footer section start-->
		<footer>
			<div class="footer-left">
				<ul>
					<li><a href="contact.html">Contact</a></li>
					<li><a href="#"  data-toggle="modal" data-target="#myModal">Feedback</a></li>
					<li><a href="about.html">About Us</a></li>
					<li><a href="privacy.html">Privacy Policy</a></li>
					<li><a href="terms.html">Terms & conditions</a></li>
				</ul>
			</div>
			<div class="copyright">
				<p>© 2016 Live Info. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">W3layouts.</a></p>
			</div>
			<div class="social">
				<ul>
					<li><a href="#"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa fa-rss"></i></a></li>
					<li><a href="#"><i class="fa fa-vk"></i></a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</footer>
        <!--footer section end-->
		</div>
        

      <!-- main content end-->
	</section>
	<script src="../js/modernizr.custom.js"></script>
	<!--pop-up-->
	<script src="../js/menu_jquery.js"></script>
	<!--//pop-up-->	
	<script src="../js/jquery.nicescroll.js"></script>
	<script src="../js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>
	<!--pop-up-->
	<script src="../js/menu_jquery.js"></script>
	<!--//pop-up-->	
	<!-- clock-bottom -->
	<script type="text/javascript">
	$(document).ready(function() {
	// Create two variable with the names of the months and days in an array
	var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; 
	var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

	// Create a newDate() object
	var newDate = new Date();
	// Extract the current date from Date object
	newDate.setDate(newDate.getDate());
	// Output the day, date, month and year    
	$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

	setInterval( function() {
		// Create a newDate() object and extract the seconds of the current time on the visitor's
		var seconds = new Date().getSeconds();
		// Add a leading zero to seconds value
		$("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
		},1000);
		
	setInterval( function() {
		// Create a newDate() object and extract the minutes of the current time on the visitor's
		var minutes = new Date().getMinutes();
		// Add a leading zero to the minutes value
		$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
		},1000);
		
	setInterval( function() {
		// Create a newDate() object and extract the hours of the current time on the visitor's
		var hours = new Date().getHours();
		// Add a leading zero to the hours value
		$("#hours").html(( hours < 10 ? "0" : "" ) + hours);
		}, 1000);
		
	}); 
	</script>
	<!-- clock-bottom -->
	<!-- ResponsiveTabs -->
	<script src="../js/easyResponsiveTabs.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion           
				width: 'auto', //auto or any width like 600px
				fit: true   // 100% fit in a container
			});
		});
	</script>
	<!-- //ResponsiveTabs -->
	<!-- video -->
	<script src="../js/simplePlayer.js"></script>
	<script>
		$("document").ready(function() {
			$("#video").simplePlayer();
		});
	</script>
	<!-- //video -->
</body>
</html>