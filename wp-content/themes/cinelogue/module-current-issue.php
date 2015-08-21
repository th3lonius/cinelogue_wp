<?php
 
    $args = array(
        'post_type' => 'issues'
    );

    $query = new WP_Query( $args );

?>
  
<?php if ( $query->have_posts() ) : ?>

  <article class="current-issue">

  <?php while ( $query->have_posts() ) : $query->the_post(); ?>

      <?php $image = get_field('photo'); ?>
      <?php if( !empty($image) ): 

          // vars
          $url = $image['url'];
          $title = $image['title'];
          $alt = $image['alt'];
          $caption = $image['caption'];

          // thumbnail
          $size = 'thumbnail';
          $thumb = $image['sizes'][ $size ];
          $width = $image['sizes'][ $size . '-width' ];
          $height = $image['sizes'][ $size . '-height' ]; ?>

      <section class="col-8-12 current-issue--photo" style="background-image:<?php echo $thumb; ?>;"></section>

      <section class="col-4-12 current-issue--intro">

        <header>
          <span class="issue-number"><?php the_title(); ?></span>
          <a href="<?php the_permalink(); ?>">
            <h1 class="issue-title"><?php the_field('title'); ?></h1>
          </a>
          <date><?php the_date(); ?></date>
        </header>

      </section>

      <?php endif; ?>

  <?php endwhile; ?>

  </article>

<?php else : ?>

    <?php get_template_part( 'content', 'none' ); ?>

<?php endif; ?>