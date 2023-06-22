<?php

/**
 * Plugin Name: RestrictedContentRedirect
 * Author: SeenKid
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

// WOOCOMMERCE EXAMPLE 
function redirection()
{
   // prends l'ID de la page que l'utilisateur essaie de charger
   $pageid = get_queried_object_id();
   $uri = $_SERVER['REQUEST_URI'];

   // TODO : Update this.
   $geonontisse = array("URL TO BLOCK");
   // check si l'utilisateur est connecté ou non
   if (!is_user_logged_in()) {

      // Les pages bloquées pour les utilisateurs non connectés
      foreach ($geonontisse as $check) {
         if (strpos(strtolower($uri), strtolower($check)) !== false) {
            // URL de redirection
            wp_redirect('https://dev.mc2sarl.ch/geonontisse/');
            exit();
         }
      }
   }
 }

add_action('template_redirect', 'redirection');
