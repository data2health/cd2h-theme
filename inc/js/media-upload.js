jQuery(function($) {

  var file_frame;

  $(document).on('click', 'a.image-add', function(e) {

    e.preventDefault();
    var t = $(this);

    if (file_frame) file_frame.close();

    file_frame = wp.media.frames.file_frame = wp.media({
      title: $(this).data('uploader-title'),
      button: {
        text: $(this).data('uploader-button-text'),
      },
      multiple: false
    });

    file_frame.on('select', function() {
      var attachment = file_frame.state().get('selection').first().toJSON();;

      t.parent().find('input:hidden').val(attachment.id);
      t.parent().find('img.image-preview').attr('src', attachment.sizes.thumbnail.url);
      t.parent().find('.change-section').show();
      t.hide();
    });

    file_frame.open();

  });

  $(document).on('click', 'a.change-image', function(e) {

    e.preventDefault();

    var that = $(this);

    if (file_frame) file_frame.close();

    file_frame = wp.media.frames.file_frame = wp.media({
      title: $(this).data('uploader-title'),
      button: {
        text: $(this).data('uploader-button-text'),
      },
      multiple: false
    });

    file_frame.on( 'select', function() {
      attachment = file_frame.state().get('selection').first().toJSON();
      var container = tha.closest('.media-section');
      container.find('input:hidden').val(attachment.id);
      container.find('img.image-preview').attr('src', attachment.sizes.thumbnail.url);
    });

    file_frame.open();

  });

  $(document).on('click', 'a.remove-image', function(e) {
    e.preventDefault();
    var container = $(this).closest('.media-section');
    container.find('input:hidden').val('');
    container.find('img.image-preview').attr('src', '');
    container.find('.change-section').hide();
    container.find('.image-add').show();
  });

});
