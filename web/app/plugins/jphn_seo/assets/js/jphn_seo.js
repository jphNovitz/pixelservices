document.addEventListener('DOMContentLoaded', () => {

    var mediaUploader
    const uploadButton = document.getElementById('upload-button');
    const imageUrl = document.getElementById('image_url');
    if (uploadButton) {
        uploadButton.addEventListener('click', (e) => {
            e.preventDefault()
            e.stopImmediatePropagation()
            if (mediaUploader) {
                mediaUploader.open();
                return;
            }
            mediaUploader = wp.media.frames.file_frame = wp.media({
                title: 'Ajout d\'une image',
                button: {
                    text: 'Choisissez une image'
                },
                multiple: false
            });
            mediaUploader.on('select', (e) => {
                console.log('e')
                let attachement = mediaUploader.state().get('selection').first().toJSON()
                imageUrl.value = attachement.url
            })
            mediaUploader.open();
        })
    }

});
