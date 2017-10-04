<!doctype html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="apple-touch-icon" sizes="57x57" href="<?=base_url("assets/favicon"); ?>/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?=base_url("assets/favicon"); ?>/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?=base_url("assets/favicon"); ?>/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url("assets/favicon"); ?>/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?=base_url("assets/favicon"); ?>/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?=base_url("assets/favicon"); ?>/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?=base_url("assets/favicon"); ?>/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?=base_url("assets/favicon"); ?>/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?=base_url("assets/favicon"); ?>/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?=base_url("assets/favicon"); ?>/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?=base_url("assets/favicon"); ?>/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?=base_url("assets/favicon"); ?>/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?=base_url("assets/favicon"); ?>/favicon-16x16.png">
<link rel="manifest" href="<?=base_url("assets/favicon"); ?>/manifest.json">
<meta name="msapplication-TileColor" content="#12e1ff">
<meta name="msapplication-TileImage" content="<?=base_url("assets/favicon"); ?>/ms-icon-144x144.png">
<meta name="theme-color" content="#12e1ff">
<meta name="google-site-verification" content="BP9eOj3SK2gydbYPzvQN4rGP6ruxnbrYeqfQr1gGNME" />
<?php $this->view("meta"); ?>

<title>Presidential Debates <?=@$meta->title; ?></title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="<?=base_url("assets/"); ?>css/bootstrap.css" rel="stylesheet" media="screen">
<link href="<?=base_url("assets/"); ?>css/bootstrap-responsive.css" rel="stylesheet" media="screen">
<link href="<?=base_url("assets/"); ?>css/template.css" rel="stylesheet" media="screen">


</head>
<body>
<div class="container-fluid wrapper">
  <div class="container">
    <div class="col-lg-3 col-xs-8 left-0">

    <a href="<?=site_url(); ?>">
    	<img src="<?=base_url("assets/"); ?>img/logo.png" style="width: 202px; height: auto;" alt="LOGO"/>
    </a></div>
    <div class="col-lg-6 zero-padding">
      <div class="navbar navbar-default">
           
            <div class="navbar-header">
               
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  <li><a href="<?=site_url(); ?>">Home</a></li>
                  <li><a href="<?=site_url('news'); ?>">News</a></li>
                  <li><a href="<?=site_url('videos'); ?>">Videos</a></li>
                  <li><a href="<?=site_url('aboutus'); ?>">About Us</a></li>
                  <li><a href="<?=site_url('mediabrief'); ?>">Media</a></li>
                  <li class="livestream"><a href="<?=site_url('livestream'); ?>">Livestream</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.navbar -->
    </div>
    <div class="col-lg-3 left-0 social-xs">
      <ul class="social">
        <li>
			<a href="https://www.facebook.com/Media-Debates-Kenya-1501762136501176/" target="_blank">
				<img src="<?=base_url("assets/"); ?>img/facebook.png" alt=""/>
			</a>
		</li>
        <li>
			<a href="https://twitter.com/debates_ke" target="_blank">
				<img src="<?=base_url("assets/"); ?>img/twitter.png" alt=""/>
			</a>
		</li>
        <li>
			<a href="https://www.youtube.com/channel/UCtnkkvsYepJbqKn5AukFFdg" target="_blank">
				<img src="<?=base_url("assets/"); ?>img/you-tube.png" alt=""/>
			</a>
		</li>
        <li>
			<a href="https://plus.google.com/u/1/107649787495139383525" target="_blank">
				 <img src="<?=base_url("assets/"); ?>img/g+.png" alt=""/>
			</a>
		</li>
      </ul>
    </div>
  </div>
</div>
