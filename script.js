/**
 * Normalize carousel heights
 */
jQuery(() => {
    document.querySelectorAll('.carousel-container').forEach((carousel) => {
        let items = carousel.querySelectorAll('.carousel-item');

        let normalizeHeights = () => {
            let tallest = 0;
            items.forEach((item) => {
                item.style.minHeight = '0';
                tallest = Math.max(tallest, jQuery(item).height());
            });
            items.forEach((item) => {
                item.style.minHeight = tallest + 'px';
            });
        };

        normalizeHeights();

        window.addEventListener('resize', normalizeHeights);
        window.addEventListener('orientationchange', normalizeHeights);
    });

    return true;
});
