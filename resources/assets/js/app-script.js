$(function(){

	let href = window.location.href;

	/* To leave open admin menu when it active and for highlighting */

	let linksLength = $('#exampleAccordion > li > a').length;

	for (var i = 0; i <= linksLength ; i++) {
		const accordionLink = $('#exampleAccordion li ul li:eq(' + i + ') a');
		let attrHref = accordionLink.attr('href');

		if ( href.match(new RegExp('^' + attrHref)) ) {  
			accordionLink.addClass('active-color');  
			accordionLink.parents('ul').addClass('show');  
			accordionLink.parents('ul').siblings('a').removeClass('collapsed');
			break;
		}
	}

	/*  */

	$('.confirm-plugin-delete').jConfirmAction({
		question: 'Are you sure?',
		noText: 'Cancel'
	});

});