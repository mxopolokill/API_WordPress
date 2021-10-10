<?php get_header(); 
?>
<!-- Version simple -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php the_content() ?>
	<?php printf('%s', get_field("linkedin")); ?>
	<?php printf('%s', get_field("extrait")); ?>
	<?php printf('%s', get_field("photo")); ?>
	<?php printf('%s', get_field("portfolio")); ?>
	<?php printf('%s', get_field("cv_telechargeable")); ?>
	<?php printf('%s', get_field("promotion")); ?>
	<?php printf('%s', get_field("competences_")); ?>
	<?php endwhile;
	endif; ?>
<?php

