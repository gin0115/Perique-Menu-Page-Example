<?php
/**
 * The Primary page template.
 *
 * Available variables:
 * @var Gin0115\Perique_Menu_Example\Service\Parent_Page_Settings  $settings      Access to settings repository.
 * @var PinkCrab\Perique_Admin_Menu\Page\Page                      $page          The Page instance.
 * @var Gin0115\Perique_Menu_Example\Service\Translations          $translations  The Page instance.
 * @var string                                                     $nonce         The nonce value for the form.
 */

?>

<div>
	<h2><?php echo $translations->get_parent_page_title(); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped, escaped in translations ?></h2>
</div> 
