<?php

// if single post redirect to wp-json route
// otherwise to root wp-json
if ( is_singular() ) {
  $postId = get_post()->ID;
  $postType = get_post_type_object(get_post_type())->rest_base;
  header(
      sprintf(
          'Location: /wp-json/wp/v2/%s/%s',
          $postType,
          $postId  
      )
  );
} else {
  header('Location: /wp-json/');
}

die();
