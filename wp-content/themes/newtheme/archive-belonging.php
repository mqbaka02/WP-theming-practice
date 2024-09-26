<?php get_header(); ?>
<?php //wp_title(); 
?>
<h1>View all the belongings</h1>

<?php if (have_posts()) : ?>
    <div class="row">
        <?php while (have_posts()): the_post(); ?>
            <div class="col-sm-4">
                <?php //require "parts/post-card.php" ?>
                <?php get_template_part("parts/post-card")//better than require in some ways... ?>
            </div>
        <?php endwhile ?>
    </div>
    <?php m_pagination() ?>
    <nav aria-label="Page navigation example">
            <?= paginate_links(['type'=> 'list']) ?>
    </nav>
<?php else : ?>
    <h1>No posts</h1>
<?php endif ?>

<?php get_footer(); ?>