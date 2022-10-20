<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gogosend-theme
 */

?>

	<footer id="colophon" class="site-footer">
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>


<script>
      var swiper = new Swiper(".mySwiper", {
      	spaceBetween: 5,
      	slidesPerView: 3,
      	loopFillGroupWithBlank: true,
      	navigation: {
      		nextEl: ".swiper-button-next",
      		prevEl: ".swiper-button-prev",
      	},
      	breakpoints: {
      		320: {
      			slidesPerView: 1,
      			spaceBetween: 20
      		},
      		// when window width is >= 480px
      		480: {
      			slidesPerView: 1,
      			spaceBetween: 30
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
      			slidesPerView: 3,
      			spaceBetween: 0,
      		},
      	},
      });
      jQuery(document).ready(function ($) {

      	if ($(".slider .slide").length == 2) {
      		$('.swiper-wrapper').addClass("disabled");
      		$('.swiper-pagination').addClass("disabled");
      	}
      })

</script>
</body>
</html>
