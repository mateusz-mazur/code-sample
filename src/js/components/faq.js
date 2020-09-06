import { slideDown } from './slideUpDown';
import { slideUp } from './slideUpDown';

export const faqList = () => {
    const faqList = document.querySelectorAll('.p-archive-faq__item');

    faqList.forEach((el) => {
        const question = el.querySelector('.p-archive-faq__question');
        const answer = el.querySelector('.p-archive-faq__answer');

        answer.style.display = 'none';

        question.addEventListener('click', () => {
            question.parentElement.classList.toggle('p-archive-faq__item--active');

            if (question.parentElement.classList.contains('p-archive-faq__item--active')) {
                slideDown(question.nextElementSibling);
            } else {
                slideUp(question.nextElementSibling);
            }
        });
    });
};
