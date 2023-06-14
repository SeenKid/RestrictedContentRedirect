<?php

/**
 * Plugin Name: RestrictedContentRedirect
 * Author: Yann Berlemont
 * Version: 1.0
 * Description: Cette extension permet de faire des redirections customisées pour vos utilisateurs non connectés.
 * Plugin URI: https://github.com/SeenKid/RestrictedContentRedirect
 */

function redirection()
{
   $pageid = get_queried_object_id();

   if (!is_user_logged_in()) {
      if (is_page(array('BLOCKED_PAGE1', 'BLOCKED_PAGE2'))) {
         wp_redirect('REDIRECT_URL');
         exit();
      }
   }
}

add_action('template_redirect', 'redirection');
