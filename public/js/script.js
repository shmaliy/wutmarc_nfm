(function( $ ) {
	
	var container = '#support';
	var baseUrl = '/' + lang + '/support/';
	
	var methods = {
		init: function () {
			$('#submit-element').append('<div class="form-loader"><div>');
			$('.form-loader').hide();
		},
		
		request: function ()
		{
			$(this).supportManager('errorsHide');
			console.log('request');
			//$(container).html('<div class="loader"></div>');
			$('#submit-element > #submit').hide();
			$('.form-loader').show();
			$.ajax({
				url: baseUrl,
				data: $('#CustomerSupport').serialize(),
				type: 'POST',
				error: function(jqXHR, textStatus, errorThrown) {
					
				},
				success: function(data, textStatus, jqXHR) {
					//$(container).html(jqXHR.responseText);
					var response = jQuery.parseJSON(jqXHR.responseText);
					
					if (response['formErrors']) {
						var nameErrors = response['formErrors']['name'].length;
					} else {
						var nameErrors = 0;
					}
					
					if (response['formErrors']) {
						var phoneErrors = response['formErrors']['phone'].length;
					} else {
						var phoneErrors = 0;
					}
					
					if (response['formErrors']) {
						var emailErrors = response['formErrors']['email'].length;
					} else {
						var emailErrors = 0;
					}
					if (response['formErrors']) {
						var questionErrors = response['formErrors']['question'].length;
					} else {
						var questionErrors = 0;
					}
					
					
					if (nameErrors+phoneErrors+emailErrors+questionErrors > 0) {
						$(this).supportManager('parseErrors', response['formErrorMessages']);
						$('.form-loader').hide();
						$('#submit-element > #submit').show();
					} else {
						$('#support').html('<div class="success">' + response['success'] + '</div>')
					}
				},
				complete: function(jqXHR, textStatus) {
										
				}
			});
			return false;
		},
		
		errorsHide: function ()
		{
			$('.form-error').remove();
			
//			var fields = $('#CustomerSupport dd .form-error');
//			
//			for (var i=0; i<fields.length; $i++) {
//				fields[i].remove();
//			}
		},
		
		parseErrors: function (messages)
		{
			for (var key in messages) {
				console.log(key);
				for ( var subkey in messages[key]) {
					console.log('-- ' +  messages[key][subkey][lang]);
					$('#' + key + '-element').append('<div class="form-error">' +  messages[key][subkey][lang] + '</div>');
				}
			}
		}
	};
	
	$.fn.supportManager = function( method ) {
  
		if ( methods[method] ) {
			return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
		} else if ( typeof method === 'object' || ! method ) {
			return methods.init.apply( this, arguments );
		} else {
			$.error( 'Method ' +  method + ' does not exist on jQuery.tooltip' );
		}    

	};
})( jQuery );



(function( $ ) {
	
	var container = '#latest-news-contaioner';
	var baseUrl = '/content/new-index/last-news/limit/5/offset/0/category/news/page/1/first/true/lang/' + lang;
	
	var methods = {
		init: function () {
			$(this).newsManager('request', baseUrl);	
		},
		
		request: function (url, data)
		{
			console.log('request');
			if (!data) {
				data = {format:'html'};
			}
			$(container).html('<div class="loader"></div>');
			$.ajax({
				url: url,
				data: data,
				type: 'POST',
				error: function(jqXHR, textStatus, errorThrown) {
					
				},
				success: function(data, textStatus, jqXHR) {
					$(container).html(jqXHR.responseText);
				},
				complete: function(jqXHR, textStatus) {
										
				}
			});
			return false;
		}
	};
	
	$.fn.newsManager = function( method ) {
  
		if ( methods[method] ) {
			return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
		} else if ( typeof method === 'object' || ! method ) {
			return methods.init.apply( this, arguments );
		} else {
			$.error( 'Method ' +  method + ' does not exist on jQuery.tooltip' );
		}    

	};
})( jQuery );

(function( $ ) {
	
	var container = '#latest-refer-container';
	var baseUrl = '/content/new-index/last-reference/limit/5/offset/0/category/reference/page/1/first/true/lang/' + lang;
	
	var methods = {
		init: function () {
			$(this).refManager('request', baseUrl);	
		},
		
		request: function (url, data)
		{
			console.log('request');
			if (!data) {
				data = {format:'html'};
			}
			$(container).html('<div class="loader"></div>');
			$.ajax({
				url: url,
				data: data,
				type: 'POST',
				error: function(jqXHR, textStatus, errorThrown) {
					
				},
				success: function(data, textStatus, jqXHR) {
					$(container).html(jqXHR.responseText);
				},
				complete: function(jqXHR, textStatus) {
										
				}
			});
			return false;
		}
	};
	
	$.fn.refManager = function( method ) {
  
		if ( methods[method] ) {
			return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
		} else if ( typeof method === 'object' || ! method ) {
			return methods.init.apply( this, arguments );
		} else {
			$.error( 'Method ' +  method + ' does not exist on jQuery.tooltip' );
		}    

	};
})( jQuery );

//Observe generic menu class toggle
function hoverMaker()
{
	$('ul.generic-menu li, tr').each(function(){
		$(this).hover(
			function(){ $(this).addClass("hover"); },
			function(){ $(this).removeClass("hover"); }
		);
	});
}

//Observe generic menu class toggle
function prodCategoriesHoverMaker()
{
	$('.subcategories-list li a').each(function(){
		$(this).hover(
			function(){ $(this).addClass("hover"); },
			function(){ $(this).removeClass("hover"); }
		);
	});
}

$(document).ready(function(){
	$.fn.newsManager('init');
	$.fn.refManager('init');
	$.fn.supportManager('init');
	hoverMaker();
	prodCategoriesHoverMaker();
});







