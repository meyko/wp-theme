<?php get_header(); ?>
		<div class="content">
		<?php get_sidebar(); ?>
			<section class="news">
				<div class="row">
				<?php $count_posts=0;
				query_posts('cat=3');
				if ( have_posts() ) : while ( have_posts()&& ($count_posts < 3) ) : the_post(); $count_posts++; ?>
					<div class="hidden-xs hidden-sm col-md-1 thumb "></div>
					<div class="col-xs-24 col-md-6 thumb">
						<div class="news-header-wrapper">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
								<div class="thumbnail-image">
								<?php the_post_thumbnail(array(98,98)) ?>
								</div>
								<div class="thumbnail-gradient">
								</div>
							 </a>
							<div class="news-header">
								<h3><?php the_title(); ?></h3>
							</div>
						</div>
						<p class='news-content'>
							<?php $content = get_the_content(); 
							echo mb_substr(strip_tags($content),0,200); ?>
						</p>
						<a href="<?php the_permalink(); ?>" type="button" class="btn active">Читать</a>
					</div>
					<?php if ($count_posts%3!=0){ ?> 
						<div class="col-xs-24 col-md-1 hidden-xs hidden-sm hidden-sm thumb extra"></div>
					<?php }	else{ ?>
					</div>
					<div class="row">
					<?php } endwhile;?>		
					<?php endif; ?>
					</div>
			</section>
			</div>
<?php get_footer(); ?>