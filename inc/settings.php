<?php
function parijat_add_admin_page()
{
    // Add main menu
    add_menu_page(
        'Parijat Upload',
        'Campaigns',
        'manage_options',
        'parijat_upload',
        'parijat_upload_page',
        'dashicons-upload',
        20, // menu position
    );

    // Add sub menu
    add_submenu_page(
        'parijat_upload_settings',
        'Parijat File Upload',
        'Parijat Upload',
        'manage_options',
        'parijat_upload',
        'parijat_upload_page'
    );

    // Activate Custom Settings
    add_action('admin_init', 'parijat_custom_settings');
}
add_action('admin_menu', 'parijat_add_admin_page');


function parijat_custom_settings()
{
    register_setting('parijat-upload-settings-group', 'parijat_uploaded_file');

    add_settings_section(
        'parijat-upload-section',
        'Upload a File',
        '',
        'parijat-upload-settings'
    );

    add_settings_field(
        'parijat-upload-file',
        'Upload File',
        'parijat_upload_file_callback',
        'parijat-upload-settings',
        'parijat-upload-section'
    );
}

function parijat_upload_file_callback()
{
    $parijat_uploaded_file = esc_attr(get_option('parijat_uploaded_file'));
    $parijat_uploaded_file_name = basename($parijat_uploaded_file); ?>

    <input type="button" id="upload-button" class="button button-secondary" value="Change File">
    <input type="hidden" id="uploaded-file" name="parijat_uploaded_file" value="<?php echo $parijat_uploaded_file ?>">
    <p id="uploaded-file-name"><b>Selected File Name: </b><?php echo $parijat_uploaded_file_name; ?></p>
    <input type="button" id="copy-to-clipboard" class="button button-secondary" value="Copy to Clipboard">
    <br>
    <br>
    <?php
    if ($parijat_uploaded_file) {
        echo '<a href=" '  . $parijat_uploaded_file . ' " target="_blank">View Saved File</a>';
    }
}


function parijat_upload_page()
{
    include plugin_dir_path(__FILE__) . 'templates/parijat-file-upload.php';
}
