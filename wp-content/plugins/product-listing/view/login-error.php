<div class="row">
	<div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-4">
		<div class="col-xs-12 alert alert-warning" role="alert">
			<?php _e(
				'You are not logged in. Please click the login button below.',
				'productlisting'
				);
			?>
		</div>

		<div class="clearfix"></div>
		<a href="<?php echo wp_login_url( $_SERVER['REQUEST_URI'] ); ?>" class="btn btn-block btn-primary">
			<?php _e( 'login', 'productlisting' ); ?>
		</a>
		<div class="clearfix">&nbsp;</div>

	</div>
</div>