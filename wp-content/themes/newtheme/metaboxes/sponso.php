<?php


class SponsoMetaBox {

    const META_KEY= 'm_sponsor';
    const NONCE= '_m_sponsor_nonce';

    public static function register ()
    {
        add_action('add_meta_boxes', [self::class, 'add'], 10, 2);
        add_action('save_post', [self::class, 'save']);
    }

    public static function add ($postType, WP_Post $post)
    {
        if ($postType=== 'post' && current_user_can('publish_post', $post)) {
            add_meta_box(self::META_KEY, 'Sponsoring', [self::class, 'render'], 'post', 'side');
        }
    }


    public static function render (WP_Post $post)
    {
        $value= get_post_meta($post->ID, self::META_KEY, true);
        wp_nonce_field(self::NONCE, self::NONCE);
        ?>
        <input type="hidden" value="0" name="<?= self::META_KEY ?>">
        <input type="checkbox" value='1' name="<?= self::META_KEY ?>" <?= $value=== '1' ? 'checked' : '' ?>>
        <label for="<?= self::META_KEY ?>">This article is sponsorized ?</label>
        <?php
    }

    public static function save ($post_id)
    {
        if (
            array_key_exists(self::META_KEY, $_POST) &&
            current_user_can('publish_post', $post_id) &&
            wp_verify_nonce($_POST[self::NONCE], self::NONCE)
            ) {
            if ($_POST[self::META_KEY]== 0) {
                delete_post_meta($post_id, self::META_KEY);
            } else {
                update_post_meta($post_id, self::META_KEY, 1);
            }
        }
    }
}