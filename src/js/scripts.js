import scrollToTop from './components/scroll-to-top';
import scrollToContent from './components/scroll-to-content';
import { faqList } from './components/faq';
import 'lazysizes';
import 'lazysizes/plugins/parent-fit/ls.parent-fit';
import 'jquery-match-height';
import { stickyHeader } from './components/sticky-header';
import { dropdown } from './components/dropdown';
import { gLightBoxSettings } from './plugins/glightbox';
import { heroSlider } from './components/hero';
// import '@fortawesome/fontawesome-free/js/all';

/*
* AOS.
* */
    import 'aos/dist/aos.css';
    import AOS from 'aos';

    AOS.init({
        startEvent: "load",
        disable: function() {
            return window.innerWidth <= 991;
        },
    });

    import "./plugins/aos";

/*
* Sticky Header.
* */
gLightBoxSettings();

/*
* Sticky Header.
* */
stickyHeader();

/*
* Scroll to Top.
* */
scrollToTop();

/*
* Scroll to Content.
* */
scrollToContent();

/*
* Dropdown menus.
* */
dropdown('js-dropdown-page-submenu', 'current-menu-item');

/*
* Hero Slider.
* */
heroSlider();

/*
* FAQ List.
* */
faqList();


$(function() {
    $(document).ready(function(){
        $('.js-col-match-height').matchHeight();
    });
});

/*
* Contact Form 7 - Redirect to Thank You Page.
* */
document.addEventListener( 'wpcf7mailsent', function( event ) {
    let curHostname = window.location.origin;
    let pageName = '/dziekujemy-za-kontakt/';
    let curLang = document.documentElement.lang;

    if ('en-US' === curLang) {
        pageName = '/en/thank-you/';
    } else if ('ru-RU' === curLang) {
        pageName = '/ru/Благодарю вас';
    } else if ('de-DE' === curLang) {
        pageName = '/de/vielen-dank/';
    }

    location = `${curHostname}${pageName}`;
}, false );


