$(function(){
	var pathname = window.location.pathname;
	var href = window.location.href;

	/* To leave the open admin menu when it active */

	if ( href.match(new RegExp('/admin/product')) ) {       
		$('#collapse-product-li a').removeClass('collapsed');
		$('#collapse-product-li > ul').addClass('show');
	}


	/* For highlighting admin menu */

	var linksLength = $('#exampleAccordion > li > a').length;

	for (var i = 0; i < linksLength ; i++) {
		var attrHref = $('#exampleAccordion li ul li:eq(' + i + ') a').attr('href');

		if ( href.match(new RegExp('^' + attrHref)) ) {       
			$('#exampleAccordion li ul li:eq(' + i + ') a').addClass('active-color');   
			break;
		}
	}


	/*  */

});