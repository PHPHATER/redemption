export default {
    init() {
    // JavaScript to be fired on the about us page

        /* eslint-disable */
        Dropzone.autoDiscover = false;
        /* eslint-enable */

        jQuery(document).ready(function($) {

            $('#shares_user_date').datetimepicker({
                timepicker: false,
                format: 'd.m.Y',
            });

            function validateZip(zip) {
                var re = /^\d{5}(-\d{4})?(?!-)$/;
                return re.test(String(zip).toLowerCase());
            }

            function validateEmail(email) {
            /* eslint-disable */
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            /* eslint-enable */
                return re.test(String(email).toLowerCase());
            }

            function validateField(element, content) {

                var response = true;

                if ($(element).attr('name') === 'billing_email') {

                    if (validateEmail($(element).val()) === false) {
                        response = false;
                        $(element).parent().after(content).parent().addClass('valid-falied');
                    } else {
                        $(element).parent().parent().removeClass('valid-falied');
                        $(element).parent().parent().find('.field_error').remove();
                    }

                } else if ($(element).attr('name') === 'billing_postcode') {

                    if (validateZip($(element).val()) === false) {
                        response = false;
                        $(element).parent().after(content).parent().addClass('valid-falied');
                    } else {
                        $(element).parent().parent().removeClass('valid-falied');
                        $(element).parent().parent().find('.field_error').remove();
                    }

                } else {
                    if ($(element).val().length <= 3) {
                        response = false;
                        $(element).parent().after(content).parent().addClass('valid-falied');
                    } else {
                        $(element).parent().parent().removeClass('valid-falied');
                        $(element).parent().parent().find('.field_error').remove();
                    }
                }

                return response;

            }

            function start_uploader() {

            /* eslint-disable */
                new Dropzone('.to_uploads', {
                    maxFiles: 1,
                    maxFilesize: 2,
                    uploadMultiple: 0,
                    acceptedFiles: 'image/*,.jpg,.png,.jpeg',
                    init: function() {
                        this.on("success", function(file, responseText) {
                            if (responseText.status === 'ok') {
                                jQuery('.user_account__image_content').html(responseText.content);
                            }
                        });
                    },
                });
            /* eslint-enable */

            }

            function read_uploaded_file(input, image) {

                var reader = new FileReader();

                reader.onload = function(e) {
                    image.attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);

            }

            $('.wc_first_step').on('click', function() {

                var content = '<span class="field_error">Please fill in the field correctly.</span>';
                var valid = true;

                $('.step_1 input').each(function(i, e) {

                    if (validateField(e, content) === false) {

                        $(e).on('keyup', function() {
                            validateField(e, content);
                        });

                        valid = false;

                    }

                });

                if (valid) {
                    $('.woocommerce-checkout__wrapper_steps').removeClass('process_1').addClass('process_2');
                    $('.woocommerce-checkout__steps_title').removeClass('process_1').addClass('process_2');
                }

            });

            $('.archive_filters_action').on('click', function() {
                $(this).toggleClass('active').parents('.archive_filters').toggleClass('open');
                // $(this)
                $('.archive_filters__bottom').slideToggle();
            });

            if (!$('.navigation.pagination').length || $('.navigation.pagination .page-numbers:last-child').hasClass('current')) {
                $('.archive_main_pagination__load_more').hide();
            }

            $('.archive_main_pagination__load_more').on('click', function(e) {
                e.preventDefault();

                var current_page = $('.nav-links .current');
                var next_page = current_page.next();
                var target = $('.archive_main_pagination');
                var next_page_href = next_page.attr('href');
                var ths = $(this);

                if ($('.navigation.pagination').length && !$('.navigation.pagination .page-numbers:last-child').prev().hasClass('current')) {

                    $.ajax({
                        url: next_page_href,
                        beforeSend: function() {
                            $('.icon_rotate', ths).addClass('rotating');
                        },
                        success: function(content) {
                            $('.icon_rotate', ths).removeClass('rotating');

                            var filtered_content = $(content).find('.archive_main_sections > article');

                            filtered_content.insertBefore(target);

                            current_page.removeClass('current');
                            next_page.addClass('current');

                            $('.next.page-numbers').attr('href', $('.nav-links .current').next().attr('href'));

                            history.pushState({}, 'title', next_page_href);

                            if ($('.navigation.pagination .page-numbers:last-child').prev().hasClass('current')) {
                                ths.hide();
                            }

                        },

                    });

                } else {
                    ths.hide();
                }


            });

            $('.company_orderby').on('change', function() {
                $(this).parent().submit();
            });

            if (!$('.navigation.comments-pagination').length || $('.navigation.comments-pagination .page-numbers:first-child').hasClass('current')) {
                $('.company_comments_pagination__load_more').hide();
            }

            $('.company_comments_pagination__load_more').on('click', function(e) {
                e.preventDefault();

                var current_page = $('.nav-links .current');
                var next_page = current_page.prev();
                var next_page_href = next_page.attr('href');
                var target = $('.single_company__comments_list');
                var ths = $(this);

                if ($('.navigation.comments-pagination').length && !$('.navigation.comments-pagination .page-numbers:first-child').next().hasClass('current')) {

                    $.ajax({
                        url: next_page_href,
                        beforeSend: function() {
                            $('.icon_rotate', ths).addClass('rotating');
                        },
                        success: function(content) {
                            $('.icon_rotate', ths).removeClass('rotating');

                            var filtered_content = $(content).find('.single_company__comments_list > .comment');

                            target.append(filtered_content);

                            current_page.removeClass('current');
                            next_page.addClass('current');

                            $('.prev.page-numbers').attr('href', $('.nav-links .current').prev().attr('href'));

                            history.pushState({}, 'title', next_page_href);

                            if ($('.navigation.comments-pagination .page-numbers:first-child').next().hasClass('current')) {
                                ths.hide();
                            }

                        },

                    });

                } else {
                    ths.hide();
                }

            });

            $('.remove_user_image').on('click', function() {
                var $datas = {};

                $datas.action = 'remove_user_image';
                /* eslint-disable */
                $datas.nonce = SPRAJAX.ajax_nonce;
                /* eslint-enable */

                $.ajax({
                    type: "POST",
                    /* eslint-disable */
                    url: SPRAJAX.url,
                    /* eslint-enable */
                    data: $datas,
                    dataType: 'json',
                    beforeSend: function() {
                        $('.user_account__image_content > img').animate({ opacity: 0 }, 1400);
                    },
                    success: function(r) {
                        if (r.status === "ok") {
                            $('.user_account__image').addClass('no_image');
                            $('.user_account__image_content').html(r.content);
                            start_uploader();
                        }
                    },
                });

            });

            if ($('.to_uploads').length > 0) {
                start_uploader();
            }

            $('body').on('click', '.open_comment_content', function() {
                $(this).prev().addClass('open');
                $(this).remove();
            });

            $('.all_photos').on('click', function() {
                $(this).hide();
                $('.single_company__aditional_images').slideDown();
            });

            $('.write_single_review').on('click', function() {
                $('html, body').animate({
                    scrollTop: $("#respond").offset().top - 100,
                }, 1500);
            });

            $('.edit_business__tab').on('click', function() {
                $(this).siblings().removeClass('active');
                $('#' + $(this).data('target_id')).addClass('active').siblings().removeClass('active');
                $(this).addClass('active');
            });

            $('.coompany_next_step').on('click', function() {
                $('.edit_business__tab.active').next().trigger('click');
            });

            $('.styler').styler();

            $('.remove_company_image').on('click', function() {
                $(this).parent().find('input[type="hidden"]').val('');
                $(this).parent().find('img').attr('src', '/wp-content/themes/BuyGe/dist/images/add_photo.png');
                $(this).parent().addClass('no_image');
                $(this).remove();
            });

            $('.company_image_uploader').on('change', function() {
                read_uploaded_file(this, $(this).parent().find('img'));
                // $(this).parent().find('img').attr('src', read_uploaded_file( this ) );
            });


        });
    },
};
