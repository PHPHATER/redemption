<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
    exit;
}

do_action('woocommerce_before_checkout_form', $checkout);

// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
    echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
    return;
}

?>

<?php if (is_page('sign-up')) { ?>

    <div class="woocommerce-login-form-wrapper">
        <h2 class="checkout"><?php esc_html_e('Sign up', 'woocommerce'); ?></h2>

        <form name="checkout" method="post" class="checkout woocommerce-checkout woocommerce-form-login woocommerce-form" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

            <div class="woocommerce-checkout__steps_title process_1">
                <div class="title_process">
                    Registration progress: <span class="title_1">1</span><span class="title_2">2</span> of 2
                </div>
                <div class="process_line">
                    <span></span>
                </div>
            </div>
            <div class="woocommerce-checkout__wrapper_steps process_1">
                <div class="woocommerce-checkout__step step_1">

                    <?php if ($checkout->get_checkout_fields()) : ?>

                        <?php do_action('woocommerce_checkout_before_customer_details'); ?>

                        <div class="col2-set" id="customer_details">
                            <?php do_action('woocommerce_checkout_billing'); ?>

                            <?php do_action('woocommerce_checkout_shipping'); ?>
                        </div>
                        <div class="woocommerce-form-login__submit">
                            <button type="button" class="btn wc_first_step btn-secondary btn-block"><?php esc_html_e('Sign Up', 'woocommerce'); ?></button>
                        </div>

                        <?php do_action('woocommerce_checkout_after_customer_details'); ?>

                    <?php endif; ?>

                </div>

                <div class="woocommerce-checkout__step step_2">

                    <h6>To register, you must make a membership fee of 12$</h6>

                    <p>Select a payment method:</p>

                    <?php do_action('woocommerce_checkout_before_order_review'); ?>

                    <div id="order_review" class="woocommerce-checkout-review-order">
                        <?php do_action('woocommerce_checkout_order_review'); ?>
                    </div>

                    <?php do_action('woocommerce_checkout_after_order_review'); ?>

                </div>
            </div>

            <div class="woocommerce-form-login__terms">
                By continuing, you agree to BuyGe’s <a href="<?php echo get_permalink(366); ?>" class="link_underline">Terms of Service</a> and acknowledge Yelp’s <a href="<?php echo get_permalink(364); ?>" class="link_underline">Privacy Policy</a>.
            </div>

            <hr>

            <div class="woocommerce-form-login__register">
                Already signed up? <a href="<?php echo get_permalink(356); ?>" class="link_underline link_blue">Sign in</a>
            </div>

        </form>

    </div>

<?php } else { ?>

    <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

        <?php if ($checkout->get_checkout_fields()) : ?>

            <?php do_action('woocommerce_checkout_before_customer_details'); ?>

            <div class="col2-set" id="customer_details">
                <div class="col-1">
                    <?php do_action('woocommerce_checkout_billing'); ?>
                </div>

                <div class="col-2">
                    <?php do_action('woocommerce_checkout_shipping'); ?>
                </div>
            </div>

            <?php do_action('woocommerce_checkout_after_customer_details'); ?>

        <?php endif; ?>

        <h3 id="order_review_heading"><?php esc_html_e('Payment', 'woocommerce'); ?></h3>


        <?php do_action('woocommerce_checkout_before_order_review'); ?>

        <div id="order_review" class="woocommerce-checkout-review-order">
            <?php do_action('woocommerce_checkout_order_review'); ?>
        </div>

        <?php do_action('woocommerce_checkout_after_order_review'); ?>

    </form>

<?php } ?>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>
