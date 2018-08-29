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

	/* For delete button */

	$('.confirm-plugin-delete').jConfirmAction({
		question: 'Are you sure?',
		noText: 'Cancel'
	});

	/* For categories accordion */

	$(".topnav").accordion({
		accordion:true,
		speed: 500,
		closedSign: '<i class="fa fa-caret-left" aria-hidden="true"></i>',
        openedSign: '<i class="fa fa-caret-down" aria-hidden="true"></i>'
	});

	/* In order do not work link which has children */

    $('ul.topnav li a').on('click', function(){
        if ($(this).parent('li').has('ul').length != 0) {
            return false;
        }
    });

    /* For Bootstrap 4 Tooltip */

    $('[data-toggle="tooltip"]').tooltip();

    // Back to top

    if ($(document).height() > 2000) {

        $('*').removeClass('footer-vertical-aligment');

        $('#back-to-top-container').show();
        $('#back-to-top').click(function () {           
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    }

    // Category highlighting

    $('.topnav').find('a[href="' + href + '"]').addClass('category-active-color');

    // For filtering users in admin/users area

    $("#usersSearch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#usersTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    //


});