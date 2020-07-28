<?php
// Copyright 2014-2016 RealFaviconGenerator
?>

<div class="wrap">
	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

	<p>
		<?php printf(
			__( 'Do you want to setup your favicon? Go to <a href="%s">Appearance &gt; Favicon</a>', FBRFG_PLUGIN_SLUG ),
			$favicon_appearance_url ) ?>
	</p>

	<form action="<?php echo $favicon_admin_url ?>" method="post">

		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row"><?php _e('Display update notifications', FBRFG_PLUGIN_SLUG ) ?></th>
					<td>
						<input type="checkbox" name="<?php echo Favicon_By_RealFaviconGenerator_Admin::DISMISS_UPDATE_ALL_UPDATE_NOTIICATIONS ?>" 
							value="1" <?php echo( $display_update_notifications ? 'checked="checked"' : '' ) ?>>
						<p class="description">
							<?php _e('Get notifications when RealFaviconGenerator is updated. For example, when Apple releases a new version of iOS or a new platform is supported.', FBRFG_PLUGIN_SLUG ) ?>
						</p>
					</td>
				</tr>
			</tbody>
		</table>

		<input type="hidden" name="<?php echo Favicon_By_RealFaviconGenerator_Admin::SETTINGS_FORM ?>" value="1">

		<input name="Submit" type="submit" class="button-primary" value="<?php _e( 'Save changes', FBRFG_PLUGIN_SLUG ) ?>">
	</form>

</div>
