<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
		<title>The Harvard-Westlake Chronicle - Senior Section</title>
	
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		
		<link href="<?php bloginfo('template_directory') ?>/style.css"     rel="stylesheet" type="text/css" />
		
		<link href="<?php bloginfo('template_directory') ?>/feature/fair_game/css/reset.css"  rel="stylesheet" type="text/css" />
		<link href="<?php bloginfo('template_directory') ?>/feature/senior_section/css/chrome.css" rel="stylesheet" type="text/css" />
		<link href="<?php bloginfo('template_directory') ?>/feature/senior_section/css/style.css"     rel="stylesheet" type="text/css" />
		
		<link href="<?php bloginfo('template_directory') ?>/feature/senior_section/js/slick/slick/slick.css" rel="stylesheet" type="text/css"/>
		<link href="<?php bloginfo('template_directory') ?>/feature/senior_section/js/slick/slick/slick-theme.css" rel="stylesheet" type="text/css"/>
	
		<!--[if lt IE 9]>
			<script src="js/html5.js"></script>
		<![endif]-->
		
		<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/feature/senior_section/js/slick/slick/slick.min.js"></script>
	
		<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/feature/fair_game/js/side-nav.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/feature/fair_game/js/backgrounds.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/feature/fair_game/js/kinetics.js"></script>

		<!--<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
		  ga('create', 'UA-35308943-1', 'auto');
		  ga('send', 'pageview');
	
		</script>-->
	
	</head>
	<body>
		<div id="blackground">
			<div id="navbar" style="top:0px;">
				<h1 id="seniors-title"></h1>
				<a style="padding-left: 40px;"href="#">Senior Columns</a>
				<a href="#">Through the Years</a>
				<a href="#">Matriculation</a>
				<a href="#">View the Regular Site</a>
					
				<div id="rightNav">
					<div id="big-header-search">
						<?php include (TEMPLATEPATH . '/searchform.php'); ?>
					</div>
					<div id="profile">
						<img height="40" width="40" src="<?php bloginfo('template_directory') ?>/feature/senior_section/images/netflix.png">
						<a style="margin-bottom: 50%;"href="#">Chronicle</a>
					</div>
	
				</div>
				
			</div>
			
			<div class="carousel">
				<div class="full" >test</div>
				<div class="full" >test</div>
				<div class="full" >test</div>
			</div>
			
		</div>
		<div class="years">
			<div id="seven">
				<div class="thumb">
				</div>
				<div class="text">
					seven
				</div>
			</div>
			<div id="eight">
				<div class="thumb">
				</div>
				<div class="text">
					eight
				</div>
			</div>
			<div id="nine">
				<div class="thumb">
				</div>
				<div class="text">
					nine
				</div>
			</div>
			<div id="ten">
				<div class="thumb">
				</div>
				<div class="text">
					ten
				</div>
			</div>
			<div id="eleven">
				<div class="thumb">
				</div>
				<div class="text">
					eleven
				</div>
			</div>
			<div id="twelve">
				<div class="thumb">
				</div>
				<div class="text">
					twelve
				</div>
			</div>
		</div>
		
	</body>
	<script>
		$(document).ready(function(){
		  $('.carousel').slick({
		    accesibility: true,
		    autoplay: true,
		    arrows: true
		  });
		});
	</script>
</html>