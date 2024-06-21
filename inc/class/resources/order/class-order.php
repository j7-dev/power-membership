<?php
/**
 * 初始化
 */

declare(strict_types=1);

namespace J7\PowerMembership\Resources\Order;

use J7\PowerMembership\Plugin;
use J7\WpUtils\Classes\WPUPointUtils;
use J7\PowerMembership\Admin\Menu\Setting;


/**
 * Class Order
 */
final class Order {
	use \J7\WpUtils\Traits\SingletonTrait;

	/**
	 * Constructor
	 */
	public function __construct() {
		\add_action( 'woocommerce_payment_complete', array( $this, 'bonus_on_certain_day' ) );
	}

	/**
	 * Bonus on certain day
	 * 消費每  $2000 ＝ 20 購物金
	 * 🟧 UN-TESTED
	 *
	 * @param int $order_id - order id
	 *
	 * @return void
	 */
	public function bonus_on_certain_day( int $order_id ): void {
		global $power_plugins_settings;
		$enable_bonus_on_certain_day = $power_plugins_settings[ Setting::ENABLE_BONUS_ON_CERTAIN_DAY_FIELD_NAME ];

		if ( ! $enable_bonus_on_certain_day ) {
			return;
		}
		// 只有每週四、週日才執行
		if ( ! in_array(
			gmdate( 'l', time() + 8 * 3600 ),
			array( 'Thursday', 'Sunday' ),
			true
		) ) {
			return;
		}

		$order = \wc_get_order( $order_id );

		if ( ! $order ) {
			return;
		}

		$subtotal    = $order->get_subtotal();
		$customer_id = $order->get_customer_id();

		$default_point_slug = WPUPointUtils::DEFAULT_POINT_SLUG;
		$point              = Plugin::instance()->point_utils_instance->get_point_by_slug( $default_point_slug );

		// PENDING 做成設定項
		// 消費每  $2000 ＝ 20 購物金
		$award_points = floor( $subtotal / 2000 ) * 20;

		$point->award_points_to_user(
			user_id: (int) $customer_id,
			args: array(
				'title' => "訂單每消費 $2000 送 20 點購物金，共 {$award_points} 點，訂單編號：{$order_id}",
				'type'  => 'system',
			),
			points: $award_points
		);
	}
}

Order::instance();
