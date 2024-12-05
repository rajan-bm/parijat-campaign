<?php

// Hook into the upload_dir filter to change the upload folder
function parijat_upload_dir($upload_dir)
{
    $upload_dir['path'] = $upload_dir['basedir'] . '/campaigns';
    $upload_dir['url'] = $upload_dir['baseurl'] . '/campaigns';

    // Make sure the custom folder exists
    if (! is_dir($upload_dir['path'])) {
        wp_mkdir_p($upload_dir['path']); // Create the folder if it doesn't exist
    }

    return $upload_dir;
}
add_filter('upload_dir', 'parijat_upload_dir');