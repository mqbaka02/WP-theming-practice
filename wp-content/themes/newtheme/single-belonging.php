<?php get_header(); ?>
<?php //wp_title(); 
?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()): the_post(); ?>
        <h1><?php the_title() ?></h1>

        <div class="image-container">
            <?php the_post_thumbnail() ?>
        </div>
        <?php the_content() ?>
        
        <?php previous_post_link() ?>
        <?php next_post_link() ?>
    <?php endwhile ?>
<?php else : ?>
    <h1>No posts</h1>
<?php endif ?>

<?php get_footer(); ?>