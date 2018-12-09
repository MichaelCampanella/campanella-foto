		</div>
	</section><!-- section -->
	
	<footer>
		<div class="wrapper">
		
			<div id="footer-column-container">
			
			<div class="footer-column col-1">
				<h3>Blog Categories</h3>
				<hr/>		
				<ul class="blog-cat">
					<?php wp_list_categories( array( 'orderby'    => 'ID', 'show_count' => true, 'title_li' => '' ) ); ?> 
				</ul>
			</div><!-- footer-column -->

			<div class="footer-column col-2">
				<h3>Blog Archive</h3>
				<hr/>		
				<ul class="blog-arch">
					<?php wp_get_archives('type=yearly'); ?>
				</ul>
			</div><!-- footer-column -->
			
			<div class="footer-column col-3">
				<h3>Get In Touch</h3>
				<hr/>		
				<ul class="contact">
					<li><a href="mailto:&#109;&#105;&#099;&#104;&#097;&#101;&#108;&#064;&#099;&#097;&#109;&#112;&#097;&#110;&#101;&#108;&#108;&#097;&#046;&#115;&#101;">
						<span class="icon-font">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
						<div class="contact-label"> 
							<span>E-MAIL</span><br/>
							CampanellaFoto
						</div>
					</a></li>
					<li><a href="tel:+46734219363">					
						<span class="icon-font mobile">
							<i class="fa fa-mobile" aria-hidden="true"></i>
						</span>
						<div class="contact-label"> 
							<span>PHONE</span><br/>
							+46 734-21 93 63
						</div>
					</a></li>
					<li><a href="http://www.facebook.com/CampanellaFoto" target="_blank">
						<span class="icon-font">
							<i class="fa fa-facebook-official" aria-hidden="true"></i>
						</span>
						<div class="contact-label">
							<span>FACEBOOK</span><br/>
							CampanellaFoto
						</div>
					</a></li>
					<li><a href="http://www.twitter.com/CampanellaFoto" target="_blank">						
						<span class="icon-font">
							<i class="fa fa-twitter-square" aria-hidden="true"></i>
						</span>
						<div class="contact-label">
							<span>TWITTER</span><br/>
							CampanellaFoto
						</div>
					</a></li>
					<li><a href="https://www.flickr.com/photos/campanellafoto" target="_blank">					
						<span class="icon-font">
							<i class="fa fa-flickr" aria-hidden="true"></i>
						</span>
						<div class="contact-label">
						<span>FLICKR</span><br/>
							CampanellaFoto
						</div>
					</a></li>
					<li><a href="<?php bloginfo('rss2_url'); ?>">				
						<span class="icon-font">
							<i class="fa fa-rss-square" aria-hidden="true"></i>
						</span>
						<div class="contact-label">
							<span>RSS FEED</span><br/>
							Subscribe
						</div>
					</a></li>			
				</ul><!-- getInTouch -->
			</div><!-- footer-column -->
			
			</div><!-- footer-column-container -->
						
			<div class="copyright">
				<hr />
				<?php wp_nav_menu( array( 'container' => '' )); ?>
				<p>
		 			&copy; Copyright <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?> - All Rights Reserved - Stockholm, Sweden
		 		</p>
		 	</div><!-- copyright -->
		 	
		</div><!-- .wrapper -->	
	</footer><!-- footer -->

<?php wp_footer(); ?>

<?php if ( !is_user_logged_in() ) { ?>
<!-- Disable right click for visitors -->
<script type="text/javascript">
	jQuery(document).ready(function(){
    	jQuery(document).bind("contextmenu",function(e){
        	return false;
	    });
	});
</script>
<?php } ?>

</body>
</html>