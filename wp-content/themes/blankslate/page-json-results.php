<?php
header( 'Content-type: application/json' );


$args= array(
'post_type'=> 'post'
    );

$post_query= new WP_Query($args);
if($post_query->have_posts() ) {
  while($post_query->have_posts() ) {
    $post_query->the_post();
   setup_postdata($post);
   $location = get_field('location', $post->ID);
  echo $location['address'];
   print_r($location);
$suggestion= array();
$suggestion['label']= esc_html($post->post_title);
$suggestion['category']= get_post_type($post->ID);

$suggestion['lat']= $location->lat;
$suggestion['long']= $location->long;
$suggestions[]= $suggestion;
   
  }
}


$response= json_encode($suggestions);
echo $response;
