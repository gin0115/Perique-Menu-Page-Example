<?php
/**
 * The Primary page template.
 *
 * Available variables:
 * @var PinkCrab\Perique\Interfaces\Renderable              $this          Give access to the Renderable (View) service.
 * @var PinkCrab\Perique_Admin_Menu\Page\Page               $page          The Page instance.
 * @var Gin0115\Perique_Menu_Example\Service\Translations   $translations  Translated strings.
 * @var array{                                              $api_list      The API List
 *    count:int,
 *    entries:array{
 *       API:string,
 *       Description:string,
 *       Auth:string,
 *       HTTPS:bool,
 *       Cors:string,
 *       Link:string,
 *       Category:string,
 *    }
 * }
 */


?>

<div class="wrap">
	<h2><?php echo $translations->get_child_page_title(); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped, escaped in translations ?>
	</h2>
	<p>Found <?php echo (int) $api_list['count']; ?> pubic API's</p>
	<?php foreach ( $api_list['entries'] as $key => $value ) : ?>
		<?php $this->render( 'public-api-row', array('key' => $key, 'row' => $value) ); ?>
	<?php endforeach; ?>
</div>
