jQuery(document).ready(function($){
    		$.adaptiveBackground.run();
    		function cambiocolor(color) {
    			$(".product-image-wrapper").css({
    				"background-color": color,
    				"filter": 'blur(5px)'
    			});
    			// body...

    		}
    		function obtenercolor(src){
    			var img = document.createElement('img');
				img.setAttribute('src',src);
				img.addEventListener('load', function(){
				    var vibrant = new Vibrant(img);
				    var swatches = vibrant.swatches();
				    for (var swatch in swatches)
				        if (swatches.hasOwnProperty(swatch) && swatches[swatch])
				            console.log(swatch, swatches[swatch].getHex());
				});
			}
			$(document).on('click', '.books', function() {
				var img="";
				img=$(this).attr("src");
				obtenercolor(img);
				$(this).on('ab-color-found', function(ev,payload){
				  console.log(payload.color);   // The dominant color in the image.
				  console.log(payload.palette); // The color palette found in the image.
				  console.log(ev);   // The jQuery.Event object
				});	
				alert(1);
			});
    	});