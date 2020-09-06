export const showPhoneNumber = () => {
    $('.item-contact-phone .phone-number').hide();

    $('.item-phone-number').on('click', function () {
        $(this).find('.show-phone-number').hide();
        $(this).find('.phone-number').show();
    });
};
