<?php 
 /**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
 get_header();?>

<?php if ( is_home() && ! is_front_page() ) : ?>
	
<?php endif; ?>

<div class="main">
<div class="content"><?php get_content();?></div>
</div>
<?php get_footer();>?