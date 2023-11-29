(function ($) {
	"use strict";

	var $document = $(document);
	var $window = $(window);

	wooQuantityButtons();
	addToWishlist();
	wooProductImage();

	function wooQuantityButtons() {
		var forms = jQuery(".woocommerce-cart-form, form.cart");
		forms.find(".quantity.hidden").prev(".quantity__button").hide();
		forms.find(".quantity.hidden").next(".quantity__button").hide();

		$document.on(
			"click",
			"form.cart .quantity__button, .woocommerce-cart-form .quantity__button",
			function () {
				var $this = $(this);

				// Get current quantity values
				var qty = $this.closest(".quantity").find(".qty");
				var val = qty.val() == "" ? 0 : parseFloat(qty.val());
				var max = parseFloat(qty.attr("max"));
				var min = parseFloat(qty.attr("min"));
				var step = parseFloat(qty.attr("step"));

				// Change the value if plus or minus
				if ($this.is(".quantity__plus")) {
					if (max && max <= val) {
						qty.val(max).change();
					} else {
						qty.val(val + step).change();
					}
				} else {
					if (min && min >= val) {
						qty.val(min).change();
					} else if (val >= 1) {
						qty.val(val - step).change();
					}
				}
			}
		);
	}

	function addToWishlist() {
		$document.on("added_to_wishlist removed_from_wishlist", function () {
			$.get(
				yith_wcwl_l10n.ajax_url,
				{
					action: "yith_wcwl_update_wishlist_count",
				},
				function (data) {
					if (0 === data.count) {
						$(".xhibiter-menu-wishlist__count").addClass("d-none");
					} else {
						$(".xhibiter-menu-wishlist__count").removeClass("d-none");
					}
					$(".yith-wcwl-items-count").html(data.count);
				}
			);
		});
	}

	function wooProductImage() {
		const $slider = $(".woocommerce-product-gallery");

		if ($slider.length === 0) return;

		$window.on("resize", function () {
			if ($slider.length > 0) {
				$slider.each(function () {
					const $this = $(this);
					$this.find(".flex-viewport").css("height", "auto");
				});
			}
		});
	}
})(jQuery);
