<?php if ( is_singular() ) { ?>

<ul class="film--meta">
  <li><?php the_field('director'); ?></li>
  <li><?php the_field('country'); ?> &nbsp;/&nbsp; <?php the_field('year'); ?></li>
  <li><?php the_field('language'); ?></li>
  <li><?php the_field('runtime'); ?></li>
</ul>
                                          
<?php } else { ?>

<ul class="film--meta">
  <li><?php the_field('director'); ?></li>
  <li><?php the_field('country'); ?> &nbsp;/&nbsp; <?php the_field('year'); ?></li>
</ul>

<?php } ?>