<?php
class AgenceMenuPage
{
    public static function register()
    {
        add_action('admin_menu', [self::class, 'addMenu']);
    }

    public static function addMenu()
    {
        add_options_page("Gestion de l'agence", "Agence", "manage_options", 'agence_options', [self::class, 'render']);
    }

    public static function render()
    {
        echo "Hello people :3";
    }
}