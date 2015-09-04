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

    $image = get_field('screencap');

    if( !empty($image) ): 

        // vars
        $url = $image['url'];
        $title = $image['title'];
        $alt = $image['alt'];
        $caption = $image['caption'];

        // thumbnail
        $size = 'thumbnail';
        $thumb = $image['sizes'][ $size ];
        $width = $image['sizes'][ $size . '-width' ];
        $height = $image['sizes'][ $size . '-height' ];

    ?>
    
    <section class="col-8-12 recent-article" id="most-recent">
      
      <a href="<?php the_permalink();?>">

        <figure class="recent-article--photo">
          <div style="background-image: url(<?php echo $url; ?>);"></div>
        </figure>

        <header>
         
          <h1 class="essay-title"><?php the_title(); ?></h1>
                    
          <?php get_template_part( 'module', 'film-meta' ); ?>

          <?php get_template_part( 'module', 'single-essay-meta' ); ?>
          
        </header>

        <blockquote><?php the_excerpt(); ?></blockquote>
      
      </a>
      
    </section>
    
    <?php endif; ?>
      
    <?php endwhile; ?>

  <?php else : ?>

    <?php get_template_part( 'content', 'none' ); ?>
    
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
  
    <section class="col-4-12 recent-article">
      
      <a href="<?php the_permalink();?>">
        
        <?php 

        $image = get_field('screencap');

        if( !empty($image) ): 

            // vars
            $url = $image['url'];
            $title = $image['title'];
            $alt = $image['alt'];
            $caption = $image['caption'];

            // thumbnail
            $size = 'thumbnail';
            $thumb = $image['sizes'][ $size ];
            $width = $image['sizes'][ $size . '-width' ];
            $height = $image['sizes'][ $size . '-height' ];

        ?>

        <figure class="recent-article--photo">
          <div style="background-image: url(<?php echo $url; ?>);"></div>
        </figure>
        
        <?php endif; ?>

        <header>
         
          <h1 class="essay-title"><?php the_title(); ?></h1>
                    
          <?php get_template_part( 'module', 'film-meta' ); ?>

          <?php get_template_part( 'module', 'single-essay-meta' ); ?>
          
        </header>
        
        <blockquote>
          <?php variable_excerpt('variable_excerpt_length'); ?>
        </blockquote>

      </a>
      
    </section>
      
    <?php endwhile; ?>

  </article>