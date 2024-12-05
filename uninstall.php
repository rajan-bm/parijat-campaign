<?php
// Ensure this file is called by WordPress, not directly
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

// Delete the uploaded files (optional)
$upload_dir = wp_upload_dir()['basedir'] . '/myfiles/';
if (file_exists($upload_dir)) {
    array_map('unlink', glob($upload_dir . "*")); // Deletes all files in the directory
    rmdir($upload_dir); // Deletes the directory itself
}

// Delete plugin options
delete_option('parijat_file');
