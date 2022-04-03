<?php
/**
 * The Primary page template.
 *
 * Available variables:
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
	<div id="api-<?php echo \absint( $key ); ?>" class="api-item__container">
		<div class="api-item__details">
			<h3><?php echo \esc_html( $value['API'] ); ?><span>(<?php echo \esc_html( $value['Category'] ); ?>)</span>
			</h3>
			<p><?php echo \esc_html( $value['Description'] ); ?></p>
			<p><?php echo \esc_url( $value['Link'] ); ?></p>
		</div>
		<div class="api-item__features">
			<?php
				printf(
					'<p class="api-item__feature cors"><span class="dashicons dashicons-rest-api"></span> Cors : %s </p>',
					\esc_html( ucfirst( $value['Cors'] ) ),
				);
			?>
			<?php
				printf(
					'<p class="api-item__feature https"><span class="dashicons dashicons-%s"></span> %s </p>',
					true === $value['HTTPS'] ? 'lock' : 'unlock',
					true === $value['HTTPS'] ? 'HTTPS' : 'HTTP',
				);
			?>
			<?php
				printf(
					'<p class="api-item__feature auth"><span class="dashicons dashicons-vault"></span> Auth : %s</p>',
					'' === $value['Auth'] ? 'None' : esc_html( ucfirst( $value['Auth'] ) ),
				);
			?>
		</div>
	</div>

	<?php endforeach; ?>
</div>
