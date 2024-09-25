<?php
/**
 * Template Name: Page with banner
 */

 //Add the code of page tempalte here
?>
<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()): the_post(); ?>
        <h1><?php the_title() ?></h1>
        <?php the_post_thumbnail() ?>
        <?php the_content() ?>
        
        <?php previous_post_link() ?>
        <?php next_post_link() ?>
    <?php endwhile ?>
<?php else : ?>
    <h1>No posts</h1>
<?php endif ?>

<?php get_footer(); ?>