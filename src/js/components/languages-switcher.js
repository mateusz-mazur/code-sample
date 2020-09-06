const languagesSwitcher = function () {
    const trigger = document.querySelector('.js-lang-switcher-trigger');
    const langMenu = document.querySelector('.lang-switcher__dropdown');

    if (trigger) {
        trigger.addEventListener('click', () => {
            trigger.classList.toggle('lang-switcher__current--active');
            langMenu.classList.toggle('lang-switcher__dropdown--active');
        });
    }
};

export default languagesSwitcher;
