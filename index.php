<?php

// if single post redirect to wp-json route
// otherwise to root wp-json
if ( is_singular() ) {
  $postId = get_post()->ID;
  $postType = get_post_type_object(get_post_type())->rest_base;
  $apiUrl = get_site_url(null, '/wp-json/wp/v2/%s/%s');
  header(
      sprintf(
          "Location: {$apiUrl}",
          $postType,
          $postId  
      )
  );
} else {
  $apiUrl = get_site_url(null, '/wp-json/wp/v2');
  header("Location: {$apiUrl}");
}

die();
