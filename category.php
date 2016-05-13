<?php get_header(); ?>
<div class="content">
<?php get_sidebar(); ?>
	<section  class="news col-xs-22  col-md-14 col-xs-offset-1 single-post thumb category">
			<?php $count_posts=0;
			if ( have_posts() ) : while ( have_posts()) : the_post(); $count_posts++; ?>
				<?php if ( ($count_posts-1)%2==0){ ?> 
		<div class="row">
		<?php }?>
			<div class="hidden-xs hidden-sm col-md-2 thumb "></div>
			<div class="col-xs-24 col-md-9 thumb article">
				<div class="news-header-wrapper">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
						<div class="thumbnail-image">				
						<?php the_post_thumbnail(array(98,98)) ?>
						</div>
						<div class="thumbnail-gradient">
						</div>
					</a>
					<div class="news-header">
						<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
					</div>
				</div>
				<p class='news-content'>
							<?php $content = get_the_content(); 
							echo mb_substr(strip_tags($content),0,150); ?>
				</p>		
			</div>
			<?php if ($count_posts%2!=0){ ?> 
				<div class="col-xs-24 col-md-2 hidden-xs hidden-sm hidden-sm thumb extra"></div>
				<?php }	else{ ?>
					</div>
					<?php } endwhile;?>
					<?php endif; ?>
			</section>
		</div>
	</section>
	</div>		
<?php get_footer(); ?>