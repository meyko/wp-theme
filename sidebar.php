	<?php if(!is_page()&&!is_single()&&!is_category()){?>
	<section>
		<div class="row">
			<div class="col-xs-22  col-md-4 col-xs-offset-1 sidebar-main">
				<?php if ( !function_exists('dynamic_sidebar')
		        || !dynamic_sidebar('contacts') ) : ?>
			<?php endif; ?>	
			</div>
			<div class="col-xs-22 col-xs-offset-1  col-md-17 welcome-main">
			<?php if ( !function_exists('dynamic_sidebar')
		        || !dynamic_sidebar('main_page_widget') ) : ?>
			<?php endif; ?>
			</div>
		</div>
	</section>
	<?php } if(is_single()||  is_category()){?>
		<section class=" sidebar-main">
			<div class="row">
				<div class="hidden-xs hidden-sm col-md-1 thumb full"></div>
				<div class="col-xs-24 col-md-6 thumb full">
						
						<?php if ( !function_exists('dynamic_sidebar')
					        || !dynamic_sidebar('news') ) : ?>
						<?php endif; ?>	
						
				</div>
				<div class="col-xs-24 col-md-1 hidden-xs hidden-sm hidden-sm thumb full"></div>
	<?php }?>
	<?php if ( is_page() ) { ?>	
		<section class="page">
		<div class="row">
		<div class="col-xs-24 col-md-10 extra single-post">
			<div class="row">
				<div class="col-xs-24 col-md-3"></div>
				<div class="col-xs-24 col-md-18 sidebar-content">
						<?php if ( !function_exists('dynamic_sidebar')
					        || !dynamic_sidebar('feedback_page') ) : ?>
						<?php endif; ?>
					</div>	
					<div class="col-xs-24 col-md-3 hidden-xs hidden-sm hidden-sm "></div>
			</div>
		</div>
	<?php } ?>