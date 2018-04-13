jQuery(function($){

    /* Block for hide and show the image url field */

    if ($('#tu_theme_options_form select').val() == 2) {
        $('#tu_theme_options_form .app-upload-image').show();
    } else {
        $('#tu_theme_options_form .app-upload-image').hide();
    }

    $('#tu_theme_options_form select').on('change', function (e) {
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;

        if (valueSelected == 2) {
            $('#tu_theme_options_form .app-upload-image').show('slow');
        } else {
            $('#tu_theme_options_form .app-upload-image').hide('slow');
        }

    });

    /* End Block  */
    
    /* Media for favicon */
    
    var frameFavicon = wp.media({
        title: 'Select or upload favicon',
        button: {
            text: 'Use this media'
        },
        multiple: false // User can select only one image per select
    });

    $('#tu_uploadFaviconBtn').click(function(e){
        e.preventDefault();

        frameFavicon.open();
    });

    frameFavicon.on('select', function(){
        var attachment = frameFavicon.state().get('selection').first().toJSON();
        $('input[name=tu_inputFaviconImg]').val(attachment.url);
    });
    
    /* End Block  */
    
    /* Media for logo */

    var frameLogo = wp.media({
        title: 'Select or upload logo',
        button: {
            text: 'Use this media'
        },
        multiple: false // User can select only one image per select
    });

    $('#tu_uploadLogoImgBtn').click(function(e){
        e.preventDefault();

        frameLogo.open();
    });

    frameLogo.on('select', function(){
        var attachment = frameLogo.state().get('selection').first().toJSON();
        $('input[name=tu_inputLogoImg]').val(attachment.url);
    });
    
    /* End Block  */

});
