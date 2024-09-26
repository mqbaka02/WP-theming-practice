<?php get_header(); ?>
<?php //wp_title(); 
?>

<?php $sports= get_terms(['taxonomy'=> 'sport']) ?>
<ul class='nav nav-pills my-4'>
    <?php foreach ($sports as $sport): ?>
        <li class="nav-item">
            <a href="<?= get_term_link($sport) ?>" class="nav-link <?=  is_tax('sport', $sport->term_id) ? 'active': '' ?>"><?= $sport->name ?></a>
        </li>
    <?php endforeach ?>
</ul>

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