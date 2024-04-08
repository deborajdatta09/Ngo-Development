( function( api ) {

	// Extends our custom "ngo-organization" section.
	api.sectionConstructor['ngo-organization'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );