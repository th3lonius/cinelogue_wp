<?php get_header(); ?>

<article>
      
  <?php if( have_rows('screenshots') ) :

    $rows = get_field('screenshots'); // get all the rows
    $first_row = $rows[0]; // get the first row
    $first_row_image = $first_row['screenshot' ]; // get the sub field value
    $size = 'full';
    $image = wp_get_attachment_image_src( $first_row_image, $size );

  ?>

  <section class="col-6-12 essay-photo" style="background-image: url(<?php echo $image[0]; ?>);">
    <header>
      <h1><?php the_title(); ?></h1>
    </header>
  </section>
  
  <?php endif; ?>
  
  <section class="col-6-12">
             
    <?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

      <?php the_content(); ?>

    <?php endwhile; ?>

    <?php else : ?>

      <?php get_template_part( 'content', 'none' ); ?>

    <?php endif; ?>

  </section>

</article>
	
<?php get_footer(); ?>