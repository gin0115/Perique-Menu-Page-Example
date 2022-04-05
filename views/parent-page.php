<?php
/**
 * The Primary page template.
 *
 * Available variables:
 * @var Gin0115\Perique_Menu_Example\Service\Parent_Settings\Parent_Page_Settings  $settings      Access to settings repository.
 * @var PinkCrab\Perique_Admin_Menu\Page\Page                      $page          The Page instance.
 * @var Gin0115\Perique_Menu_Example\Service\Translations          $translations  The Page instance.
 * @var string                                                     $nonce         The nonce value for the form.
 */
?>
<div class="wrap">
	<h2><?php echo $translations->get_parent_page_title(); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped, escaped in translations ?></h2>

	<div id="primary_page_settings_form">

		<form action="" method="post">
			<input type="hidden" name="primary_page_nonce" value="<?php echo \esc_html( $nonce ); ?>">

			<div class="form-field">
				<label for="setting_1">
					Setting 1
					<input type="text" name="setting_1" id="setting_1" value="<?php echo $settings->get_setting_1(); ?>">
				</label>
			</div>

			<div class="form-field">
				<label for="setting_2">
					Setting 2
					<input type="text" name="setting_2" id="setting_2" value="<?php echo $settings->get_setting_2(); ?>">
				</label>
			</div>

			<div class="form-field">
				<input class="button" type="submit" value="Update Settings">
			</div>

		</form>

	</div>
</div> 
