<?php

/**
 * @package Parijat Upload
 */

// Enqueue admin scripts.
function parijat_admin_enqueue_scripts($hook)
{
    wp_enqueue_style('parijat-admin-style', plugin_dir_url(__DIR__) . 'assets/css/admin-style.css');

    wp_enqueue_media(); // Required for media uploader else it won't work

    wp_enqueue_script('parijat-admin-script', plugin_dir_url(__DIR__) . 'assets/js/admin-script.js', ['jquery'], '1.0.0', true);
}
add_action('admin_enqueue_scripts', 'parijat_admin_enqueue_scripts');
