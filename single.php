<?php get_header(); ?>
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<div class="post-heading">
						<?php the_title( '<h1>', '</h1>' ); ?>
						<hr class="post-heading-hr" />
						<div class="post-sub-heading">
							Posted in <?php the_category(', ') ?> on <span class="date updated"><?php the_time('F jS, Y') ?></span>
						</div><!-- post-sub-heading -->
					</div><!-- post-heading -->
					
					<div class="post-content">
						<?php the_content(); ?>
					</div><!-- post-content -->
					
					<div class="post-tags">
						<?php the_tags('<div class="post-tags-heading"><i class="fa fa-tags" aria-hidden="true"></i> Tags:</div><!-- post-tags-heading --><div class="post-tags-cont"> ', ', ', '</div><!-- post-tags-cont -->'); ?>
					</div><!-- post-tags -->
					
					<div class="post-author">
						<div class="author-bio-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), '200', $default, $alt, array( 'class' => array( 'img-circle' ) ) ); ?> 
						</div><!-- .author-bio-avatar -->
							
						<div class="author-bio-content">
							<h4 class="author-bio-title">
								<?php echo get_the_author_meta('display_name', $author_id); ?>
							</h4><!-- .author-bio-title -->
								
							<div class="author-bio-description">
								<?php echo get_the_author_meta('description'); ?>
							</div><!-- author-bio-description -->
						</div><!-- author-bio-content -->
					</div><!-- post-author -->
					
				</article><!-- article -->
			
			<?php endwhile; endif; ?>

			<div class="post-navigation">
				<?php if (get_adjacent_post(false, '', true)): // if there are older posts ?>
					<?php previous_post_link('%link', '<span class="post-nav-label">Previous Post</span><span class="post-nav-title">&laquo; %title</span>'); ?><!-- .prev -->
				<?php else: ?>
					<div class="prev no-more-posts">
						<span class="post-nav-label">Previous Post</span>
						<span class="post-nav-title">&laquo; No more posts</span>
					</div><!-- .prev -->
				<?php endif; ?>
				<?php if (get_adjacent_post(false, '', false)): // if there are newer posts ?>
					<?php next_post_link('%link', '<span class="post-nav-label">Next Post</span><span class="post-nav-title">%title &raquo;</span>'); ?><!-- span .next-->
				<?php else: ?>
					<div class="next no-more-posts">
						<span class="post-nav-label">Next Post</span><span class="post-nav-title">No more posts &raquo;</span>
					</div><!-- .next -->
				<?php endif; ?>			
			</div><!-- post-navigation -->
			
			<div class="single-post-line"></div><!-- single-post-line -->
			
			<?php
				$tags = wp_get_post_tags($post->ID);
				if ($tags) {
					$tag_ids = array();
					foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
						
					$args=array(
						'tag__in' => $tag_ids,
						'post__not_in' => array($post->ID),
						'showposts'=>3, // Number of related posts that will be shown.
						'caller_get_posts'=>1
					);
					$my_query = new wp_query($args);
					if( $my_query->have_posts() ) {
						echo '<aside><h4>Recommended posts:</h4><div id="card-container">';
						while ($my_query->have_posts()) {
						$my_query->the_post();
			?>
			
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
  
			<?php } echo '</div><!-- card-container --></aside><!-- aside -->'; } wp_reset_query(); } ?>				

<?php get_footer(); ?>