// These are the scripts that make the Site work
	var $ = jQuery.noConflict();
	(function($) {
 	$(function() {
	$(document).ready(function() {
				
// Add additional class for sidebar links
$(function() {
           $('.lazy').lazy({

          
            // called before an elements gets handled
            beforeLoad: function(element) {
                var imageSrc = element.data('src');
                //console.log('image "' + imageSrc + '" is about to be loaded');
            },
            
            // called after an element was successfully handled
            afterLoad: function(element) {
                var imageSrc = element.data('src');
                //console.log('image "' + imageSrc + '" was loaded successfully');
            }
        });
    });
	
		
	});
	});
	})(jQuery);