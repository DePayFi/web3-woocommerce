import { getSiblings, DOMAnimations } from "./Utils";

class Dropdowns {
	constructor() {
		this.html = document.querySelector("html");
		this.body = document.body;
		this.navDropdown = document.querySelector(".nav__dropdown");
		this.navDropdownMenu = document.querySelector(".nav__dropdown-menu");
		this.navDropdownTrigger = document.querySelectorAll(".nav__dropdown-trigger");

		this.toggleDropdown()
	}

	toggleDropdown() {

		if (this.navDropdownTrigger) {
			for (let i = 0; i < this.navDropdownTrigger.length; i++) {
				this.navDropdownTrigger[i].addEventListener("click", function () {
					this.classList.toggle("nav__dropdown-trigger--is-open");

					let menuSiblings = getSiblings(this.parentElement);

					menuSiblings.forEach((sibling) => {
						let trigger = sibling.querySelector(".nav__dropdown-trigger");
						if (trigger) {
							trigger.classList.remove("nav__dropdown-trigger--is-open");
							DOMAnimations.slideUp(trigger.nextElementSibling);
							trigger.setAttribute("aria-expanded", "false");
						}
					});

					DOMAnimations.slideToggle(this.nextElementSibling);

					let attr = this.getAttribute("aria-expanded");
					if (attr == "true") {
						this.setAttribute("aria-expanded", "false");
					} else {
						this.setAttribute("aria-expanded", "true");
					}
				});
			}
		}
	}

}

export default Dropdowns;