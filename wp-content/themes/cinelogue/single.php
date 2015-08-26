<?php get_header(); ?>

<?php if( have_posts() ) the_post(); ?>

<article class="single-essay">
      
  <?php

    $rows = get_field('screencaps' ); // get all the rows
    $first_row = $rows[0]; // get the first row
    $first_row_image = $first_row['screencap' ]; // get the sub field value 

    // Note
    // $first_row_image = 123 (image ID)

    $image = wp_get_attachment_image_src( $first_row_image, 'full' );
    // url = $image[0];
    // width = $image[1];
    // height = $image[2];
    ?>

  <section class="col-8-12 single-essay--photo" style="background-image: url(<?php echo $image[0]; ?>);"></section>
   
  <section class="col-4-12 single-essay--intro">

    <header>
     
      <h1 class="single-essay--title"><?php the_title(); ?></h1>
      
      <?php get_template_part( 'module', 'imdb-api' ); ?>
      
      <?php get_template_part( 'module', 'film-meta' ); ?>
      
      <?php get_template_part( 'module', 'single-essay-meta' ); ?>

    </header>

  </section>
   
</article>
   
<article class="col-10-12 single-essay--body">
     
  <section class="col-8-12">
             
      <?php the_content(); ?>

  </section>
 
<!--
  <aside class="col-4-12">
    <?php /*if( have_rows('screencaps') ): ?>

        <ul class="slides">

        <?php while( have_rows('screencaps') ): the_row(); 

            // vars
            $image = get_sub_field('screencap');
            $size = 'medium'; // (thumbnail, medium, large, full or custom size)

            ?>

            <li class="slide">
              <?php echo wp_get_attachment_image( $image, $size ); ?>
            </li>

        <?php endwhile; ?>

        </ul>

    <?php endif; */?>
  </aside>
-->
      
  <aside class="col-4-12">
  
    <blockquote>
      <p><?php the_field('pullquote'); ?></p>
    </blockquote>
  
  </aside>
       


</article>

<?php get_footer(); ?>