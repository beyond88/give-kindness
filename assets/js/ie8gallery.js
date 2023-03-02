 /**
 * ie8GalleryJQuery 1.0
 * A very simple gallery supported by Internet Explorer 8
 * 
 * http://www.kmgt.de/ie8Gallery/
 * 
 * Copyright 2018, Murat Karaca
 * kmgt - karaca, motz, getaltung, technik
 * http://www.kmgt.de/
 * 
 * Licensed under MIT
 * 
 * Released on: November 5, 2018
 */

(function($){

    $.fn.ie8Gallery = function(options, callback) {
    
        // default settings
        var settings = $.extend({
            thumbs:         '.thumbs',          // classname for thumbnail container
            thumb:          '.thumb',           // classname for thumbnails
            galleryImage:   '.galleryimage',    // classname for the gallery image
            underlay:       '.underlay',        // classname for underlay
            overlay:        '.overlay',         // classname for overlay
            btnPrev:        '.prev',            // classname for previous button
            btnNext:        '.next',            // classname for next button
        }, options);
        
        // some vars
        var base = {};
        var images = [];
        var currentImageIndex = 0;
        
        // initialize the plugin
        base.init = function() {

            // overwrite settings
            $.extend(true, settings, options);

            // setup and bind events to the gallery
            base.setup();
            base.events();

        }

        // setup the gallery
        base.setup = function() {

            // build an array with image sources
            $(settings.thumb).each(function () {
                images.push($(this).attr('data-img-src'));
            });

            // append some unvisible markup for overlay and gallery popup
            // if you want your js clean of markup, take this block out and put it as pur HTML anywhere you need it
            var markup = '';
                markup += ' <div class="' + settings.underlay.substr(1) + '"></div>';
                markup += ' <div class="' + settings.overlay.substr(1) + '">';
                markup += '     <div class="' + settings.galleryImage.substr(1) + '">';
                markup += '         <img />';
                markup += '     </div>';
                markup += '     <div class="' + settings.btnPrev.substr(1) + '"></div>';
                markup += '     <div class="' + settings.btnNext.substr(1) + '"></div>';
                markup += ' </div>';
            $('body').append(markup);

            if (images.length < 2) {
                $(settings.btnPrev + ',' + settings.btnNext).hide();
            }
            
        };

        // bind click events (open, prev, next)
        base.events = function(){

            // click on a thumbnail
            $(document).on('click', settings.thumb, function (e) {
                var currentImageSource = $(this).attr('data-img-src');
                $(settings.thumb).each(function (i) {
                    if ($(this).attr('data-img-src') == currentImageSource) {
                        currentImageIndex = i;
                        $(settings.underlay).css({ 'visibility' : 'visible' }).animate({ opacity: 0.6 }, 250, 'linear', function() {
                           $(settings.overlay).css({ 'visibility' : 'visible' }).animate({opacity: 1}, 250, 'linear');
                        });
                        $(settings.galleryImage + ' img').attr('src', images[currentImageIndex]);
                    }
                });
                $('html, body').stop().animate({ scrollTop: 0 }, 'slow');
            });

            // close image
            $(document).on('click', settings.galleryImage + ',' + settings.underlay, function (e) {
                e.preventDefault();
                $(settings.underlay + ',' + settings.overlay).animate({ opacity: 0 }, 250, 'linear', function() {
                    $(settings.underlay + ',' + settings.overlay).css({ 'visibility': 'hidden' });
                });
            });
    
            // previous image
            $(document).on('click', settings.btnPrev, function (e) {
                e.preventDefault();
                currentImageIndex = --currentImageIndex < 0 ? images.length - 1 : currentImageIndex;
                if (currentImageIndex < 0) currentImageIndex = images.length - 1;
                $(settings.galleryImage + ' img').attr('src', images[currentImageIndex]);
            });
    
            // next image
            $(document).on('click', settings.btnNext, function (e) {
                e.preventDefault();
                currentImageIndex = ++currentImageIndex > images.length - 1 ? 0 : currentImageIndex;
                $(settings.galleryImage + ' img').attr('src', images[currentImageIndex]);
            });

        };
        
        return this.each(function() {

            base.init();

        });
    }

}(jQuery));
   
// use this in your HTML if you need to change the parameters with the plugin call
/* 
$(document).ready(function(){
    $('.thumbs').ie8Gallery({
            thumbs:         '.thumbs',          // classname for thumbnail container
            thumb:          '.thumb',           // classname for thumbnails
            galleryImage:   '.galleryimage',    // classname for the gallery image
            underlay:       '.underlay',        // classname for underlay
            overlay:        '.overlay',         // classname for overlay
            btnPrev:        '.prev',            // classname for previous button
            btnNext:        '.next',            // classname for next button
        }
    );
  $('.thumbs').ie8Gallery();
});
*/