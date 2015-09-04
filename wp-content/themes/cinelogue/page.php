<?php get_header(); ?>

  <?php if ( is_page( 'About' ) ) { ?>

    <?php

        $args = array(
          'pagename' => 'about'
        );

        $query = new WP_Query( $args );

    ?>

    <?php if ( $query->have_posts() ) : ?>

      <article class="static-page col-10-12">

      <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        
        <section class="col-8-12 static-page--body">
        
          <?php the_content(); ?>
          
        </section>

      <?php endwhile; ?>
        
      </article>

    <?php endif; ?>

    <?php } elseif ( is_page( 'Essays' ) ) { ?>

    <?php

        $args = array(
          'post_type' => 'post',
          'posts_per_page' => 20,
          'orderby' => 'date',
          'order'   => 'DESC'
        );

        $query = new WP_Query( $args );

    ?>

      <?php if ( $query->have_posts() ) : ?>

        <article class="col-12-12 recent-articles">
          
          <div class="controls">
           
            <?php
  
              function get_meta_values( $key = '', $type = 'post', $status = 'publish' ) {

                global $wpdb;

                if( empty( $key ) )
                    return;

                $r = $wpdb->get_col( $wpdb->prepare( "
                    SELECT DISTINCT pm.meta_value FROM {$wpdb->postmeta} pm
                    LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
                    WHERE pm.meta_key = '%s' 
                    AND p.post_status = '%s' 
                    AND p.post_type = '%s'
                ", $key, $status, $type ) );

                return $r;
              }
  
              
              echo explode(' ',trim(implode( '<br />', get_meta_values( 'country' ))));
  
  
            ?>
            
            <label>Filter:</label>

            <button class="filter" data-filter="all">All</button>
            <button class="filter" data-filter=".category-1">Director</button>
            <button class="filter" data-filter="<?php echo get_the_date(); ?>">Publication Date</button>

            <label>Sort:</label>

            <button class="sort" data-sort="default">Default</button>
            <button class="sort" data-sort="myorder:asc">Asc</button>
            <button class="sort" data-sort="myorder:desc">Desc</button>
            
          </div>          
          
          <section id="archive" class="container">
            
          <?php
            function stripFields($string) {
                //Lower case everything
                $string = strtolower($string);
                //Make alphanumeric (removes all other characters)
                $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
                //Clean up multiple dashes or whitespaces
                $string = preg_replace("/[\s-]+/", " ", $string);
                //Convert whitespaces and underscore to dash
                $string = preg_replace("/[\s_]/", "-", $string);
                return $string;
            }
          ?>
            
          <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            
            <?php $director = get_field('director'); ?>
            <?php $country = get_field('country'); ?>
  
            <div class="col-4-12 recent-article mix <?php echo stripFields($director); ?> <?php echo stripFields($country); ?>" data-myorder="1">
              <a href="<?php the_permalink(); ?>">
                
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
              
            </div>
            
          <?php endwhile; ?>
  
            <div class="gap"></div>
            <div class="gap"></div>
            
          </section>
          
        </article>

      <?php endif; ?>


    <?php } ?>

<?php get_footer(); ?>