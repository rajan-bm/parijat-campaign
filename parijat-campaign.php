<?php

/**
 * Plugin Name: Parijat Campaign
 * Description: A plugin to upload files via a settings page.
 * Version: 1.0
 * Author: Rajan BM / Parijat Infotech
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Include required files
require_once plugin_dir_path(__FILE__) . 'inc/settings.php';
require_once plugin_dir_path(__FILE__) . 'inc/file-handler.php';

/**
 * Plugin Activation Hook
 */
function parijat_activate()
{
    $upload_dir = wp_upload_dir()['basedir'] . '/campaigns';

    // Check if the directory exists, if not, create it
    if (! file_exists($upload_dir)) {
        wp_mkdir_p($upload_dir);
    }
}
register_activation_hook(__FILE__, 'parijat_activate');

/**
 * Plugin Deactivation Hook
 */
function parijat_deactivate()
{
    // rewrite flush rules
    flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'parijat_deactivate');

/**
 * Include css and js
 */
require_once plugin_dir_path(__FILE__) . '/inc/enqueue.php';

/**
 * Include file handler
 */
require_once plugin_dir_path(__FILE__) . '/inc/file-handler.php';