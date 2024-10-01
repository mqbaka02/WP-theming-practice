<?php
class AgenceMenuPage
{
    const GROUP= 'agency_options';
    public static function register()
    {
        add_action('admin_menu', [self::class, 'addMenu']);
        add_action('admin_init', [self::class, 'registerSettings']);
    }

    public static function registerSettings()
    {
        register_setting(self::GROUP, 'agency_schedule');
        add_settings_section('agency_options_section', 'Parameters', function () {
            echo 'Manage Agency settings here.';
        }, self::GROUP);
        add_settings_field('agency_options_schedule', "Opening time", function () {
            ?>
            <textarea name="agency_schedule" cols="30" rows="10" style="width: 100%"><?= get_option('agency_schedule') ?></textarea>
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