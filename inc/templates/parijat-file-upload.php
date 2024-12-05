<h1>Parijat Campaign File Upload</h1>
<?php
settings_errors();
// $picture = esc_attr(get_option('profile_picture'));
?>
<input type="hidden" name="custom_upload" value="true">
<form action="options.php" method="POST" class="parijat-file-upload">
    <?php settings_fields('parijat-upload-settings-group'); ?>
    <?php do_settings_sections('parijat-upload-settings'); ?>
    <?php submit_button('Save Changes', 'primary', 'btnSubmit'); ?>
</form>