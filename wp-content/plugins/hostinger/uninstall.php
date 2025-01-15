<?php

defined( 'WP_UNINSTALL_PLUGIN' ) || exit;

global $wpdb;

/** PHPCS:disable WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching */
/** Delete options */
$wpdb->query( "DELETE FROM $wpdb->options WHERE option_name LIKE 'hostinger\_%';" );
/** PHPCS:enable */
