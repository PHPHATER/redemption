export default {
    init() {

        jQuery(document).ready(function($) {

            $(".navbar-collapse--left-js").mmenu({
                wrappers: ["bootstrap4"],
            });

            $(".navbar-collapse--right-js").mmenu({
                wrappers: ["bootstrap4-right"],
                extensions: ["position-right"],
            });
            // якщо треба API
            // var API = $(".navbar-collapse").data("mmenu");

        });

    },
    finalize() {
        // JavaScript to be fired on all pages, after page specific JS is fired
    },
};
