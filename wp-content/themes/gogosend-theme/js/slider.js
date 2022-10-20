const swiper = new Swiper( '.mySwiper', {
	spaceBetween: 5,
	slidesPerView: 3,
	loopFillGroupWithBlank: true,
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},
	breakpoints: {
        200: {
			slidesPerView: 1,
			spaceBetween: 20,
		},

		320: {
			slidesPerView: 1,
			spaceBetween: 20,
		},
		// when window width is >= 480px
		480: {
			slidesPerView: 1,
			spaceBetween: 30,
		},
		640: {
			slidesPerView: 1,
			spaceBetween: 20,
		},
		768: {
			slidesPerView: 1,
			spaceBetween: 30,
		},
		1024: {
			slidesPerView: 2,
			spaceBetween: 0,
		},
        1200: {
			slidesPerView: 3,
			spaceBetween: 0,
		},
	},
} );
jQuery( document ).ready( function( $ ) {
	if ( $( '.slider .slide' ).length == 2 ) {
		$( '.swiper-wrapper' ).addClass( 'disabled' );
		$( '.swiper-pagination' ).addClass( 'disabled' );
	}
} );
