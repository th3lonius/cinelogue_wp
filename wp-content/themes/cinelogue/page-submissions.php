<?php get_header(); ?>

    <section id="content" role="main">
    
 
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>



		<?php else : ?>



		<?php endif; ?>
		
				<form id="upload" method="post" action="<?php bloginfo('template_directory'); ?>/upload-form/upload.php" enctype="multipart/form-data">
					<div id="drop">
						Drop Here

						<a>Browse</a>
						<input type="file" name="upl" multiple />
					</div>

					<ul>
						<!-- The file uploads will be shown here -->
					</ul>

				</form>

	</section><!-- #content -->



<?php get_footer(); ?>