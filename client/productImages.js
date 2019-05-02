/**
 * elevateZoom-Plus Configuration
 * Ref: http://igorlino.github.io/elevatezoom-plus/api.htm
 */
(function ($) {
	'use strict';
	$(function(){
		// set up the zooming
		$('#MainProductImage').ezPlus({
            borderSize: 0,
            cursor: 'crosshair',
			gallery: 'ProductImageGallery',
			galleryActiveClass: 'active',
			imageCrossfade: true,
            lenszoom: true,
            //lensSize: 10000,
            //lensShape: 'round',
			//lensFadeIn: 200,
			//lensFadeOut: 200,
            //responsive: true,
            //scrollZoom : true,
            zoomWindowFadeIn: 200,
			zoomWindowFadeOut: 200,
            zoomType: 'inner'
		});
	});
}(jQuery));
