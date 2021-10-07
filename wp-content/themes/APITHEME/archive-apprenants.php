<?php get_header(); 
?>
<!-- Version simple -->



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php the_content() ?>
	<i class="<?php printf('%s', get_field("Prenom_Nom")); ?>"></i>
<i class="<?php printf('%s', get_field("linkedin")); ?>"></i>
<i class="<?php printf('%s', get_field("extrait")); ?>"></i>
<i class="<?php printf('%s', get_field("photo")); ?>"></i>
<i class="<?php printf('%s', get_field("portfolio")); ?>"></i>
<i class="<?php printf('%s', get_field("cv_telechargeable")); ?>"></i>
<i class="<?php printf('%s', get_field("promotion")); ?>"></i>
<i class="<?php printf('%s', get_field("competences_")); ?>"></i>

	<?php endwhile;
	endif; ?>
<?php

