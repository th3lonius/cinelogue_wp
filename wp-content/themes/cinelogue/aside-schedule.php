<aside class="col-1-3">

	<article class="show_node">

		<section class="showdate
			<?php
				if ($day == "Fri") {
					echo 'friday';
				} elseif ($day == "Sat") {
					echo 'saturday';
				} else {
					echo 'sunday';
				}
			?>
			">
			<h3 class="day"><?php the_field( 'day' ); ?></h3>
			<date><?php the_field( 'date' ); ?></date>
		</section>
		<time><?php the_field( 'time' ); ?>p</time>
		<span>@ <?php the_field( 'venue' ); ?></span>

	</article>

	<article class="show_node">


				<?php 

				$posts = get_field('performers');

				if( $posts ): ?>

					<?php $image = get_field('image'); ?>
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

					<?php endif; ?>	


					<ul>
					<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
						<?php setup_postdata($post); ?>
						<li>
							<a href="<?php echo get_permalink( $post->ID ); ?>">
							<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />			
							<?php the_title( '<h3>', '</h3>' ); ?>
							</a>
						</li>
					<?php endforeach; ?>
					</ul>
					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>



	</article>

</aside>