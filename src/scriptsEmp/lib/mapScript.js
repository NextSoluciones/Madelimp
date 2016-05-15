;( function( $, window, document, undefined )
		{
			var $window			= $( window ),
				mapInstances	= [],
				$pluginInstance	= $( '.google-map' ).lazyLoadGoogleMaps(
				{
					callback: function( container, map )
					{
						var $container	= $( container ),
							center		= new google.maps.LatLng( $container.attr( 'data-lat' ), $container.attr( 'data-lng' ) );

						map.setOptions({ zoom: 17, center: center, scrollwheel: false });
						new google.maps.Marker({ position: center, map: map });

						$.data( map, 'center', center );
						mapInstances.push( map );

						var updateCenter = function(){ $.data( map, 'center', map.getCenter() ); };
						google.maps.event.addListener( map, 'dragend', updateCenter );
						google.maps.event.addListener( map, 'zoom_changed', updateCenter );
						google.maps.event.addListenerOnce( map, 'idle', function(){ $container.addClass( 'is-loaded' ); });
					}
				});

			$window.on( 'resize', $pluginInstance.debounce( 1000, function()
			{
				$.each( mapInstances, function()
				{
					this.setCenter( $.data( this, 'center' ) );
				});
			}));

			})( jQuery, window, document );
