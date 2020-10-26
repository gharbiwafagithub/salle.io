( function( api ) {

	// Extends our custom "vw-personal-trainer" section.
	api.sectionConstructor['vw-personal-trainer'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );