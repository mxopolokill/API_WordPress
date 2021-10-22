<?php
/*
Plugin Name: MyPluginCPTACF
Plugin URI: SANS URI
Description: Plugin CPT & ACF Apprenant (Taxonomie : promotion & competence, METABOX)
Version: 1.0.0
Author: Meidhi
Author URI: SANS URI
Text Domain:
Domain Path: /lang
*/

//Enregistre la prise en charge du thème pour une fonctionnalité donnée.
add_theme_support('post-thumbnails', array('post', 'apprenant'));

//ajout de mon dossier CPT et ACF////
require_once('includes/CPT.php');  //
require_once('includes/ACF.php');  //
//ajout route modifier 1 pour afficher tout les apprenant et 1 pour afficher les 16dernier apprenant                                
require_once('includes/routeapprenants.php'); //
require_once('includes/16dernierposts.php'); //
///////////////////////////////////////////////







