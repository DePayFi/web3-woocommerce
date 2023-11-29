class MasonryGrid {
	constructor() {
		this.grid = document.getElementById("masonry-grid");
		if (this.grid) {
			this.initMasonry();
		}
	}

	initMasonry() {
		const masonry = new Masonry(this.grid, {
			columnWidth: ".masonry-item",
			itemSelector: ".masonry-item",
			percentPosition: true,
		});
		imagesLoaded(this.grid).on("progress", function () {
			masonry.layout();
		});
	}
}

export default MasonryGrid;
