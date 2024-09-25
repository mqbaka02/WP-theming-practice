<?php get_header(); ?>
<?php //wp_title(); 
?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()): the_post(); ?>
        <h1><?php the_title() ?></h1>

        <?php if (get_post_meta(get_the_ID(), SponsoMetaBox::META_KEY, true) === '1') : ?>
            <div class="alert alert-info">
                This post has a sponsor.
            </div>
        <?php endif ?>

        <?php the_post_thumbnail() ?>
        <?php the_content() ?>
        
        <?php previous_post_link() ?>
        <?php next_post_link() ?>
    <?php endwhile ?>
<?php else : ?>
    <h1>No posts</h1>
<?php endif ?>

<?php get_footer(); ?>