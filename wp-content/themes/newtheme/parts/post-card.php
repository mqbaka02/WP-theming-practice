<div class="card" style="width: 18rem;">
    <img src="<?= the_post_thumbnail_url() ?>" class="card-img-top" alt="Post feature image">
    <!--
    <?php //the_post_thumbnail('post_thumbnail', ['class' => 'card-img-top', 'alt' => 'Post feature image']) 
    ?>
    <?php //the_post_thumbnail('medium', ['class' => 'card-img-top', 'alt' => 'Post feature image']) 
    ?>
    <?php //the_post_thumbnail('card-header', ['class' => 'card-img-top', 'alt' => 'Post feature image'])
    //REFER TO functions.php FOR ADDING CUSTOM IMAGE SIZES
    ?>
    -->
    <div class="card-body">
        <h5 class="card-title"><?php the_title() ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?php the_category() ?></h6>
        <ul>
            <?php the_terms(get_the_ID(), 'sport', '<li>', '</li><li>', '</li>') ?>
        </ul>
        <?php //var_dump(get_the_terms(get_the_ID(), 'sport')) 
        ?>
        <p class="card-text"><?= the_content('Read more') ?></p>
        <a href="<?= the_permalink() ?>" class="card-link">See more</a>
        <!--<a href="#" class="card-link">Another link</a>-->
    </div>
</div>