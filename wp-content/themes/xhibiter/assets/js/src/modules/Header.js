class Header {
	constructor() {
		this.header = document.querySelector(".js-page-header");
		this.stickyHeader = document.querySelector(".js-page-header--sticky");
		this.headerPlaceholder = document.querySelector(".js-header-placeholder");
		if (this.header) {
			this.initStickyNavbar();
			this.events();
		}
	}

	initStickyNavbar() {

		if (window.scrollY > 0) {
			this.header.classList.add("js-page-header--is-sticky");
		} else {
			this.header.classList.remove("js-page-header--is-sticky");
		}

		if (!this.stickyHeader) {
			return;
		}
		this.headerPlaceholder.style.height = this.stickyHeader.offsetHeight + "px";
	}

	events() {
		window.addEventListener("scroll", (e) => this.initStickyNavbar(e));
	}
}

export default Header;
