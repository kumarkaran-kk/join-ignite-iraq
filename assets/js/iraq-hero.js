(() => {
    const hero = document.querySelector('[data-hero-carousel]');
    if (!hero) return;
    const track = hero.querySelector('.iq-hero-track');
    const slides = [...hero.querySelectorAll('.iq-hero-slide')];
    const dots = [...hero.querySelectorAll('[data-hero-go]')];
    const pause = hero.querySelector('[data-hero-pause]');
    const reduced = matchMedia('(prefers-reduced-motion: reduce)');
    let index = 0, timer, paused = reduced.matches, hovered = false;
    hero.querySelectorAll('[hidden]').forEach(el => el.hidden = false);
    function schedule() {
        clearTimeout(timer);
        if (!paused && !hovered && !document.hidden && !hero.contains(document.activeElement)) {
            timer = setTimeout(() => show(index + 1), 2300);
        }
    }
    function show(next) {
        index = (next + slides.length) % slides.length;
        track.style.transform = `translateX(-${index * 100}%)`;
        slides.forEach((slide, i) => slide.setAttribute('aria-hidden', String(i !== index)));
        dots.forEach((dot, i) => dot.setAttribute('aria-pressed', String(i === index)));
        hero.querySelector('.iq-photo-index').textContent = String(index + 1).padStart(2, '0');
        schedule();
    }
    function updatePause() {
        pause.setAttribute('aria-label', paused ? 'Play slideshow' : 'Pause slideshow');
        pause.textContent = paused ? '\u25b6' : '\u275a\u275a';
        schedule();
    }
    hero.querySelector('[data-hero-prev]').addEventListener('click', () => show(index - 1));
    hero.querySelector('[data-hero-next]').addEventListener('click', () => show(index + 1));
    dots.forEach((dot, i) => dot.addEventListener('click', () => show(i)));
    pause.addEventListener('click', () => { paused = !paused; updatePause(); });
    hero.addEventListener('mouseenter', () => { hovered = true; schedule(); });
    hero.addEventListener('mouseleave', () => { hovered = false; schedule(); });
    hero.addEventListener('focusin', schedule);
    hero.addEventListener('focusout', () => setTimeout(schedule, 0));
    document.addEventListener('visibilitychange', schedule);
    reduced.addEventListener('change', () => { paused = reduced.matches; updatePause(); });
    updatePause();
})();
