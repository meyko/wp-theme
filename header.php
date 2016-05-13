<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php bloginfo('name'); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head();?>
</head>
<body>
<div class="wrapper-main addbg container-fluid ">
	<div class="main container">
	<header>
	<div class="row" >
		<div class="col-xs-24 col-md-15 col-md-offset-9 info-header">
			<hr>
			<p><?php echo get_bloginfo( 'description' )?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-offset-6 col-sm-6 col-md-offset-0 col-md-4 logo">
				<a href='<?php echo get_home_url(); ?>'><img src="<?php header_image(); ?>" alt="" class="img-responsive"></a>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-5 logo">
			<a href='<?php echo get_home_url(); ?>'>
			<?php if (is_front_page()) $wrap_tag = 'h1>'; else $wrap_tag = 'h2>'; ?>
				<<?=$wrap_tag;?><span>Бизнес</span><br> информ</<?=$wrap_tag;?>
			</a>
			<div class="header-gradient"></div>
		</div>
		<div class="col-xs-24 col-sm-24 col-md-15 menu-col">
			<nav class="navbar wrap-menu">
                <div class="navbar-header">
		          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar" aria-expanded="false">
			           <span class="sr-only">Toggle navigation</span>
			           <span class="icon-bar"></span>
			           <span class="icon-bar"></span>
			           <span class="icon-bar"></span>
		        	</button>
           		 </div>
            	<div class="collapse navbar-collapse" id="bs-navbar">
		         <?php  wp_nav_menu(
						array(
						'theme_location' => 'header_menu',
						'menu' => 'testmenu', 
						'container' => 'ul', 
						'container_class' => '', 
						'container_id' => 'bs-navbar', 
						'menu_class' => 'nav navbar-nav', 
						'menu_id' => ''
						)
						);?>
				</div>
		    </nav>
		</div>		
	</div>
	</header>