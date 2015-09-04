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
  
  <?php 

  $trailer = get_field('trailer');

  if( !empty($trailer) ): 

  ?>
   
  <section class="col-12-12 single-essay--photo">
  
    <script>

      var tag = document.createElement('script');

      tag.src = "//www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      var player;

      function onYouTubeIframeAPIReady() {
          player = new YT.Player('ytplayer', {
              events: {
                  'onReady': onPlayerReady
              }
          });
      }

      function onPlayerReady(event) {
          event.target.playVideo();
          player.mute();
      }

    </script>
    
      <iframe id="ytplayer" type="text/html" width="100%" height="100%" src="https://www.youtube.com/embed/<?php the_field('trailer'); ?>?feature=oembed&wmode=transparent&rel=0&autoplay=1&controls=0&showinfo=0&enablejsapi=1&hd=1" frameborder="0" allowfullscreen></iframe>

  </section>
   
  <?php else: ?>
    
  <section class="col-8-12 single-essay--photo" style="background-image: url(<?php echo $url; ?>);"></section>
      
  <?php endif; ?>
  
  <?php endif; ?>
   
  <section class="col-4-12 single-essay--intro">

    <header>
     
      <h1 class="single-essay--title"><?php the_title(); ?></h1>
      
      <?php
              
      $meta = get_field('director');
              
      if( !empty($meta) ) {
        
      } else {
        
        get_template_part( 'module', 'imdb-api' );
        
      } ?>
      
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