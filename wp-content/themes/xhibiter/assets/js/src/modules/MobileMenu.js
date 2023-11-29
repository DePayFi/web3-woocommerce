require("matchmedia-polyfill");
require("matchmedia-polyfill/matchMedia.addListener");

class MobileMenu {
	constructor() {
		this.mobileToggle = document.querySelector(".js-mobile-toggle");
		this.mobileMenu = document.querySelector(".js-mobile-menu");
		this.mobileMenuClose = document.querySelector(".js-mobile-close");
		this.pageHeader = document.querySelector(".js-page-header");
		this.navDropdown = document.querySelectorAll(".nav__dropdown");

		if (!this.mobileToggle) return;
		this.events();
	}

	events() {
		this.belowMobile = window.matchMedia("(max-width: 1024px)");
		this.aboveMobile = window.matchMedia("(min-width: 1025px)");
		this.mobileToggle.addEventListener("click", (e) => {
			this.toggleMobileMenu(e)
			this.mobileAccessibility()
			this.mobileMenuClose.focus()
		});

		this.mobileMenuClose.addEventListener("click", (e) =>
			this.toggleMobileMenu(e)
		);

		this.belowMobile.addEventListener("change", (e) => {
			if (e.matches) {
				this.mobileMenu.classList.remove("nav-menu--is-open");
			}
		});

		this.aboveMobile.addEventListener("change", (e) => {
			if (e.matches) {
				document.body.classList.remove("nav-open-noscroll");
				this.pageHeader.classList.remove("h-full");
				this.mobileMenu.classList.remove("nav-menu--is-open");
			}
		});

		this.navDropdown.forEach((dropdown) => {
			dropdown.addEventListener("mouseenter", (e) =>
				this.toggleAriaExpanded(e)
			);
			dropdown.addEventListener("mouseleave", (e) =>
				this.toggleAriaExpanded(e)
			);
		});
	}

	toggleAriaExpanded(e) {
		if (e.type === "mouseenter") {
			e.target.firstElementChild.setAttribute("aria-expanded", true);
		} else if (e.type === "mouseleave") {
			e.target.firstElementChild.setAttribute("aria-expanded", false);
		}
	}

	toggleMobileMenu(e) {
		document.body.classList.toggle("nav-open-noscroll");
		this.pageHeader.classList.toggle("h-full");
		this.pageHeader.classList.toggle("sticky");
		this.pageHeader.classList.toggle("fixed");
		this.mobileMenu.classList.toggle("nav-menu--is-open");
	}

	mobileAccessibility() {
		document.addEventListener("keydown", (e) => {
			var tabKey,
				shiftKey,
				selectors,
				elements,
				activeEl,
				lastEl,
				firstEl;

			if (document.body.classList.contains("nav-open-noscroll")) {
				selectors =
					'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
				activeEl = document.activeElement;

				firstEl = this.mobileMenuClose;
				elements = this.mobileMenu.querySelectorAll(selectors);
				elements = Array.prototype.slice.call(elements);

				elements = elements.filter(function (element) {
					return null !== element.offsetParent;
				});

				lastEl = elements[elements.length - 1];
				trapFocus(firstEl, lastEl);	

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
}

export default MobileMenu;
