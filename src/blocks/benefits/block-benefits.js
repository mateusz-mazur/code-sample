/*
* Block Benefits.
* */

    /*
    * Styles.
    * */
    import "./_benefits-styles.scss";

    /*
    * Scripts.
    * */
    import 'jquery-match-height';

    $(function() {
        $('.block-benefits__items-wrapper .item__description-text').matchHeight();
    });
