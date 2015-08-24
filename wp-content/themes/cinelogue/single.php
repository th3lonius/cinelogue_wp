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
      <date><?php echo get_the_date(); ?></date>
      <span>by</span>
      <cite><?php the_author_firstname(); ?> <?php the_author_lastname(); ?></cite>
<?php

$result = file_get_contents("http://www.omdbapi.com/?i=tt0068473&plot=short&r=json");
$array = json_decode($result, true);
$year = $array['Year'];
$country = $array['Country'];
$director = $array['Director'];
$language = $array['Language'];
$runtime = $array['Runtime'];

?>

      <date><?php echo $year; ?></date>
      <date><?php echo $country; ?></date>
      <date><?php echo $director; ?></date>
      <date><?php echo $runtime; ?></date>
      <date><?php echo $language; ?></date>
 
    </header>

  </section>
   
</article>
   
<article class="single-essay--body">
       
  <section class="col-8-12">
             
      <?php the_content(); ?>

  </section>
  
  <aside class="col-4-12 single-essay--meta">
    
  </aside>

</article>

<?php get_footer(); ?>