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