<?php get_header(); ?>
		<div class="content">
			<?php get_sidebar(); ?>

			<?php if ( have_posts() ) : while ( have_posts()) : the_post(); ?>
				<div class="wrap-single-post">
				<div class="col-xs-22  col-md-20 col-xs-offset-1 thumb single-post news">
					<div class="news-header-wrapper">
						<div class="thumbnail-image">
						<?php the_post_thumbnail(array(98,98))?>
						</div>
						<div class="thumbnail-gradient">
						</div>
						<div class="news-header">
							<h1><?php the_title();?></h1>
						</div>
					</div>

						<div class='news-content'>
							<?php the_content();?>

						</div>
		
					</div>
							</div>
					<?php endwhile; else : ?>
						<p><?php _e( 'Sorry, no posts were found.' ); ?></p>
						<?php endif; ?>

		</section>
		</div>
<?php get_footer(); ?>