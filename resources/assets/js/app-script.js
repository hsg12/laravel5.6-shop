$(function(){

	let href = window.location.href;

	/* To leave open admin menu when it active and for highlighting */

	let neededLink = $('#exampleAccordion').find('a[href="' + href + '"]');
	let neededLinkParentsUl = neededLink.parents('ul');

	neededLink.addClass('active-color');
	neededLinkParentsUl.addClass('show');
	neededLinkParentsUl.siblings('a').removeClass('collapsed');

	/*  */

});