<?php 
 /*
 Front page template
 */
 get_header();?>

<?php /*if ( is_home() && ! is_front_page() ) : ?>
	
<?php endif; */?>

<div class="sv-main">
    <?php get_template_part('template-parts/content/content', 'conveyor');?>

</div>
<?php get_footer();?>