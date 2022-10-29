(function($) {
    $(document).ready(function() {
        const wpOpenGallery = function(o, callback) {
            const options = (typeof o === 'object') ? o : {};

            // Predefined settings
            const defaultOptions = {
                title: 'Select Media',
                fileType: 'image',
                multiple: false,
                currentValue: '',
            };

            const opt = { ...defaultOptions, ...options };

            let image_frame;

            if(image_frame){
                image_frame.open();
            }

            // Define image_frame as wp.media object
            image_frame = wp.media({
                title: opt.title,
                multiple : opt.multiple,
                library : {
                    type : opt.fileType,
                }
            });

            image_frame.on('open',function() {
                // On open, get the id from the hidden input
                // and select the appropiate images in the media manager
                const selection =  image_frame.state().get('selection');
                const ids = opt.currentValue.split(',');

                ids.forEach(function(id) {
                    const attachment = wp.media.attachment(id);
                    attachment.fetch();
                    selection.add( attachment ? [ attachment ] : [] );
                });
            });

            image_frame.on('close',function() {
                // On close, get selections and save to the hidden input
                // plus other AJAX stuff to refresh the image preview
                const selection =  image_frame.state().get('selection');
                const files = [];

                selection.each(function(attachment) {
                    files.push({
                        id: attachment.attributes.id,
                        filename: attachment.attributes.filename,
                        url: attachment.attributes.url,
                        type: attachment.attributes.type,
                        subtype: attachment.attributes.subtype,
                        sizes: attachment.attributes.sizes,
                    });
                });

                if (files[0]['url'] != undefined ) {
                    document.getElementById('image_id_4').value = files[0]['id'];
                    document.getElementById('image-preview').src = files[0]['url'];
                }

                callback(files);
            });

            image_frame.open();
        }
		jQuery('#upload_image_button').on('click', function( event ){  wpOpenGallery(null, function() {

		}); });
    })
}(jQuery));

