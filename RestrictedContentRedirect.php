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
   // prends l'ID de la page que l'utilisateur essaie de charger
   $pageid = get_queried_object_id();

   // check si l'utilisateur est connecté ou non
   if (!is_user_logged_in()) {

      // Les pages bloquées pour les utilisateurs non connectés
      if (is_page(array('test1'))) { 
         // URL de redirection
         wp_redirect('http://localhost/wordpress/login');
         exit();
      }
   }
}

add_action('template_redirect', 'redirection');
