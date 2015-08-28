<?php get_header(); ?>

<?php if ( is_singular( 'issues' ) ) { ?>

<?php if( have_posts() ) the_post(); ?>

<article class="single-essay">
      
  <?php 

  $image = get_field('photo');

  if( !empty($image) ): ?>

      <section class="col-8-12 single-essay--photo" style="background-image: url(<?php echo $image['url']; ?>);"></section>

  <?php endif; ?>
   
  <section class="col-4-12 single-essay--intro">

    <header>
    
      <span class="issue-number"><?php the_title(); ?></span>
     
      <h1 class="single-essay--title"><?php the_field('title'); ?></h1>
            
      <?php get_template_part( 'module', 'single-essay-meta' ); ?>

    </header>
    
  </section>
   
</article>

<article class="col-10-12 single-essay--body">
     
  <section class="col-8-12">
             
      <?php the_content(); ?>

  </section>
  
  <aside class="col-4-12">
    
    <?php 

    $posts = get_field('articles');

    if( $posts ): ?>
       
        <ul class="single-issue--contents">
        
        <?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
                   
          <li>
            <a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a>
          </li>
          
        <?php endforeach; ?>
        
        </ul>
        
    <?php endif; ?>
    
  </aside>
  
</article>

<?php } else { ?>









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

      
  <aside class="col-4-12">
  
    <blockquote>
      <p><?php the_field('pullquote'); ?></p>
    </blockquote>
  
  </aside>

-->

</article>

<?php } ?>

<?php get_footer(); ?>