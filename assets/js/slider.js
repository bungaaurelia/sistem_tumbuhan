function slide(direction) {
    const slider = document.querySelector('.card-slider');
    const cardWidth = slider.querySelector('.card').offsetWidth;
    const maxScrollLeft = slider.scrollWidth - slider.clientWidth;
    slider.scrollLeft = Math.max(0, Math.min(maxScrollLeft, slider.scrollLeft + direction * cardWidth));
}
