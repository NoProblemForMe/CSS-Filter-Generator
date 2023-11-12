<?php
/*
Plugin Name: CSS Filter Generator
Description: Plugin to calculate filter value based on HEX code
Version: 1.0
Author: Antonio Aiello
Author URI: https://antonioaiello.de
*/

namespace AntonioAiello\CSSFilterGenerator;

if (!defined('ABSPATH')) exit;

class CustomColorFilter
{
    public function __construct()
    {
        \add_action('admin_menu', array($this, 'create_plugin_tools_page'));
        \add_action('admin_enqueue_scripts', array($this, 'enqueue_assets'));
        \add_action('plugins_loaded', array($this, 'load_plugin_textdomain'));
    }

    public function create_plugin_tools_page()
    {
        \add_management_page(
            __('CSS Filter Generator', 'css-filter-generator'),
            __('CSS Filter Generator', 'css-filter-generator'),
            'manage_options',
            'css-filter-generator',
            array($this, 'settings_page_content')
        );
    }

    public function settings_page_content()
    {
        include_once plugin_dir_path(__FILE__) . 'admin-page.php';
    }

    public function enqueue_assets($hook)
    {
        if ($hook != 'tools_page_css-filter-generator') {
            return;
        }

        \wp_enqueue_style(
            'css-filter-generator_style',
            plugin_dir_url(__FILE__) . 'css/css-filter-generator.css',
            array(),
            '1.0',
            'all'
        );

        \wp_enqueue_script(
            'css-filter-generator_script',
            plugin_dir_url(__FILE__) . 'js/admin-script.js',
            array(),
            '1.0',
            true
        );

        $translations = array(
            'invalidFormat' => __('Invalid format!', 'css-filter-generator'),
            'perfectResult' => __('Das ist ein perfektes Ergebnis.', 'css-filter-generator'),
            'closeEnough' => __('Das ist nahe genug.', 'css-filter-generator'),
            'slightDeviation' => __('Die Farbe weicht etwas ab. Erwägen Sie, es nochmal auszuführen.', 'css-filter-generator'),
            'extremeDeviation' => __('Die Farbe weicht extrem ab. Führen Sie es nochmal aus!', 'css-filter-generator'),
            'copyError' => __('Fehler beim Kopieren: ', 'css-filter-generator')
        );

        \wp_localize_script('css-filter-generator_script', 'translations', $translations);
    }

    public function load_plugin_textdomain()
    {
        \load_plugin_textdomain('css-filter-generator', false, basename(dirname(__FILE__)) . '/languages/');
    }
}

new CustomColorFilter();
