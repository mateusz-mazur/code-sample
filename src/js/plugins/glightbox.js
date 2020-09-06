import GLightbox from 'glightbox';
import 'glightbox/dist/css/glightbox.css';

export const gLightBoxSettings = () => {
    const lightbox = GLightbox({
        touchNavigation: true,
        loop: true
    });
};
