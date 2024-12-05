// if (navigator.clipboard && navigator.clipboard.writeText){
//     console.log('Clipboard API available');
// }else{
//     console.log('Clipboard API not available');
// }


jQuery(document).ready(function ($) {

    var mediaUploader;

    $('#copy-to-clipboard').on('click', function (e) {
        e.preventDefault();
        var copyText = $('#uploaded-file').val();
    
        if (copyText) {
            // Create a temporary text input
            var tempInput = $('<input>');
            $('body').append(tempInput);
            tempInput.val(copyText).select(); // Set the input value and select it
    
            try {
                document.execCommand('copy'); // Copy the text
                alert('File URL copied to clipboard!');
            } catch (err) {
                alert('Failed to copy URL: ' + err);
            }
    
            tempInput.remove(); // Clean up
        } else {
            alert('No file URL to copy!');
        }
    });
    

    // Open Media Uploader
    $('#upload-button').on('click', function (e) {
        e.preventDefault();

        if (mediaUploader) {
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media({
            title: 'Choose a File',
            button: {
                text: 'Choose a File',
            },
            multiple: false,
        });

        mediaUploader.on('select', function () {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#uploaded-file').val(attachment.url);
            $('#upload-button').val('Change File');

            // Update the displayed file name, replacing existing content
            $('#uploaded-file-name').html('<b>Selected File Name: </b>' + attachment.filename);
        });

        mediaUploader.open();
    });

    // Handle submit button
    $('#btnSubmit').on('click', function (e) {
        console.log("bang bang");
    });
});
