<?php

namespace Hostinger;

defined( 'ABSPATH' ) || exit;

class Helper {
	public const HOSTINGER_FREE_SUBDOMAIN_URL = 'hostingersite.com';
	public const HOSTINGER_PAGE               = '/wp-admin/admin.php?page=hostinger';
	public const CLIENT_WOO_COMPLETED_ACTIONS = 'woocommerce_task_list_tracked_completed_tasks';
	private const PROMOTIONAL_LINKS           = array(
		'fr_FR' => 'https://www.hostinger.fr/cpanel-login?r=%2Fjump-to%2Fnew-panel%2Fsection%2Freferrals&utm_source=Banner&utm_medium=HostingerWPplugin',
		'es_ES' => 'https://www.hostinger.es/cpanel-login?r=%2Fjump-to%2Fnew-panel%2Fsection%2Freferrals&utm_source=Banner&utm_medium=HostingerWPplugin',
		'ar'    => 'https://www.hostinger.ae/cpanel-login?r=%2Fjump-to%2Fnew-panel%2Fsection%2Freferrals&utm_source=Banner&utm_medium=HostingerWPplugin',
		'zh_CN' => 'https://www.hostinger.com.hk/cpanel-login?r=%2Fjump-to%2Fnew-panel%2Fsection%2Freferrals&utm_source=Banner&utm_medium=HostingerWPplugin',
		'id_ID' => 'https://www.hostinger.co.id/cpanel-login?r=%2Fjump-to%2Fnew-panel%2Fsection%2Freferrals&utm_source=Banner&utm_medium=HostingerWPplugin',
		'lt_LT' => 'https://www.hostinger.lt/cpanel-login?r=%2Fjump-to%2Fnew-panel%2Fsection%2Freferrals&utm_source=Banner&utm_medium=HostingerWPplugin',
		'pt_PT' => 'https://www.hostinger.pt/cpanel-login?r=%2Fjump-to%2Fnew-panel%2Fsection%2Freferrals&utm_source=Banner&utm_medium=HostingerWPplugin',
		'uk'    => 'https://www.hostinger.com.ua/cpanel-login?r=%2Fjump-to%2Fnew-panel%2Fsection%2Freferrals&utm_source=Banner&utm_medium=HostingerWPplugin',
		'tr_TR' => 'https://www.hostinger.com.tr/cpanel-login?r=%2Fjump-to%2Fnew-panel%2Fsection%2Freferrals&utm_source=Banner&utm_medium=HostingerWPplugin',
		'en_US' => 'https://www.hostinger.com/cpanel-login?r=%2Fjump-to%2Fnew-panel%2Fsection%2Freferrals&utm_source=Banner&utm_medium=HostingerWPplugin',
	);

	private const HPANEL_DOMAIN_URL = 'https://hpanel.hostinger.com/websites/';

	/**
	 *
	 * Check if plugin is active
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public static function is_plugin_active( $plugin_slug ): bool {
		$active_plugins = (array) get_option( 'active_plugins', array() );
		foreach ( $active_plugins as $active_plugin ) {
			if ( strpos( $active_plugin, $plugin_slug . '.php' ) !== false ) {
				return true;
			}
		}

		return false;
	}

	public function is_preview_domain( $headers = null ): bool {
		// @codeCoverageIgnoreStart
		if ($headers === null && function_exists('getallheaders')) {
			$headers = getallheaders();
		}
		// @codeCoverageIgnoreEnd
		if ( isset( $headers['X-Preview-Indicator'] ) && $headers['X-Preview-Indicator'] ) {
			return true;
		}

		return false;
	}

	public static function woocommerce_onboarding_choice(): bool {
		return (bool) get_option( 'hostinger_woo_onboarding_choice', false );
	}

	public static function generate_bypass_code( $length ) {
		$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$code       = '';
		$max_index  = strlen( $characters ) - 1;

		for ( $i = 0; $i < $length; $i++ ) {
			$random_index = wp_rand( 0, $max_index );
			$code        .= $characters[ $random_index ];
		}

		return $code;
	}
}

$hostinger_helper = new Helper();
