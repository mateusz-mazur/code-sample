const scrollToTop = function () {
    const button = document.querySelector('.js-scroll-to-top');

    if (button) {
        button.addEventListener('click', () => {
            document.querySelector('body').scrollTo({top: 0, behavior: 'smooth'});
            document.querySelector('html').scrollTo({top: 0, behavior: 'smooth'});
        });
    }
};

export default scrollToTop;
