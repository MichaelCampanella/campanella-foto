<?php get_header(); ?>

			<div id="archive">
				<?php if (have_posts()) : ?>
				
				<h1>&#8216;<?php single_cat_title(); ?>&#8217; Archive <?php if ( $paged < 2 ) { } else { echo ('(Page '); echo ($paged); echo(')');} ?></h1>
				
				<div id="card-container">
				<?php while (have_posts()) : the_post(); ?>
				
				<div id="post-<?php the_ID(); ?>" class="card">
				
					<div class="card--date"><?php echo get_the_date('M j'); echo '<br />'; echo get_the_date('Y'); ?></div>
					
    				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>" class="card--image">
						<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail('thumbnail');
						} else { ?>
							<img srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/no-thumbnail.jpg 320w, <?php echo get_stylesheet_directory_uri(); ?>/images/no-thumbnail-2x.jpg 640w, <?php echo get_stylesheet_directory_uri(); ?>/images/no-thumbnail-3x.jpg 1420w" src="<?php echo get_stylesheet_directory_uri(); ?>/images/no-thumbnail.jpg" alt="<?php the_title(); ?>" />
						<?php } ?>
					</a>
					
    				<div class="card--category"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></div>
    				
    				<h2 class="card--heading">
    					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
    				</h2>
    				
    				<div class="card--snippet"><?php the_excerpt(); ?></div>
    				
   					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>" class="card--link">Read Post  &raquo;</a>
  				
  				</div><!-- card -->
				
				<?php endwhile; endif; ?>
				</div><!-- card-container -->
			
			</div><!-- archive -->
			
			<?php wp_pagenavi(); ?>

<?php get_footer(); ?>