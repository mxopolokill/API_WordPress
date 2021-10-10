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

add_theme_support('post-thumbnails', array('post', 'apprenant'));
require_once('includes/CPT.php');
require_once('includes/ACF.php');







