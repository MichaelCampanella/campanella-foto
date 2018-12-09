<?php get_header(); ?>
			<div id="archive">
				<?php if (have_posts()) : ?>
				
					<h1>
						Search results for: 
						<?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key =  esc_html($s, 1); $count = $allsearch->post_count; _e(''); _e('<span class="search-terms">'); echo $key; _e('</span>'); _e(' &mdash; '); echo $count . ' '; _e('articles'); wp_reset_query(); ?>
					</h1>				
				
				<?php while (have_posts()) : the_post(); ?>
				
				<div id="post-<?php the_ID(); ?>" class="columns-three">
					<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>	
					
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
						<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail();
						} else { ?>
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/no-thumbnail.jpg" alt="<?php the_title(); ?>" />
						<?php } ?>
					</a>

					<span class="date alignright"><?php the_time('F jS, Y') ?></span>
						
					<p><?php the_excerpt(); ?></p>

					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>" class="read-more">Read post &raquo;</a>
				</div><!-- columns-three -->

				
				<?php endwhile; ?>

			</div><!-- archive -->
			
				<?php wp_pagenavi(); ?>
	
				<?php else : ?>

					<h1>No results found.</h1>
					<p>
						No posts were found containing your search query. 
						Why not try something different? 
					</p>

			</div><!-- archive -->

				<?php endif; ?>
			



<?php get_footer(); ?>
