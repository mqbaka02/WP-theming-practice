<?php
class AgenceMenuPage
{
    const GROUP= 'agency_options';
    public static function register()
    {
        add_action('admin_menu', [self::class, 'addMenu']);
        add_action('admin_init', [self::class, 'registerSettings']);
        add_action('admin_enqueue_scripts', [self::class, 'registerScripts']);
    }

    public static function registerScripts($suffix)
    {
        if ($suffix === 'settings_page_agency_options') {
            wp_register_style('flatpickr', 'https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.css', [], false);
            wp_register_script('flatpickr', 'https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.js', [], false, true);
            wp_register_script('m_admin', get_template_directory_uri() . '/assets/admin.js', ['flatpickr'], false, true);
            wp_enqueue_script('m_admin');
            wp_enqueue_style('flatpickr');
        }
        // var_dump($suffix); die();
    }

    public static function registerSettings()
    {
        register_setting(self::GROUP, 'agency_schedule');
        register_setting(self::GROUP, 'agency_date');
        add_settings_section('agency_options_section', 'Parameters', function () {
            echo 'Manage Agency settings here.';
        }, self::GROUP);
        add_settings_field('agency_options_schedule', "Opening time", function () {
            ?>
            <textarea name="agency_schedule" cols="30" rows="10" style="width: 100%"><?= esc_html(get_option('agency_schedule')) ?></textarea>
            <?php
        }, self::GROUP, 'agency_options_section');
        add_settings_field('agency_options_date', "Opening time", function () {
            ?>
            <input type="text" name="agency_date" style="width: 100%" value="<?= esc_attr(get_option('agency_date'))?>" class="m_datepicker">
            <?php
        }, self::GROUP, 'agency_options_section');
        // get_option('agency_schedule');
    }

    public static function addMenu()
    {
        add_options_page("Agency management", "Agency", "manage_options", self::GROUP, [self::class, 'render']);
    }

    public static function render()
    {
        ?>
        <h1>Agency management</h1>
        
        <form action="options.php" method="post">
        <?php
            settings_fields(self::GROUP);
            do_settings_sections(self::GROUP);
            submit_button();
        ?>
        </form>
        <?php
    }
}