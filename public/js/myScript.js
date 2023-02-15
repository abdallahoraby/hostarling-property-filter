jQuery( function( $ ) {


    jQuery('#carouselExampleControls .carousel-item').eq(0).addClass('active');

    var getParams = function (url) {
        var params = {};
        var parser = document.createElement('a');
        parser.href = url;
        var query = parser.search.substring(1);
        var vars = query.split('&');
        for (var i = 0; i < vars.length; i++) {
            var pair = vars[i].split('=');
            params[pair[0]] = decodeURIComponent(pair[1]);
        }
        return params;
    };

    jQuery('.select_developer').on('change', function () {
        let params = getParams(window.location.href);
        let term = params.term;
        let location = params.location;

        let developer = jQuery(this).val(); // get selected value
        let home_url = jQuery('#home_url').val();
        if (developer) { // require a URL
            window.location = home_url + '/projects?term=' + term + '&developer=' + developer + '&location=' + location; // redirect
        }
        return false;
    });


    jQuery('.select_location').on('change', function () {
        let params = getParams(window.location.href);
        let term = params.term;
        let developer = params.developer;

        let location = jQuery(this).val(); // get selected value
        let home_url = jQuery('#home_url').val();
        if (location) { // require a URL
            window.location = home_url + '/projects?term=' + term + '&developer=' + developer + '&location=' + location; // redirect
        }
        return false;
    });


    jQuery('label.redish:not(.active_sector)').addClass('not_active')



    jQuery('.box select').select2();


	// make single page full width
	let banner = jQuery('.banner-liquid');
	if( banner.length > 0 ){
		jQuery('body').addClass('full_width_container');
	} 



});