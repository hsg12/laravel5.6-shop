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

    /* Back to top */

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

    /* Category highlighting */

    $('.topnav').find('a[href="' + href + '"]').addClass('category-active-color');

    /* For filtering users in admin/users area */

    $("#usersSearch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#usersTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    /* Plus product count */

    $('.plus-product').on('click', function(){

        if (href != 'http://shop.loc/cart') {
            // For product page
            var productPriceContainer = $(this).parentsUntil('.product-data-aside').siblings('div').find('.product-price');
        } else {
            // For cart page
            var productPriceContainer = $(this).siblings('h5').find('.product-price');
        }

        var productCountContainer = $(this).siblings('span.product-count');

        var productPrice = productPriceContainer.data('price');
        var productCount = productCountContainer.text();
        productCount++;
        
        var result = productPrice * productCount;
        
        productPriceContainer.text(result.toFixed(2));
        productCountContainer.text(productCount);

    })

    /* Minus product count */

    $('.minus-product').on('click', function(){
        
        if (href != 'http://shop.loc/cart') {
            // For product page
            var productPriceContainer = $(this).parentsUntil('.product-data-aside').siblings('div').find('.product-price');
        } else {
            // For cart page
            var productPriceContainer = $(this).siblings('h5').find('.product-price');
        }
        var productCountContainer = $(this).siblings('span.product-count');

        var productPrice = productPriceContainer.data('price');
        var productCount = productCountContainer.text();
        productCount--;

        if (productCount > 0) {
            var result = productPrice * productCount;

            productPriceContainer.text(result.toFixed(2));
            productCountContainer.text(productCount);
        }

        // For product page
        if (href != 'http://shop.loc/cart' && productCount == 0) {        
            productPriceContainer.text(productPrice);
            productCountContainer.text(0);
        } 
    })

    /* Add product to cart */

    $('.product_add_to_cart').on('submit', function(e){
        e.preventDefault();

        // This will only set the header if it is a local request.
        $.ajaxSetup({
            beforeSend: function(xhr, type) {
                if (!type.crossDomain) {
                    xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
                }
            },
        });

        var productCount = $('.product-count').text();
        var productId = $('input:hidden[name=product-id]').val();

        $.ajax({
            url: '/cart/add',
            method: 'post',
            data: {cnt: productCount, id: productId},
            success: function(data){
                if (data) {
                    console.log(data);
                }
            }
        });
    });


});