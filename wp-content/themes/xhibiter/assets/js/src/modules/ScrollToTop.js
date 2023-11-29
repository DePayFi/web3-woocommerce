class ScrollToTop {
	constructor() {
		this.backToTop = document.getElementById("back-to-top")
		this.scrollToTop()
		this.events()
	}

	events() {
		window.addEventListener("scroll", (e) => this.onScroll(e));
	}

	onScroll() {
		const scroll = window.scrollY;

		if (!this.backToTop) {
			return;
		}

		if (scroll >= 50) {
			this.backToTop.classList.add("show");
		} else {
			this.backToTop.classList.remove("show");
		}
	}

	scrollToTop() {
		if (!this.backToTop) {
			return;
		}

		this.backToTop.addEventListener("click", function (e) {
			e.preventDefault();
			if (document.scrollingElement.scrollTop === 0) return;
			var totalScrollDistance = document.scrollingElement.scrollTop;
			var scrollY = totalScrollDistance,
				oldTimestamp = null;

			function step(newTimestamp) {
				if (oldTimestamp !== null) {
					scrollY -=
						(totalScrollDistance * (newTimestamp - oldTimestamp)) / 350;
					if (scrollY <= 0) return (document.scrollingElement.scrollTop = 0);
					document.scrollingElement.scrollTop = scrollY;
				}

				oldTimestamp = newTimestamp;
				window.requestAnimationFrame(step);
			}

			window.requestAnimationFrame(step);
		});
	}

}


export default ScrollToTop;
