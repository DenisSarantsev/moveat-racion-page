document.addEventListener("DOMContentLoaded", () => {

	const allFaqItems = document.querySelectorAll(".razion-faq__questions-list-item");
	[...allFaqItems].forEach((item) => {
		const title = item.querySelector(".razion-faq__questions-list-item_title-block");
		title.addEventListener("click", (event) => {
			if ( item.classList.contains("faq-item-opened") ) {
				closeAllItems(allFaqItems);
				item.classList.add("faq-item-closed");
				item.classList.remove("faq-item-opened");
			} else {
				closeAllItems(allFaqItems);
				item.classList.remove("faq-item-closed");
				item.classList.add("faq-item-opened");
			}
		})
	})

});

// Закрываем все блоки
const closeAllItems = (allItems) => {
	[...allItems].forEach((item) => {
		item.classList.add("faq-item-closed");
		item.classList.remove("faq-item-opened")
	})
}