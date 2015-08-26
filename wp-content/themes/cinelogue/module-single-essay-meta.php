<?php if ( is_singular() ) { ?>

<div class="single-essay--meta">
  <date><?php echo get_the_date(); ?></date>
  <span>by</span>
  <cite><?php the_author_firstname(); ?> <?php the_author_lastname(); ?></cite>
</div>
                                          
<?php } else { ?>

<div class="single-essay--meta">
  <date><?php echo get_the_date(); ?></date>
  <span>by</span>
  <cite><?php the_author_firstname(); ?> <?php the_author_lastname(); ?></cite>
</div>

<?php } ?>