<?php
 
    $args = array(
        'posts_per_page' => 1,
        /*'date_query' => array(
            array(
                'year' => date( 'Y' ),
                'week' => date( 'W' ),
            ),
        ),*/
    );

    $query = new WP_Query( $args );

?>  

  <?php if ( $query->have_posts() ) : ?>

  <article class="col-12-12 recent-articles">
    
    <section class="col-4-12 module-header">
      <header>
        <h1 class="section-title">
          <div>Articles</div>
          <span>from</span>
          <date>August 14th</date>
          <span>through</span>
          <date>August 21st</date>
        </h1>
      </header>
    </section>
    
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>

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
    
    <section class="col-8-12 recent-article">
      
      <a href="<?php the_permalink();?>">

        <figure>
          <div style="background-image: url(<?php echo $image[0]; ?>);"></div>
        </figure>

        <header>
          <h1 class="essay-title"><?php the_title(); ?></h1>
          <date><?php the_date(); ?></date>
        </header>

        <?php the_excerpt(); ?>
      
      </a>
      
    </section>
      
    <?php endwhile; ?>

  <?php else : ?>

    <?php get_template_part( 'content', 'none' ); ?>

  </article>
    
  <?php endif; ?>
  
<?php
 
    $args = array(
        'offset' => 1,
        /*'date_query' => array(
            array(
                'year' => date( 'Y' ),
                'week' => date( 'W' ),
            ),
        ),*/
    );

    $query = new WP_Query( $args );

?>  

  <?php while ( $query->have_posts() ) : $query->the_post(); ?>

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
    
    <section class="col-4-12 recent-article">
      
      <a href="<?php the_permalink();?>">

        <figure>
          <div style="background-image: url(<?php echo $image[0]; ?>);"></div>
        </figure>

        <header>
          <h3 class="essay-title"><?php the_title(); ?></h3>
          <date><?php the_date(); ?></date>
        </header>

        <?php the_excerpt(); ?>
      
      </a>
      
    </section>
      
    <?php endwhile; ?>

  </article>