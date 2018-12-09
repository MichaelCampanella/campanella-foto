<?php get_header(); ?>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<article>
				<div class="post-heading">
					<?php the_title( '<h1>', '</h1>' ); ?>
					<hr class="post-heading-hr" />
				</div><!-- post-heading -->	
			
				<div class="post-content">
				<?php the_content('Continue Reading'); ?>
				</div><!-- post-content -->
			</article><!-- article -->
			
			
			<?php endwhile; endif; ?>

<?php get_footer( 'page' ); ?>
