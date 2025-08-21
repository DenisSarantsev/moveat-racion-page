// Отслеживание появления секций (кроме первой) на 20% и добавление класса "scrolled"
// Используем IntersectionObserver, с graceful fallback на scroll-обработчик.

(function() {
	const CLASS_SCROLLED = 'scrolled';
	const THRESHOLD_RATIO = 0.25; // 20%

	function onReady(fn){
		if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', fn); else fn();
	}

	onReady(() => {
		const sections = Array.from(document.querySelectorAll('section'));
		if (sections.length <= 1) return;
		const targets = sections.slice(1); // пропускаем первую секцию

		// Если IntersectionObserver доступен – используем его
		if ('IntersectionObserver' in window) {
			const observer = new IntersectionObserver((entries) => {
				entries.forEach(entry => {
					if (entry.intersectionRatio >= THRESHOLD_RATIO) {
						const el = entry.target;
						if (!el.classList.contains(CLASS_SCROLLED)) {
							el.classList.add(CLASS_SCROLLED);
						}
						observer.unobserve(el); // больше не следим за уже анимированным
					}
				});
			}, {
				root: null,
				rootMargin: '0px',
				threshold: buildThresholdList(THRESHOLD_RATIO)
			});

			targets.forEach(sec => observer.observe(sec));
			return; // дальше не идём – fallback не нужен
		}

		// Fallback: без IntersectionObserver – вычисляем вручную на scroll / resize
		let pending = false;
		const toWatch = new Set(targets);

		function check() {
			pending = false;
			if (!toWatch.size) return;
			toWatch.forEach(sec => {
				const ratio = visibilityRatio(sec);
				if (ratio >= THRESHOLD_RATIO) {
					sec.classList.add(CLASS_SCROLLED);
					toWatch.delete(sec);
				}
			});
			if (!toWatch.size) {
				window.removeEventListener('scroll', onScroll, { passive: true });
				window.removeEventListener('resize', onScroll);
			}
		}

		function onScroll() {
			if (!pending) {
				pending = true;
				requestAnimationFrame(check);
			}
		}

		window.addEventListener('scroll', onScroll, { passive: true });
		window.addEventListener('resize', onScroll);
		check(); // начальная проверка
	});

	function visibilityRatio(el) {
		const rect = el.getBoundingClientRect();
		const vh = window.innerHeight || document.documentElement.clientHeight;
		if (rect.bottom <= 0 || rect.top >= vh) return 0;
		const visible = Math.min(rect.bottom, vh) - Math.max(rect.top, 0);
		const total = rect.height || 1;
		return visible / total;
	}

	function buildThresholdList(minRatio) {
		// Для более плавного срабатывания: массив порогов от 0 до 1 с шагом 0.05 + минимальный
		const thresholds = [];
		for (let r = 0; r <= 1; r += 0.05) thresholds.push(parseFloat(r.toFixed(2)));
		if (!thresholds.includes(minRatio)) thresholds.push(minRatio);
		return thresholds.sort((a,b)=>a-b);
	}
})();

