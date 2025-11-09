( function( $ ) {
	$( 'th.sort' ).on( 'click', function() {
		var key = $( this ).data( 'sort' );
		var currentOrder = $( this ).data( 'order' );
		var isActive = $( this ).hasClass( 'active' );
		var queryOrder;

		if ( 'DESC' === currentOrder ) {
			if ( isActive ) {
				queryOrder = 'ASC';
			} else {
				queryOrder = 'DESC';
			}
		} else if ( 'ASC' === currentOrder ) {
			if ( isActive ) {
				queryOrder = 'DESC';
			} else {
				queryOrder = 'ASC';
			}
		}

		$( 'th.sort' ).data( 'order', 'DESC' );
		$( this ).data( 'order', queryOrder );

		$( 'th.sort' ).removeClass( 'active' );
		$( '.caret' ).empty();
		$( this ).addClass( 'active' );

		if ( 'DESC' === queryOrder ) {
			$( '.caret', this ).html( '▼' );
		} else {
			$( '.caret', this ).html( '▲' );
		}

		$( '.cities-data' )
			.empty()
			.append( 'Loading...' );

		$.get( cityTableRestUrl, { 'sort_by': key, 'order': queryOrder }, function( response ) {
			$( '.cities-data' )
				.empty()
				.append( response );
		});
	});
}( jQuery ) );
