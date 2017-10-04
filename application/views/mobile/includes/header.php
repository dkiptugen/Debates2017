<!doctype html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Debate</title>

<link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="<?=base_url('assets'); ?>/css/bootstrap.css" rel="stylesheet">
<link href="<?=base_url('assets'); ?>/css/bootstrap-responsive.css" rel="stylesheet">
<link href="<?=base_url('assets'); ?>/css/mobile1.css" rel="stylesheet" media="screen">
<style type="text/css">
	.scroll{
		white-space: nowrap;
		overflow-x: auto;
		-webkit-overflow-scrolling:touch;
		-ms-overflow-style: -ms-autohiding-scrollbar;
	}
	
	.menu{ border: #ccc solid 1px; background: #fff; padding: 0 10px; margin: 0 0 10px 0; font-family: 'Montserrat', sans-serif; }
nav.nav{ padding: 0; margin: 0;}
nav.nav  a{ color: #000; margin: 0 10px;}
nav.nav { float:left; padding: 12px; font-weight: 700; font-size: 15px; text-transform: uppercase; list-style: none;}
nav.nav a.active{border-bottom:#f00 solid 5px; font-weight: 800; color: #f00;}
</style>
</head>

<body>

	<div class="container-fluid header">
		<div class="logo">
	    <img src="<?=base_url('assets'); ?>/img/logo.png" alt=""/>
	     </div>
		<div class="social">
			<ul class="navbar-nav">
				<li ><img src="<?=base_url('assets'); ?>/img/facebook.png" alt=""/></li>
				<li><img src="<?=base_url('assets'); ?>/img/twitter.png" alt=""/></li>
				<li><img src="<?=base_url('assets'); ?>/img/instagram.png" alt=""/></li>
			</ul>
			
		</div>
		
	</div>
	
	<div class="clearboth"></div>
	<!--div class="container-fluid menu">
		<ul class="nav">
			<li><a href="<? //=site_url('home'); ?>">Home</a></li>
					<li ><a href="<?// =site_url('news'); ?>">News</a></li>
					<li><a href="<?// =site_url('aboutus'); ?>">About Us</a></li>
					<li><a href="<?// =site_url('mediabrief'); ?>">Media</a></li>
					<li class="livestream"><a href="<?// =site_url('livestream'); ?>">Livestream</a></li>
		</ul>
		
	</div-->
	<div class="container-fluid menu">
	<header class="scroll">
		<nav class="nav">
			<a href="<?=site_url('home'); ?>">Home</a>
			<a href="<?=site_url('news'); ?>">News</a>
			<a href="<?=site_url('aboutus'); ?>">About Us</a>
			<a href="<?=site_url('mediabrief'); ?>">Media</a>
			<a href="<?=site_url('livestream'); ?>">Livestream</a>
		</nav>
	</header>
	</div>
<!--button class="btn offset1 btn-danger" type="button">WATCH LIVESTREAM</button-->