// JavaScript Document
		jQuery(document).ready(function($) {
			$("a.alpha-scope-image").fancybox({
				'overlayShow'	: true,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic',
				'titlePosition' : 'inside',
				'overlayOpacity': '0.7',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					var patern = /^([^|]*)\|(.*)$/im;
					result = patern.exec(title);
					html = '<div class="inside">';
					if(result)
						html += (title.length ? (result[1] + '<p>' + result[2] + '</p>') : '');
					else
						html += title;
					html += '</div>';
					return html;
				}
			});
			$("a.alpha-scope-video").fancybox({
				'overlayShow'	: true,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic',
				'titlePosition' : 'inside',
				'overlayOpacity': '0.7',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					var patern = /^([^|]*)\|(.*)$/i;
					result = patern.exec(title);
					html = '<div class="inside">';
					if(result)
						html += (title.length ? (result[1] + '<p>' + result[2] + '</p>') : '');
					else
						html += title;
					html += '</div>';
					return html;
				}
			});
		});