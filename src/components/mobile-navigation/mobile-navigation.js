/*
* Mobile Navigation.
* */


/*
    * Imports.
    * */
    import "mmenu-js/src/core/oncanvas/mmenu.oncanvas.scss";
    import "mmenu-js/src/core/offcanvas/mmenu.offcanvas.scss";
    import "mmenu-js/src/core/screenreader/mmenu.screenreader.scss";
    // import "mmenu-js/src/extensions/borderstyle/mmenu.borderstyle.scss";
    import "mmenu-js/src/extensions/effects/mmenu.effects.scss";
    // import "mmenu-js/src/extensions/fullscreen/mmenu.fullscreen.scss";
    // import "mmenu-js/src/extensions/listview/mmenu.listview.scss";
    // import "mmenu-js/src/extensions/multiline/mmenu.multiline.scss";
    import "mmenu-js/src/extensions/pagedim/mmenu.pagedim.scss";
    // import "mmenu-js/src/extensions/popup/mmenu.popup.scss";
    import "mmenu-js/src/extensions/positioning/mmenu.positioning.scss";
    // import "mmenu-js/src/extensions/shadows/mmenu.shadows.scss";
    // import "mmenu-js/src/extensions/themes/mmenu.themes.scss";
    // import "mmenu-js/src/extensions/tileview/mmenu.tileview.scss";
    // import "mmenu-js/src/addons/autoheight/mmenu.autoheight.scss";
    // import "mmenu-js/src/addons/columns/mmenu.columns.scss";
    // import "mmenu-js/src/addons/counters/mmenu.counters.scss";
    // import "mmenu-js/src/addons/dividers/mmenu.dividers.scss";
    // import "mmenu-js/src/addons/drag/mmenu.drag.scss";
    // import "mmenu-js/src/addons/dropdown/mmenu.dropdown.scss";
    // import "mmenu-js/src/addons/iconbar/mmenu.iconbar.scss";
    // import "mmenu-js/src/addons/iconpanels/mmenu.iconpanels.scss";
    // import "mmenu-js/src/addons/keyboardnavigation/mmenu.keyboardnavigation.scss";
    // import "mmenu-js/src/addons/navbars/mmenu.navbars.scss";
    // import "mmenu-js/src/addons/searchfield/mmenu.searchfield.scss";
    // import "mmenu-js/src/addons/sectionindexer/mmenu.sectionindexer.scss";
    // import "mmenu-js/src/addons/setselected/mmenu.setselected.scss";
    // import "mmenu-js/src/addons/sidebar/mmenu.sidebar.scss";
    // import "mmenu-js/src/addons/toggles/mmenu.toggles.scss";

    import 'mmenu-js/src/mmenu';
    import 'mburger-css/src/scss/mburger.scss';

    /*
    * Styles.
    * */
    import "./_mobile-navigation-styles.scss";

    /*
    * Scripts.
    * */
    document.addEventListener("DOMContentLoaded", () => {

        /* ~~~~~~~~~~ Make fixed classes (it wasn't added to body wrapper: "mm-page") ~~~~~~~~~~ */

        /*    document.querySelector(".js-main-header").classList.add("mmenu-fixed");

            const wpAdminBar = document.querySelector("#wpadminbar");

            if(wpAdminBar != null) {
                wpAdminBar.classList.add("mmenu-fixed");
            }*/


        /* ~~~~~~~~~~ Making whole parent of dropdown clickable ~~~~~~~~~~ */

        const menuItems = document.querySelectorAll(".js-mobile-navigation .menu-item-has-children > a");

        [...menuItems].forEach((element) => {
            // Set parent to avoid removing element
            const elementParent = element.parentNode;

            // Create <span>
            const spanWrapper = document.createElement("span");

            // Append element to span
            spanWrapper.appendChild(element);

            // Append element to span
            elementParent.appendChild(spanWrapper);
        });


        /* ~~~~~~~~~~ mMenu Init ~~~~~~~~~~ */

        const menu = new window.Mmenu( ".js-mobile-navigation", {
            "extensions": [
                "pagedim-black",
                "position-right",
                "fx-menu-slide",
                "shadow-page",
                "shadow-panels"
            ],
        }, {
            classNames: {
                fixedElements: {
                    fixed: "mmenu-fixed"
                }
            }
        });

        const mburgerIcon = document.querySelector(".js-mburger");
        const api = menu.API;

        mburgerIcon.addEventListener("click", () => {
            if(mburgerIcon.classList.contains("is-active")) {
                api.close();
                mburgerIcon.classList.remove("is-active");
            } else {
                api.open();
                mburgerIcon.classList.add("is-active");
            }
        });

    });
