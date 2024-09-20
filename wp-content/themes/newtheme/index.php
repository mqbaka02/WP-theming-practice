<?php get_header(); ?>
<?php //wp_title(); 
?>

<?php if (have_posts()) : ?>
    <div class="row">
        <?php while (have_posts()): the_post(); ?>
            <div class="col-sm-4">
                <div class="card" style="width: 18rem;">
                    <img src="<?= the_post_thumbnail_url() ?>" class="card-img-top" alt="Post feature image">
                    <!--
                    <?php //the_post_thumbnail('post_thumbnail', ['class' => 'card-img-top', 'alt' => 'Post feature image']) 
                    ?>
                    <?php //the_post_thumbnail('medium', ['class' => 'card-img-top', 'alt' => 'Post feature image']) 
                    ?>
                    -->
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title() ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php the_category() ?></h6>
                        <p class="card-text"><?= the_content('Read more') ?></p>
                        <a href="<?= the_permalink() ?>" class="card-link">See more</a>
                        <!--<a href="#" class="card-link">Another link</a>-->
                    </div>
                </div>
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