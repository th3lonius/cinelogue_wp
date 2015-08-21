<?php

/* Template Name: Schedule Page */

get_header(); ?>
    
    <article class="col-2-3">
    
		<header><h2>Schedule</h2></header>
		
		<?php if ( have_posts() ) : ?>
		

			<?php while ( have_posts() ) : the_post(); ?>
			

				<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
				<?php the_title( '<h1>', '</h1>' ); ?>
				
												
			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
		
	</article>
	
	<?php get_template_part( 'aside', 'schedule' ); ?>
	
<?php get_footer(); ?>