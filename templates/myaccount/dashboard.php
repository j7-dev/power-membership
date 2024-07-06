<?php

/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

use J7\PowerMembership\Utils;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$allowed_html = [
	'a' => [
		'href' => [],
	],
];

/**
 * 顯示會員等級
 */
$current_user_id           = \get_current_user_id();
$current_member_lv_id      = \get_user_meta($current_user_id, Utils::CURRENT_MEMBER_LV_META_KEY, true);
$current_member_lv         = \get_post($current_member_lv_id);
$current_member_lv_img_url = empty($current_member_lv) ? '' : \get_the_post_thumbnail_url($current_member_lv, 'thumbnail');
$current_member_lv_name    = empty($current_member_lv) ? '預設會員' : $current_member_lv->post_title;
$next_rank_id              = \gamipress_get_next_user_rank_id($current_user_id, 'member_lv');

$next_rank_html = '您已是最高等級';
if ($next_rank_id) {

	$next_rank_threshold = \get_post_meta($next_rank_id, 'power_membership_threshold', true);
	$next_rank_threshold = \wc_price($next_rank_threshold);

	$next_rank_html = sprintf(
	/*html*/'
	下個等級為 <span class="text-white bg-[#6e6d76] rounded-xl text-xs px-3 py-1">%1$s</span>
	%2$s
	',
	\get_the_title($next_rank_id),
	$next_rank_threshold ? "需要消費 {$next_rank_threshold} 元" : ''
	);
}


echo '<pre>';
var_dump($next_rank_id);
echo '</pre>';

printf(
	/*html*/'
	<div class="grid grid-cols-2 gap-4 w-fit mb-8">
		<div>
			<span class="">會員等級</span>
		</div>
		<div>
			<span class="text-white bg-[#fb7258] rounded-xl text-xs px-3 py-1">%1$s</span>
		</div>
		<div>
			<span class="">下個等級</span>
		</div>
		<div>
			%2$s
		</div>
	</div>',
	$current_member_lv_name,
	$next_rank_html
);


?>

<p>
	<?php
	printf(
		/* translators: 1: user display name 2: logout url */
		wp_kses(__('Hello %1$s (not %1$s? <a href="%2$s">Log out</a>)', 'woocommerce'), $allowed_html),
		'<strong>' . esc_html($current_user->display_name) . '</strong>',
		esc_url(wc_logout_url())
	);
	?>
</p>

<p>
	<?php
	/* translators: 1: Orders URL 2: Address URL 3: Account URL. */
	$dashboard_desc = __('From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">billing address</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce');
	if (wc_shipping_enabled()) {
		/* translators: 1: Orders URL 2: Addresses URL 3: Account URL. */
		$dashboard_desc = __('From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">shipping and billing addresses</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce');
	}
	printf(
		wp_kses($dashboard_desc, $allowed_html),
		esc_url(wc_get_endpoint_url('orders')),
		esc_url(wc_get_endpoint_url('edit-address')),
		esc_url(wc_get_endpoint_url('edit-account'))
	);
	?>
</p>

<?php
/**
 * My Account dashboard.
 *
 * @since 2.6.0
 */
do_action('woocommerce_account_dashboard');

/**
 * Deprecated woocommerce_before_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action('woocommerce_before_my_account');

/**
 * Deprecated woocommerce_after_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action('woocommerce_after_my_account');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */