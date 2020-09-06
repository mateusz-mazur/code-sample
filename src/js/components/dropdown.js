export const dropdown = (dropdownClass, activeItemClass) => {
    function toggleClass(elem, className){
        if (elem.className.indexOf(className) !== -1){
            elem.className = elem.className.replace(className,'');
        } else {
            elem.className = elem.className.replace(/\s+/g,' ') + 	' ' + className;
        }

        return elem;
    }

    function toggleMenuDisplay(e){
        const dropdown = e.currentTarget.parentNode;
        const title = document.querySelector(`.dropdown .title`);
        const menu = dropdown.querySelector('.menu');

        toggleClass(menu,'hide');
        toggleClass(title,'title--active');
    }

    function loadCurrentValue() {
        const titleElem = document.querySelector(`.${dropdownClass} .title`);

        if (titleElem) {
            const currentMenuItemText = document.querySelector(`.${dropdownClass} .${activeItemClass} a`).innerText;
            const currentMenuItemIcon = document.querySelector(`.${dropdownClass} .${activeItemClass} .menu-item__icon`);
            const currentIcon = currentMenuItemIcon.cloneNode(true);

            titleElem.textContent = currentMenuItemText;
            titleElem.appendChild(currentIcon);
        }

    }
    loadCurrentValue();

    //get elements
    const dropdownTitle = document.querySelector(`.${dropdownClass} .title`);

    //bind listeners to these elements
    if (dropdownTitle) {
        dropdownTitle.addEventListener('click', toggleMenuDisplay);
    }
};
