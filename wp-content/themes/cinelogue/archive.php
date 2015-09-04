<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package cinelogue
 */

get_header(); ?>

<span style="font-size: 52px; color: red;">I AM ARCHIVE.PHP</span>

<?php
 
    $args = array(
        'post_type' => 'issues',
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

    <section class="col-8-12 recent-article" id="most-recent">
      
      <a href="<?php the_permalink();?>">

        <figure class="recent-article--photo">
          <div style="background-image: url(<?php echo $image[0]; ?>);"></div>
        </figure>

        <header>
         
          <h1 class="essay-title"><?php the_title(); ?></h1>
          
          <date><?php the_date(); ?></date>
          
          <?php get_template_part( 'module', 'film-meta' ); ?>

          <?php get_template_part( 'module', 'single-essay-meta' ); ?>
          
        </header>

        <blockquote><?php the_excerpt(); ?></blockquote>
      
      </a>
      
    </section>
      
    <?php endwhile; ?>

  <?php else : ?>

    <?php get_template_part( 'content', 'none' ); ?>

  </article>
    
  <?php endif; ?>
  
<?php get_footer(); ?>