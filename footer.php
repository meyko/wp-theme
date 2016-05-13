		<footer>
			<div class="row">
				<div class="col-xs-24 col-offset-xs-1">
					<div class="footer">
					<?php wp_footer(); ?>
					<div class="row">
					<?php if ( !function_exists('dynamic_sidebar')
			        || !dynamic_sidebar('footer_sidebar') ) : ?>
					<?php endif; ?>
					</div>
						<h4 class="copiright">
							<?php echo get_theme_mod('footer_settings', 'Текст копирайта еще не придумали'); ?>
						</h4>
					</div>
				</div>
			</div>
		</footer>
	</div>
</div>
</body>
</html>