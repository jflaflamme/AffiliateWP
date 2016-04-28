<?php $active_tab = ! empty( $_GET['tab'] ) ? sanitize_text_field( $_GET['tab'] ) : 'urls'; ?>

<div id="affwp-affiliate-dashboard">

	<?php if ( 'pending' == affwp_get_affiliate_status( affwp_get_affiliate_id() ) ) : ?>

		<p class="affwp-notice"><?php _e( 'Your affiliate account is pending approval', 'affiliate-wp' ); ?></p>

	<?php elseif ( 'inactive' == affwp_get_affiliate_status( affwp_get_affiliate_id() ) ) : ?>

		<p class="affwp-notice"><?php _e( 'Your affiliate account is not active', 'affiliate-wp' ); ?></p>

	<?php elseif ( 'rejected' == affwp_get_affiliate_status( affwp_get_affiliate_id() ) ) : ?>

		<p class="affwp-notice"><?php _e( 'Your affiliate account request has been rejected', 'affiliate-wp' ); ?></p>

	<?php endif; ?>

	<?php if ( 'active' == affwp_get_affiliate_status( affwp_get_affiliate_id() ) ) : ?>

		<?php do_action( 'affwp_affiliate_dashboard_top', affwp_get_affiliate_id() ); ?>

		<?php if ( ! empty( $_GET['affwp_notice'] ) && 'profile-updated' == $_GET['affwp_notice'] ) : ?>

			<p class="affwp-notice"><?php _e( 'Your affiliate profile has been updated', 'affiliate-wp' ); ?></p>

		<?php endif; ?>

		<?php do_action( 'affwp_affiliate_dashboard_notices', affwp_get_affiliate_id() ); ?>

		<ul id="affwp-affiliate-dashboard-tabs">


			<?php
			$tab = 'urls';

			if ( affwp_tabs_show_tab( $tab ) ) : ?>
			<li class="affwp-affiliate-dashboard-tab <?php echo $tab; ?><?php echo affwp_tabs_active_class( $active_tab, $tab ); ?>">
				<a href="<?php echo affwp_tabs_get_url( $tab ); ?>"><?php _e( 'Affiliate URLs', 'affiliate-wp' ); ?></a>
			</li>
			<?php endif; ?>

			<?php
			$tab = 'stats';

			if ( affwp_tabs_show_tab( $tab ) ) : ?>
			<li class="affwp-affiliate-dashboard-tab <?php echo $tab; ?><?php echo affwp_tabs_active_class( $active_tab, $tab ); ?>">
				<a href="<?php echo affwp_tabs_get_url( $tab ); ?>"><?php _e( 'Statistics', 'affiliate-wp' ); ?></a>
			</li>
			<?php endif; ?>

			<?php
			$tab = 'graphs';

			if ( affwp_tabs_show_tab( $tab ) ) : ?>
			<li class="affwp-affiliate-dashboard-tab <?php echo $tab; ?><?php echo affwp_tabs_active_class( $active_tab, $tab ); ?>">
				<a href="<?php echo affwp_tabs_get_url( $tab ); ?>"><?php _e( 'Graphs', 'affiliate-wp' ); ?></a>
			</li>
			<?php endif; ?>

			<?php
			$tab = 'referrals';

			if ( affwp_tabs_show_tab( $tab ) ) : ?>
			<li class="affwp-affiliate-dashboard-tab <?php echo $tab; ?><?php echo affwp_tabs_active_class( $active_tab, $tab ); ?>">
				<a href="<?php echo affwp_tabs_get_url( $tab ); ?>"><?php _e( 'Referrals', 'affiliate-wp' ); ?></a>
			</li>
			<?php endif; ?>

			<?php
			$tab = 'visits';

			if ( affwp_tabs_show_tab( $tab ) ) : ?>
			<li class="affwp-affiliate-dashboard-tab <?php echo $tab; ?><?php echo affwp_tabs_active_class( $active_tab, $tab ); ?>">
				<a href="<?php echo affwp_tabs_get_url( $tab ); ?>"><?php _e( 'Visits', 'affiliate-wp' ); ?></a>
			</li>
			<?php endif; ?>

			<?php
			$tab = 'creatives';

			if ( affwp_tabs_show_tab( $tab ) ) : ?>
			<li class="affwp-affiliate-dashboard-tab <?php echo $tab; ?><?php echo affwp_tabs_active_class( $active_tab, $tab ); ?>">
				<a href="<?php echo affwp_tabs_get_url( $tab ); ?>"><?php _e( 'Creatives', 'affiliate-wp' ); ?></a>
			</li>
			<?php endif; ?>

			<?php
			$tab = 'settings';

			if ( affwp_tabs_show_tab( $tab ) ) : ?>
			<li class="affwp-affiliate-dashboard-tab <?php echo $tab; ?><?php echo affwp_tabs_active_class( $active_tab, $tab ); ?>">
				<a href="<?php echo affwp_tabs_get_url( $tab ); ?>"><?php _e( 'Settings', 'affiliate-wp' ); ?></a>
			</li>
			<?php endif; ?>

			<?php do_action( 'affwp_affiliate_dashboard_tabs', affwp_get_affiliate_id(), $active_tab ); ?>
		</ul>

		<?php
			if ( affwp_tabs_show_tab( $active_tab ) ) {
				affiliate_wp()->templates->get_template_part( 'dashboard-tab', $active_tab );
			}
		?>

		<?php do_action( 'affwp_affiliate_dashboard_bottom', affwp_get_affiliate_id() ); ?>

	<?php endif; ?>


</div>
