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
      
      <?php

      $imdbid = get_field('imdb_id');

      $result = file_get_contents("http://www.omdbapi.com/?i=tt$imdbid&r=json");
      $array = json_decode($result, true);
      $year = $array['Year'];
      $country = $array['Country'];
      $director = $array['Director'];
      $language = $array['Language'];
      $runtime = $array['Runtime'];

      update_post_meta($id, 'year', $year);
      update_post_meta($id, 'country', $country);
      update_post_meta($id, 'director', $director);
      update_post_meta($id, 'language', $language);
      update_post_meta($id, 'runtime', $runtime);

      ?>
     
      <ul class="film--meta">
        <li><?php the_field('director'); ?></li>
        <li><?php the_field('country'); ?>  /  <?php the_field('year'); ?></li>
        <li><?php the_field('language'); ?></li>
        <li><?php the_field('runtime'); ?></li>
      </ul>
      
      <div class="single-essay--meta">
        <date><?php echo get_the_date(); ?></date>
        <span>by</span>
        <cite><?php the_author_firstname(); ?> <?php the_author_lastname(); ?></cite>
      </div>
 
    </header>

  </section>
   
</article>
   
<article class="col-10-12 single-essay--body">
     
  <section class="col-7-12">
             
      <?php the_content(); ?>

  </section>
      
  <aside class="col-3-12">
    <?php if( have_rows('screencaps') ): ?>

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

    <?php endif; ?>
  </aside>
       


</article>

<?php get_footer(); ?>