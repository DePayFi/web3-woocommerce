class General {
	constructor() {
		this.html = document.querySelector("html");
		this.body = document.body;
		this.events();
		this.preloader();
		this.masonry();
		this.menuAccessibility();
		this.mobileAccessibility();
		this.responsiveTables();
	}

	events() {
		window.addEventListener("load", this.triggerResize);
	}

	triggerResize() {
		const resizeEvent = window.document.createEvent("UIEvents");
		resizeEvent.initUIEvent("resize", true, false, window, 0);
		window.dispatchEvent(resizeEvent);
	}

	preloader() {
		var loaderMask = document.querySelector(".loader-mask");
		var loader = document.querySelector(".loader");

		if (loader) {
			loader.style.opacity = "0";
			setTimeout(function () {
				loaderMask.style.opacity = "0";
			}, 350);
			loaderMask.style.opacity = "0";

			loaderMask.addEventListener("transitionend", function () {
				loaderMask.remove();
				loaderMask.classList.add("preloader--loaded");
			});
		}
	}

	masonry() {
		let grid = document.getElementById("masonry-grid");

		if (!grid) {
			return;
		}

		var masonry = new Masonry(grid, {
			columnWidth: ".masonry-item",
			itemSelector: ".masonry-item",
			percentPosition: true,
		});

		imagesLoaded(grid).on("progress", function () {
			masonry.layout();
		});
	}

	menuAccessibility() {
		// Get all the link elements within the primary menu.
		var i,
			links = document.querySelectorAll(
				".eversor-nav-menu__item, .nav__menu a"
			),
			menu = document.querySelectorAll(".eversor-nav-menu__list, .nav__menu");

		if (0 === menu.length) {
			return false;
		}

		// Each time a menu link is focused or blurred, toggle focus.
		for (i = 0; i < links.length; i++) {
			links[i].addEventListener("focus", toggleFocus, true);
			links[i].addEventListener("blur", toggleFocus, true);
		}

		function hasClass(element, className) {
			return (
				(" " + element.className + " ").indexOf(" " + className + " ") > -1
			);
		}

		// Sets or removes the .focus class on an element.
		function toggleFocus() {
			var self = this;
			menu = hasClass(self, "eversor-nav-menu__item")
				? "eversor-nav-menu__list"
				: "nav__menu";

			// Move up through the ancestors of the current link until we hit menu list class.
			while (-1 === self.className.indexOf(menu)) {
				// On li elements toggle the class .focus.
				if ("li" === self.tagName.toLowerCase()) {
					if (-1 !== self.className.indexOf("focus")) {
						self.className = self.className.replace(" focus", "");
					} else {
						self.className += " focus";
					}
				}
				self = self.parentElement;
			}
		}
	}

	mobileAccessibility() {
		document.addEventListener("keydown", function (e) {
			var tabKey,
				shiftKey,
				selectors,
				elements,
				mobileMenu,
				activeEl,
				lastEl,
				firstEl;

			if (this.body.classList.contains("showing-modal")) {
				selectors =
					'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
				activeEl = document.activeElement;

				// Search
				if (this.body.classList.contains("showing-search-modal")) {
					let search = document.querySelectorAll(".xhibiter-menu-search");

					for (var i = 0; i < search.length; i++) {
						firstEl = search[i].querySelector(".search-input");
						lastEl = search[i].querySelector(".search-button");
						trapFocus(firstEl, lastEl);
					}
				}

				// Nav
				if (this.body.classList.contains("showing-nav-modal")) {
					mobileMenu = document.querySelector(".nav__wrap");
					firstEl = document.querySelector("#nav__icon-toggle");
					elements = mobileMenu.querySelectorAll(selectors);
					elements = Array.prototype.slice.call(elements);

					elements = elements.filter(function (element) {
						return null !== element.offsetParent;
					});

					lastEl = elements[elements.length - 1];

					trapFocus(firstEl, lastEl);
				}

				function trapFocus(firstEl, lastEl) {
					tabKey = e.key === "Tab" || e.keyCode === 9;
					shiftKey = e.shiftKey;

					if (!shiftKey && tabKey && lastEl === activeEl) {
						e.preventDefault();
						firstEl.focus();
					}

					if (shiftKey && tabKey && firstEl === activeEl) {
						e.preventDefault();
						lastEl.focus();
					}
				}
			}
		});
	}

	responsiveTables() {
		let tables = document.querySelectorAll(".wp-block-table");

		if (!tables.length > 0) {
			return;
		}

		for (var i = 0; i < tables.length; i++) {
			let table = tables[i].innerHTML;
			let tableResponsive =
				'<div class="table-responsive">' + table + "</div>";
			tables[i].innerHTML = tableResponsive;
		}
	}
	
}

export default General;